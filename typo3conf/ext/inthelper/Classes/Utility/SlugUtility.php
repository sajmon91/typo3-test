<?php

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

declare(strict_types=1);

namespace Int\Inthelper\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\DataHandling\SlugHelper;
use TYPO3\CMS\Core\DataHandling\Model\RecordStateFactory;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;

/**
 * SlugUtility
 */
class SlugUtility
{

    /**
     * Populate empty slugs in custom table
     *
     * Inspired by TYPO3\CMS\Install\Updates\PopulatePageSlugs
     * Workspaces are not respected here!
     *
     * @param string $tableName
     * @param string $fieldName
     * @param int    $maxResults
     *
     * @return int
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \TYPO3\CMS\Core\Exception\SiteNotFoundException
     */
    public static function populateEmptySlugsInCustomTable(string $tableName, string $fieldName, int $maxResults=1000): int
    {

        /* @var $connection \TYPO3\CMS\Core\Database\Connection */
        $connection   = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable($tableName);
        $queryBuilder = $connection->createQueryBuilder();

        /* @var $querBuilder \TYPO3\CMS\Core\Database\Query\QueryBuilder */
        $queryBuilder->getRestrictions()
                     ->removeAll()
                     ->add(GeneralUtility::makeInstance(DeletedRestriction::class));

        $statement = $queryBuilder
            ->select('*')
            ->from($tableName)
            ->where(
                $queryBuilder->expr()->orX(
                    $queryBuilder->expr()->eq($fieldName, $queryBuilder->createNamedParameter(' ')),
                    $queryBuilder->expr()->isNull($fieldName)
                )
            )
            ->addOrderBy('uid', 'asc')
            ->setMaxResults($maxResults)
            ->execute();

        $suggestedSlugs = [];

        $fieldConfig         = $GLOBALS['TCA'][$tableName]['columns'][$fieldName]['config'];
        $evalInfo            = !empty($fieldConfig['eval']) ? GeneralUtility::trimExplode(
            ',',
            $fieldConfig['eval'],
            true
        ) : [];
        $hasToBeUniqueInSite = in_array('uniqueInSite', $evalInfo, true);
        $hasToBeUniqueInPid  = in_array('uniqueInPid', $evalInfo, true);
        $slugHelper          = GeneralUtility::makeInstance(SlugHelper::class, $tableName, $fieldName, $fieldConfig);

        while ($record = $statement->fetchAllAssociative()) {
            $recordId                = (int)$record['uid'];
            $pid                     = (int)$record['pid'];
            $languageId              = (int)$record['sys_language_uid'];
            $pageIdInDefaultLanguage = $languageId > 0 ? (int)$record['l10n_parent'] : $recordId;
            $slug                    = $suggestedSlugs[$pageIdInDefaultLanguage][$languageId] ?? '';

            if (empty($slug)) {
                $slug = $slugHelper->generate($record, $pid);
            }

            $state = RecordStateFactory::forName($tableName)
                                       ->fromArray($record, $pid, $recordId);

            if ($hasToBeUniqueInSite && !$slugHelper->isUniqueInSite($slug, $state)) {
                $slug = $slugHelper->buildSlugForUniqueInSite($slug, $state);
            }

            if ($hasToBeUniqueInPid && !$slugHelper->isUniqueInPid($slug, $state)) {
                $slug = $slugHelper->buildSlugForUniqueInPid($slug, $state);
            }

            $connection->update(
                $tableName,
                [ $fieldName => $slug ],
                [ 'uid' => $recordId ]
            );
        }

        return $statement->rowCount();
    }

}
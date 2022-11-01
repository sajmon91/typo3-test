<?php
/**
 *
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

namespace Int\Inthelper\Helper;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\DataHandling\Model\RecordStateFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 *
 *
 * @package inthelper
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class SlugHelper extends ActionController
{

    /**
     * @param int    $uid           UID of record saved in DB
     * @param string $tableName     Name of the table to lookup for uniques
     * @param string $slugFieldName Name of the slug field
     *
     * @return false Resolved unique slug
     * @throws \Doctrine\DBAL\Driver\Exception
     */
    public static function generateUniqueSlug(int $uid, string $tableName, string $slugFieldName): bool
    {

        /** @var Connection $connection */
        $connection   = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable($tableName);
        $queryBuilder = $connection->createQueryBuilder();

        $record = $queryBuilder
            ->select('*')
            ->from($tableName)
            ->where('uid=:uid')
            ->setParameter(':uid', $uid)
            ->execute()
            ->fetchAllAssociative();
        if (!$record) {
            return false;
        }

        // Get field configuration
        $fieldConfig = $GLOBALS['TCA'][$tableName]['columns'][$slugFieldName]['config'];
        $evalInfo    = GeneralUtility::trimExplode(',', $fieldConfig['eval'], true);

        // Initialize Slug helper
        /** @var \TYPO3\CMS\Core\DataHandling\ $slugHelper */
        $slugHelper = GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\DataHandling\SlugHelper::class,
            $tableName,
            $slugFieldName,
            $fieldConfig
        );
        // Generate slug
        $slug  = $slugHelper->generate($record, $record['pid']);
        $state = RecordStateFactory::forName($tableName)
                                   ->fromArray($record, $record['pid'], $record['uid']);

        // Build slug depending on eval configuration
        if (in_array('uniqueInSite', $evalInfo)) {
            $slug = $slugHelper->buildSlugForUniqueInSite($slug, $state);
        } else {
            if (in_array('uniqueInPid', $evalInfo)) {
                $slug = $slugHelper->buildSlugForUniqueInPid($slug, $state);
            } else {
                if (in_array('unique', $evalInfo)) {
                    $slug = $slugHelper->buildSlugForUniqueInTable($slug, $state);
                }
            }
        }
        return $slug;
    }

}

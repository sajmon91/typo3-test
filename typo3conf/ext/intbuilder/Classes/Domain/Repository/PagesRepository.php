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

namespace Int\Intbuilder\Domain\Repository;

use Int\Intbuilder\Domain\Model\FileReference;
use Int\Intbuilder\Domain\Model\PagesNav;
use Int\Inthelper\Domain\Repository\AbstractRepository;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * The repository for Pages
 */
class PagesRepository extends AbstractRepository
{
    /**
     * @param string $tablename
     * @param int    $uid
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Driver\Exception
     */
    public static function getTranslatedPagesForPage(
        string $tablename,
        int $uid
    ): ?ObjectStorage {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(
            'pages'
        );
        $pages        = $queryBuilder
            ->select('pages.*')
            ->from('pages', 'pages')
            ->leftJoin(
                'pages',
                $tablename,
                'mm',
                'pages.uid = mm.uid_foreign'
            )
            ->where(
                $queryBuilder->expr()->eq('mm.uid_local', $uid)
            )
            ->execute()
            ->fetchAllAssociative();

        $mapResults = GeneralUtility::makeInstance(DataMapper::class)->map(PagesNav::class, $pages);

        $returnValue = new ObjectStorage();
        foreach ($mapResults as $singleObject) {
            $returnValue->attach($singleObject);
        }
        return $returnValue;
    }

    /**
     * @param int $uid
     * @param int $lang
     *
     * @return array
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Driver\Exception
     */
    public static function getTranslatedPage(
        int $uid,
        int $lang
    ): array {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(
            'pages'
        );
        if (!$lang) {
            $page = $queryBuilder
                ->select('*')
                ->from('pages')
                ->where(
                    $queryBuilder->expr()->eq('uid', $uid)
                )
                ->execute()
                ->fetchAssociative();
        } else {

            $page = $queryBuilder
                ->select('*')
                ->from('pages')
                ->where(
                    $queryBuilder->expr()->eq('sys_language_uid', $lang),
                    $queryBuilder->expr()->eq('l10n_parent', $uid)
                )
                ->execute()
                ->fetchAssociative();
        }

        return is_array($page) ? $page : [];
    }
}

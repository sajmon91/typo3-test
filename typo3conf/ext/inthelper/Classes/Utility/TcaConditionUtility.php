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

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 *
 */
class TcaConditionUtility
{

    /**
     * @throws \Doctrine\DBAL\Driver\Exception
     */
    public static function getSubcategoryPid(): string
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(
            'pages'
        );

        $resultParents = $queryBuilder->select('uid')
                                      ->from('pages')
                                      ->where($queryBuilder->expr()->eq('pid', 100))
                                      ->execute()
                                      ->fetchAllAssociative();

        $parentValuesArray   = [];
        $parentValuesArray[] = 100;
        foreach ($resultParents as $singlePid) {
            $parentValuesArray[] = $singlePid['uid'];
        }
        if (!empty($parentValuesArray)) {
            return ' AND pages.hidden=0 AND pages.deleted=0 AND pages.pid IN (' . implode(',', $parentValuesArray) . ') ORDER BY pages.title ASC';
        }

        return ' AND pages.hidden=0 AND pages.deleted=0 ORDER BY pages.title ASC ';

    }
}

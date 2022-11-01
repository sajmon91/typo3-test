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

use Int\Inthelper\Domain\Repository\AbstractRepository;

use Int\Intbuilder\Domain\Repository\SearchwordClusterRepository;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\FrontendRestrictionContainer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * The repository for Nav Pages
 */
class PagesNavRepository extends AbstractRepository
{
    /**
     * @param string $sword
     * @param int    $limit
     * @param bool   $searchFuzzy
     *
     * @return array|false|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     * @throws \Doctrine\DBAL\Driver\Exception
     */
    public function findAllBySearch(string $sword, int $limit, ?bool $searchFuzzy = false)
    {

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(
            'pages'
        );

        $queryBuilder->getRestrictions()->removeAll()->add(
            GeneralUtility::makeInstance(FrontendRestrictionContainer::class)
        );

        if (!$sword) {
            return false;
        }
        if ($searchFuzzy) {
            // Add inital sword to constraint
            $swordConstraints   = [];
            $swordConstraints[] = $queryBuilder->expr()->like('title', '"%' . $sword . '%"');

            // Fetch cluster data
            $swordClusterRepository = GeneralUtility::makeInstance(SearchwordClusterRepository::class);
            $swords                 = $swordClusterRepository->findBySearchWord($sword);
            foreach ($swords as $singleSword) {
                if (strlen($singleSword) >= 3) {
                    $sword              = '"%' . $singleSword . '%"';
                    $swordConstraints[] = $queryBuilder->expr()->like('title', $sword);
                }
            }
            $constraints[] = $queryBuilder->expr()->orX(
                ...
                $swordConstraints
            );
        } else {
            $sword              = '"%' . $sword . '%"';
            $swordConstraints[] = $queryBuilder->expr()->like('title', $sword);
        }

        $constraints[] = $queryBuilder->expr()->orX(
            ...
            $swordConstraints
        );

        $queryBuilder
            ->select('*')
            ->from('pages')
            ->where(
                $queryBuilder->expr()->eq('sys_language_uid', 0)
            );

        if ($constraints) {
            // Build and execute Query
            $queryBuilder->andWhere(
                ...
                $constraints
            );
        }

        $result = $queryBuilder->setMaxResults($limit)
                               ->groupBy('uid')
                               ->execute()
                               ->fetchAllAssociative();
//                    ->getSQL(); echo $result;

        return $result;
    }

}

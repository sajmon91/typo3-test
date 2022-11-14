<?php

declare(strict_types=1);

namespace Sajmon\Test\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;

/**
 * This file is part of the "test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * The repository for News
 */
class NewsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];


    /**
     * search for news 
     * 
     * @param string $searchValue
     * @return array
     */
    public function findBySearch(string $searchValue, string $fromDate, string $toDate): array 
    {
        $searchValue = filter_var($searchValue, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $fromDate = filter_var($fromDate, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $toDate = filter_var($toDate, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_test_domain_model_news');
        $queryBuilder->getRestrictions()->removeByType(WorkspaceRestriction::class);

        $whereExpressions = [];


        if($searchValue){
            $whereExpressions[] = $queryBuilder->expr()->like('title', $queryBuilder->createNamedParameter('%' . $searchValue . '%'));
        }

        if($fromDate){
            $whereExpressions[] = $queryBuilder->expr()->gte('newsdate', $queryBuilder->createNamedParameter($fromDate));
        }

        if($toDate){
            $whereExpressions[] = $queryBuilder->expr()->lte('newsdate', $queryBuilder->createNamedParameter($toDate));
        }


        $selectNews = $queryBuilder->select('*')->from('tx_test_domain_model_news')
                ->where(...$whereExpressions)
                ->executeQuery();

        $results = $selectNews->fetchAllAssociative();
        
        $dataMapper = GeneralUtility::makeInstance(DataMapper::class);

        // DebuggerUtility::var_dump($queryBuilder);

        return $dataMapper->map($this->objectType, $results);
    }
}

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
     * @param \Sajmon\Test\Domain\Model\Filter $filter
     * @return array
     */
    public function findBySearch(\Sajmon\Test\Domain\Model\Filter $filter): array 
    {
        $searchValue = $filter->getSearchWord();
        $important = $filter->getImportantCheck();
        $selectCategory = $filter->getSelectedCategory();
        $fromDate = $filter->getFromDate();
        $toDate = $filter->getToDate();

        $table = 'tx_test_domain_model_news';
        $joinTable = 'tx_test_news_newscategory_mm';
        $whereExpressions = [];

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($table);
        $queryBuilder->getRestrictions()->removeByType(WorkspaceRestriction::class);

        if($searchValue){
            $whereExpressions[] = $queryBuilder->expr()->like('title', $queryBuilder->createNamedParameter('%' . $searchValue . '%'));
        }

        if($fromDate){
            $whereExpressions[] = $queryBuilder->expr()->gte('newsdate', $queryBuilder->createNamedParameter($fromDate));
        }

        if($toDate){
            $whereExpressions[] = $queryBuilder->expr()->lte('newsdate', $queryBuilder->createNamedParameter($toDate));
        }

        if($important){
            $whereExpressions[] = $queryBuilder->expr()->eq('important', $queryBuilder->createNamedParameter($important, \PDO::PARAM_INT));
        }

        if($selectCategory){
            $whereExpressions[] = $queryBuilder->expr()->eq('categoryMM.uid_foreign', $queryBuilder->createNamedParameter($selectCategory, \PDO::PARAM_INT));
        }


        $selectNews = $queryBuilder->select('*')->from($table)
                ->join(
                    $table,
                    $joinTable,
                    'categoryMM',
                    $queryBuilder->expr()->eq(
                        'categoryMM.uid_local',
                        $queryBuilder->quoteIdentifier('tx_test_domain_model_news.uid')
                    )
                )
                ->where(...$whereExpressions)
                ->groupBy('tx_test_domain_model_news.uid')
                ->orderBy('important', 'DESC')
                ->executeQuery();

        $results = $selectNews->fetchAllAssociative();
        
        $dataMapper = GeneralUtility::makeInstance(DataMapper::class);

        // DebuggerUtility::var_dump($results);

        return $dataMapper->map($this->objectType, $results);
    }
}

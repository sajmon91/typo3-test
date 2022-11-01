<?php

declare(strict_types=1);

namespace Int\Intnews\Domain\Repository;


use Int\Inthelper\Domain\Repository\AbstractRepository;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * This file is part of the "intnews" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 */

/**
 * The repository for Newss
 */
class NewsRepository extends AbstractRepository
{

    /**
     * @var array
     */
    protected $defaultOrderings = [
        'news_date' => QueryInterface::ORDER_DESCENDING,
    ];
    /**
     * @param int $newsUid
     *
     * @return array
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Doctrine\DBAL\DBALException
     */
    public function findLanguagesByUid(int $newsUid): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(
            'tx_intnews_domain_model_news'
        );

        $result = $queryBuilder->select('uid', 'hidden', 'deleted', 'sys_language_uid', 'l10n_parent', 'hide_original_language')
                               ->from('tx_intnews_domain_model_news')
                               ->execute()
                               ->fetchAllAssociative();

        $returnArray = [];

        foreach ($result as $singleRow) {
            if (
                (
                    $newsUid === (int)$singleRow['uid'] || $newsUid === (int)$singleRow['l10n_parent']
                )
                &&
                (
                    (int)$singleRow['sys_language_uid'] !== 0 ||
                    ($singleRow['hide_original_language'] === 0)
                )
            ) {
                $returnArray[(int)$singleRow['sys_language_uid']] = (int)$singleRow['sys_language_uid'];

            }
        }

        return $returnArray;

    }
}

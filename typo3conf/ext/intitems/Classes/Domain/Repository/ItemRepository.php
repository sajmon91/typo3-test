<?php

declare(strict_types=1);

namespace Int\Intitems\Domain\Repository;


use Int\Inthelper\Domain\Repository\AbstractRepository;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

/**
 * This file is part of the "intitems" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 */

/**
 * The repository for Items
 */
class ItemRepository extends AbstractRepository
{

    /**
     * @var array
     */
    protected $defaultOrderings = [ 'sorting' => QueryInterface::ORDER_ASCENDING ];

    /**
     * findByCategoryCsv
     *
     * @param string     $categoryCsv
     * @param bool       $languageOverlayMode
     * @param array|null $sortingOrder
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function findByCategoryCsv(
        string $categoryCsv,
        bool $languageOverlayMode = false,
        array $sortingOrder = null
    ): QueryResultInterface
    {
        $categoryIdsArray = explode(',', $categoryCsv);

        if (!$categoryIdsArray || !count($categoryIdsArray)) {
            return $this->findAll();
        }

        $query = $this->createQuery();

        $constraints = [];

        foreach ($categoryIdsArray as $singleCategoryId) {
            $constraints[] = $query->contains('categories', $singleCategoryId);
        }

        if (count($constraints)) {
            return $query->matching($query->logicalOr($constraints))->execute();
        }
    }
}

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

namespace Int\Inthelper\Domain\Repository;

use Int\Intbuilder\Domain\Model\PagesNav;
use Int\Inthelper\Helper\SiteHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Abstract Repository
 */
class AbstractRepository extends Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];

    /**
     * initializeObject
     *
     * @return void
     */
    public function initializeObject(): void
    {
        /** @var Typo3QuerySettings $defaultQuerySettings */
        $defaultQuerySettings = GeneralUtility::makeInstance(Typo3QuerySettings::class);
        $defaultQuerySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($defaultQuerySettings);
    }

    /**
     * findByStoragePid
     *
     * @param string $storagePids Storage Pids CSV
     *
     * @return QueryResultInterface
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function findByStoragePid(string $storagePids): QueryResultInterface
    {
        $query = $this->createQuery();

        $storagePidArray = explode(',', $storagePids);

        if (is_array($storagePidArray) && count($storagePidArray)) {
            $query->matching(
                $query->in('pid', $storagePidArray)
            );
        }

        return $query->execute();
    }

    /**
     * @param bool       $languageOverlayMode
     * @param array|null $sortingOrder
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     */
    public function findAllByLanguage(
        bool $languageOverlayMode = false,
        array $sortingOrder = null
    ): QueryResultInterface {
        $query = $this->createQuery();

        if ($sortingOrder) {
            $query->setOrderings($sortingOrder);
        }

        $query->getQuerySettings()->setLanguageOverlayMode($languageOverlayMode);
        $query->setQuerySettings(
            $query
                ->getQuerySettings()
                ->setRespectSysLanguage(false)
        );
        return $query->matching($query->equals('sysLanguageUid', SiteHelper::getCurrentSiteLanguageId()))->execute();
    }

    /**
     * @param int $uid
     *
     * @return object|null
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     */
    public function findByUidAndLanguage(int $uid, bool $languageOverlayMode = false): ?object
    {
        $query = $this->createQuery();
        $query->getQuerySettings()
              ->setLanguageOverlayMode($languageOverlayMode)
              ->setRespectSysLanguage(false);

        // Get by UID
        $result = $query->matching(
            $query->equals('uid', $uid)
        )->execute()->getFirst();

        if ($result && $result->_hasProperty('_languageUid') && $result->_getProperty(
                '_languageUid'
            ) === SiteHelper::getCurrentSiteLanguageId()) {
            return $result;
        }

        return $query->matching(
            $query->logicalAnd(
                $query->equals('l10n_parent', $uid),
                $query->equals('sysLanguageUid', SiteHelper::getCurrentSiteLanguageId())
            )
        )->execute()->getFirst();
    }

    /**
     * findByCategoryCsv
     *
     * @param string     $categoryCsv
     * @param bool       $languageOverlayMode
     * @param array|null $sortingOrder
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function findByCategoryCsv(
        string $categoryCsv,
        bool $languageOverlayMode = false,
        array $sortingOrder = null
    ): QueryResultInterface {
        $categoryIdsArray = explode(',', $categoryCsv);

        if (!$categoryIdsArray || !count($categoryIdsArray)) {
            return $this->findAllByLanguage($languageOverlayMode, $sortingOrder);
        }

        $query = $this->createQuery();
        if ($sortingOrder) {
            $query->setOrderings($sortingOrder);
        }
        $query->setQuerySettings(
            $query
                ->getQuerySettings()
                ->setRespectSysLanguage(false)
                ->setLanguageOverlayMode($languageOverlayMode)
        );

        $constraints = [];

        $constraints[] = $query->equals('sys_language_uid', SiteHelper::getCurrentSiteLanguageId());

        $categoryConstraints = [];
        foreach ($categoryIdsArray as $singleCategoryId) {
            $categoryConstraints[] = $query->contains('categories', $singleCategoryId);
        }
        $constraints[] = $query->logicalOr($categoryConstraints);

        return $query->matching($query->logicalAnd($constraints))->execute();
    }

    /**
     * @param string $class Class name
     * @param array  $array Array to map
     *
     * @return array
     */
    public static function map(string $class, array $array): array
    {
        return GeneralUtility::makeInstance(DataMapper::class)->map($class, $array);
    }

    public function findByCsv(string $csv)
    {
        if (empty($csv)) {
            return null;
        }
        $uidArray = array_filter(explode(',', $csv));
        if (empty($uidArray)) {
            return null;
        }

        // Array with author UIDs isn't empty
        $objectStorage = GeneralUtility::makeInstance(ObjectStorage::class);
        foreach ($uidArray as $singleUid) {
            $singleObject = $this->findByUid($singleUid);
            if ($singleObject) {
                $objectStorage->attach($singleObject);
            }
        }
        return $objectStorage;

    }

}

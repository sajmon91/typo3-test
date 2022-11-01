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

namespace Int\Inthelper\Service;

use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 *
 */
class CacheService
{
    public static function clearCache(): void
    {
        $cacheManager = GeneralUtility::makeInstance(CacheManager::class);
        $cacheManager->flushCaches();
    }

    /**
     * @param int $pid
     *
     * @throws \TYPO3\CMS\Core\Cache\Exception\NoSuchCacheGroupException
     */
    public static function clearCacheForPid(int $pid): void
    {
        $cacheManager = GeneralUtility::makeInstance(CacheManager::class);
        $cacheManager->flushCachesInGroupByTags('pages', [ 'pageId_' . $pid ]);
    }

    /**
     * @param array $pidArray
     *
     * @throws \TYPO3\CMS\Core\Cache\Exception\NoSuchCacheGroupException
     */
    public static function clearCacheForPidArray(array $pidArray): void
    {
        $pidIdentifierArray = [];
        foreach ($pidArray as $singlePid) {
            $pidIdentifierArray[] = 'pageId_' . $singlePid;
        }

        if (!empty($pidIdentifierArray)) {
            $cacheManager = GeneralUtility::makeInstance(CacheManager::class);
            $cacheManager->flushCachesInGroupByTags('pages', $pidIdentifierArray);
        }
    }
}

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

namespace Int\Inthelper\Service;

use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * CacheSnippetService
 */
class CacheSnippetService
{

    /**
     * @param int    $pageUid    Page Uid
     * @param string $identifier Identifier
     * @param string $content    Content to be saved, if not submitted we just want to check if a cache entry exists
     *
     * @return mixed
     * @throws \TYPO3\CMS\Core\Cache\Exception\NoSuchCacheException
     */
    public static function getSnippetCache(int $pageUid, string $identifier, string $content = '')
    {
        $cacheIdentifier = md5($pageUid . $identifier);
        $cache           = GeneralUtility::makeInstance(CacheManager::class)->getCache('int_snippet');

        $entry = $cache->get($cacheIdentifier);

        if ($entry !== false) {
            return $entry;
        }

        // No cache entry? Create and return
        // No Cache Entry exists AND Content is not submitted – Return false
        if (!$content) {
            return false;
        }

        // No Cache Entry exists BUT Content is submitted – Set Cache entry and return the submitted content
        $cache->set($cacheIdentifier, $content, [ $identifier ], 0);
        return $content;
    }

    /**
     * @param int    $pageUid    Page Uid
     * @param string $identifier Identifier
     *
     * @return mixed
     * @throws \TYPO3\CMS\Core\Cache\Exception\NoSuchCacheException
     */
    public static function hasSnippetCache(int $pageUid, string $identifier)
    {
        $cacheIdentifier = md5($pageUid . $identifier);
        $cache           = GeneralUtility::makeInstance(CacheManager::class)->getCache('int_snippet');

        $entry = $cache->get($cacheIdentifier);
        if ($entry !== false) {
            return $entry;
        }

        return false;
    }

}

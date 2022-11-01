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

use TYPO3\CMS\Core\Exception\Page\PageNotFoundException;
use TYPO3\CMS\Core\SingletonInterface;

/**
 * Class PaginatorUtility
 *
 * @package Int\Inthelper\Utility
 */
class PaginatorUtility implements SingletonInterface
{

    /**
     * Build pagination
     *
     * @param int $page       current page number
     * @param int $allItems   Count of all items
     * @param int $maxResults Max number of results per Page
     *
     * @return array
     */
    public static function buildPagination(int $page = 0, int $allItems = 0, int $maxResults = 10): array
    {
        if ($maxResults === 0) {
            throw new PageNotFoundException('0 not allowed');
        }

        if (is_array($allItems)) {
            $allItems = count($allItems);
        }

        $totalPages = ceil($allItems / $maxResults);

        // Build the pagination
        $pagination           = [];
        $pagination['active'] = $page;

        for ($i = 0; $i < $totalPages; $i++) {
            $pagination['pages'][$i + 1] = $i + 1;
        }

        if ($page > 1) {
            $pagination['prev'] = $page - 1;
        }

        if ($page < $totalPages) {
            $pagination['next'] = $page + 1;
        }

        return $pagination;
    }

}

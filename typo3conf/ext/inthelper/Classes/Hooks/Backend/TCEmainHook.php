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

namespace Int\Inthelper\Hooks\Backend;

use Int\Inthelper\Controller\ImportController;
use Int\Inthelper\Service\CacheService;
use Int\Intproduct\Domain\Model\Product;
use Int\Intproduct\Domain\Repository\ProductRepository;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Class TCEmainHook
 *
 * @package Int\Inthelper\Hooks\Backend
 */
class TCEmainHook
{

    /**
     * After Save Hook
     *
     * @param string      $status     The update status (new, update, ...)
     * @param string      $table      The table name of the current record
     * @param int         $id         The UID of the current record
     * @param array       $fieldArray The value array of the update (Attention: Only fields which have been changed)
     * @param DataHandler $pObj       The datahandler object
     *
     * @return void
     */
    public function processDatamap_postProcessFieldArray(
        string $status,
        string $table,
        int $id,
        array &$fieldArray,
        DataHandler &$pObj
    ): void {
        // After Save Hook
        switch ($table) {
            case 'tt_content':
                break;
            default:
                break;
        }

    }

}

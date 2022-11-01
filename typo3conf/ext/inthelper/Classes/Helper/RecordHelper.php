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

namespace Int\Inthelper\Helper;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 *
 *
 * @package inthelper
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class RecordHelper extends ActionController
{

    /**
     * @var ContentObjectRenderer
     */
    protected ContentObjectRenderer $cObj;

    /**
     * getRecordData
     *
     * @return array
     */
    public function getRecordData(): array
    {
        $itemUid    = $this->configurationManager->getContentObject()->data['uid'];
        $this->cObj = GeneralUtility::makeInstance(ContentObjectRenderer::class);

        $tt_content_conf = [
            'selectFields' => '*',
            'where'        => 'uid=' . $itemUid,
        ];

        return current($this->cObj->getRecords('tt_content', $tt_content_conf));
    }

    /**
     * getPidsFromIntLinklist
     *
     * @return string
     */
    public function getPidsFromIntLinklist(): string
    {
        // Get Record
        $record = $this->getRecordData();
        if (!is_array($record) || !count($record)) {
            return '';
        }
        return $record['int_linklist'];
    }

    /**
     * Load items from given Repository by UID
     *
     * @param object      $repository Repository
     * @param string|null $uidCsv     UID list as CSV
     *
     * @return array
     */
    public static function loadRecordsFromUidCsv(object $repository, ?string $uidCsv): array
    {
        $items = [];

        // String empty, maybe no UID submitted
        if (!$uidCsv) {
            return $items;
        }

        $itemsArray = explode(',', $uidCsv);

        // Return empty array
        if (!is_array($itemsArray) || !count($itemsArray)) {
            return $items;
        }

        // Load items and return array
        foreach ($itemsArray as $singleItemUid) {
            $itemObject = $repository->findByUid($singleItemUid);
            $items[]    = $itemObject;

        }
        return $items;
    }

}

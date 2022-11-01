<?php
/**
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

namespace Int\Inthelper\DataProcessing;

use Int\Intbuilder\Domain\Repository\PagesNavRepository;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class PagesNavProcessor implements DataProcessorInterface
{

    /**
     * @var PagesNavRepository|null
     */
    protected ?PagesNavRepository $pagesNavRepository = null;

    /**
     * @var Typo3QuerySettings|null
     */
    protected ?Typo3QuerySettings $typo3QuerySettings = null;

    /**
     * PagesNavProcessor constructor.
     *
     * @param \Int\Intbuilder\Domain\Repository\PagesNavRepository      $pagesNavRepository
     * @param \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings $typo3QuerySettings
     */
    public function __construct(
        PagesNavRepository $pagesNavRepository,
        Typo3QuerySettings $typo3QuerySettings
    ) {
        $this->pagesNavRepository = $pagesNavRepository;
        $this->typo3QuerySettings = $typo3QuerySettings;
    }

    /**
     * Process content object data
     *
     * @param ContentObjectRenderer $cObj                       The data of the content element or page
     * @param array                 $contentObjectConfiguration The configuration of Content Object
     * @param array                 $processorConfiguration     The configuration of this processor
     * @param array                 $processedData              Key/value store of processed data
     *
     * @return array the processed data as key/value store
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ): array {
        $this->typo3QuerySettings->setRespectStoragePage(false);
        if (isset($processedData['data']['_PAGES_OVERLAY_UID']) && (int)$processedData['data']['_PAGES_OVERLAY_UID']) {
            $uid = (int)$processedData['data']['_PAGES_OVERLAY_UID'];
        } else {
            $uid = (int)$processedData['data']['uid'];
        }

        $processedData['data'] = $this->pagesNavRepository->findByUid($uid);

        // Add additional variables here. They will be loaded in each page

        return $processedData;
    }

}

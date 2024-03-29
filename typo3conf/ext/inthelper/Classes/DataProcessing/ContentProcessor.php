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

namespace Int\Inthelper\DataProcessing;

use Int\Intbuilder\Domain\Repository\ContentRepository;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class ContentProcessor implements DataProcessorInterface
{

    /**
     * @var ContentRepository|null
     */
    public ?ContentRepository $contentRepository = null;

    /**
     * ContentProcessor constructor
     *
     * @param \Int\Intbuilder\Domain\Repository\ContentRepository $contentRepository
     */
    public function __construct(ContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
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
        $uid        = isset($processedData['data']['_LOCALIZED_UID']) && (int)$processedData['data']['_LOCALIZED_UID'] ? (int)$processedData['data']['_LOCALIZED_UID'] : $processedData['data']['uid'];
        $contentObj = $this->contentRepository->findByUid($uid);

        $processedData['data'] = $contentObj;

        // Add additional variables here. They will be loaded in each content element

        return $processedData;
    }

}

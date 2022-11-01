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

use Int\Intnews\Domain\Repository\NewsRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class LanguageMenuProcessor extends \TYPO3\CMS\Frontend\DataProcessing\LanguageMenuProcessor
{

    /**
     * @param ContentObjectRenderer $cObj                       The data of the content element or page
     * @param array                 $contentObjectConfiguration The configuration of Content Object
     * @param array                 $processorConfiguration     The configuration of this processor
     * @param array                 $processedData              Key/value store of processed data (e.g. to be passed to
     *                                                          a Fluid View)
     *
     * @return array the processed data as key/value store
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \JsonException
     * @throws \TYPO3\CMS\Frontend\ContentObject\Exception\ContentRenderingException
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ): array {
        $this->cObj                   = $cObj;
        $this->processorConfiguration = $processorConfiguration;

        // Get Configuration
        $this->menuTargetVariableName = $this->getConfigurationValue('as');

        // Validate and Build Configuration
        $this->validateAndBuildConfiguration();

        // Process Configuration
        $menuContentObject = $cObj->getContentObject('HMENU');
        if (!$menuContentObject) {
            return $processedData;
        }
        $renderedMenu = $menuContentObject->render($this->menuConfig);
        if (!$renderedMenu) {
            return $processedData;
        }

        // Process menu
        $menu          = json_decode($renderedMenu, true, 512, JSON_THROW_ON_ERROR);
        $processedMenu = [];

        $newsLanguages = null;

        if (is_iterable($menu)) {

            // Check if we're on a plugin detail page
            // If so, remove link for all languages without translations
            $getParams = GeneralUtility::_GET();
            if (
                array_key_exists('tx_intnews_newsdetail', $getParams) &&
                $getParams['tx_intnews_newsdetail']['action'] === 'show' &&
                (int)$getParams['tx_intnews_newsdetail']['news'] > 0
            ) {
                $newsLanguages = GeneralUtility::makeInstance(NewsRepository::class)->findLanguagesByUid(
                    (int)$getParams['tx_intnews_newsdetail']['news']
                );
            }

            // Go through the pages
            foreach ($menu as $key => $language) {
                $processedMenu[$key] = $language;
                if (
                    !$language['link'] ||
                    !$language['available'] ||
                    ($newsLanguages && !in_array($key, $newsLanguages, true))
                ) {
                    unset($processedMenu[$key]);
                }
            }
        }

        // Return processed data
        $processedData[$this->menuTargetVariableName] = $processedMenu;
        return $processedData;
    }

}

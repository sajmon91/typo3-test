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

namespace Int\Inthelper\ViewHelpers;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Creates Google Maps
 */
class GoogleMapsViewHelper extends AbstractViewHelper
{


    /**
     * Initialize arguments
     *
     * @return void
     * @api
     *
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('mapContainerId', 'string', 'Map container ID', true);
        $this->registerArgument('locations', 'string', 'Locations', true);
        $this->registerArgument(
            'mapPadding',
            'array',
            'Map paddings, e.g. {top: 100, right: 50, bottom: 50, left: 50}',
            false
        );
        $this->registerArgument('mapMaxZoom', 'string', 'Map max zoom', false);
        $this->registerArgument('customIcon', 'string', 'Pin custom icon', false);
    }

    /**
     * Split the link tag
     *
     * @return string the link title as string, or false if there is none
     */
    public function render()
    {
        $locations = '';

        if (!$this->arguments['customIcon']) {
            $this->arguments['customIcon'] = null;
        }
        if ((int)$this->arguments['mapMaxZoom'] === 0) {
            $this->arguments['mapMaxZoom'] = 14;
        }

        $locations = str_replace("\r\n", '-', $this->arguments['locations']);

        $searchArray = [
            '$mapContainerId',
            '$locations',
            '$mapPadding',
            '$customIcon',
            '$mapMaxZoom',
        ];

        $replaceArray = [
            $this->arguments['mapContainerId'],
            $locations,
            json_encode($this->arguments['mapPadding']),
            $this->arguments['customIcon'],
            $this->arguments['mapMaxZoom'],
        ];

        $mapTemplate = file_get_contents(
            GeneralUtility::getFileAbsFileName(
                'EXT:inthelper/Resources/Public/Frontend/src/js/mainbottom/mapTemplate.js'
            )
        );

        // Add Google Maps script only when needed
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $pageRenderer->addJsFooterLibrary(
            'GoogleMaps',
            'https://maps.googleapis.com/maps/api/js?key=AIzaSyB-XoyZDq8wQTE6VB3WTQ45Y220bnzN30k&callback=initMap',
            'text/javascript',
            false,
            false,
            '',
            false,
            '|',
            true,
            '',
            true,
            ''
        );

        return '<script>' . str_replace($searchArray, $replaceArray, $mapTemplate) . '</script>';
    }

}

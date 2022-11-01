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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Formats string for Google Maps
 */
class FormatStringForGoogleMapsViewHelper extends AbstractViewHelper
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
        $this->registerArgument('string', 'string', 'String to send', true);
        $this->registerArgument('wrapWithQuotes', 'boolean', 'Wrap with quotes?', false);
    }

    /**
     * Split the link tag
     *
     * @return string the link title as string, or false if there is none
     */
    public function render()
    {
        $string         = $this->arguments['string'];
        $wrapWithQuotes = $this->arguments['wrapWithQuotes'];

        $searchArray = [
            "\n",
            "\r",
            "\r\n",
            "\n\r",
        ];

        if ($wrapWithQuotes) {
            $string = '"' . addslashes(str_replace($searchArray, ' ', $string)) . '"';
        }
        return $string . ',';
    }

}

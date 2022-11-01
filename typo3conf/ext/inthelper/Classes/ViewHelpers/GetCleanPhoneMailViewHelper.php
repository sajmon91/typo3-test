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

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Extracts clean string from BE Link for Mail and Phone
 */
class GetCleanPhoneMailViewHelper extends AbstractViewHelper
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
        $this->registerArgument('link', 'string', 'Phone or Mail BE link', true);
    }

    /**
     * Extract phone number from string with sign +
     *
     * @return string
     */
    public function render()
    {
        return str_replace(['mailto:', 'tel:', '"'], '', $this->arguments['link']);
    }

}

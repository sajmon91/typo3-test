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
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\Service\TypoLinkCodecService;

/**
 * Extracts content from title tag from a link
 */
class TitleFromLinkViewHelper extends AbstractViewHelper
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
        $this->registerArgument('link', 'link', 'The typolink', true);
        $this->registerArgument('overrideIfEmpty', 'string', 'Override if title not set', false);
    }

    /**
     * Split the link tag
     *
     * @return string|bool the link title as string, or false if there is none
     */
    public function render()
    {
        $typoLinkCodecService = GeneralUtility::makeInstance(TypoLinkCodecService::class);

        // Split Link and try to get Link title (from Link Wizard)
        $link      = $this->arguments['link'];
        $linkParts = $typoLinkCodecService->decode($link);

        // Return if found
        if (is_array($linkParts) && array_key_exists('title', $linkParts) && $linkParts['title'] !== '') {
            return $linkParts['title'];
        }

        // If title is not set and overrideIfEmpty is set return overrideIfEmpty value
        if ($this->arguments['overrideIfEmpty']) {
            return $this->arguments['overrideIfEmpty'];
        }

        // Title is not set in Link Wizard
        // We create a link and strip tags to get the title
        $cObj = GeneralUtility::makeInstance(ContentObjectRenderer::class);
        $conf = [
            'parameter' => $link,
        ];

        // Return if link could be created
        $typoLink = $cObj->typoLink(null, $conf);
        if ($typoLink) {
            return strip_tags($typoLink);
        }

        return false;
    }

}

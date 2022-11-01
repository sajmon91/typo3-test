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

use DateTime;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Routing\SiteMatcher;
use TYPO3\CMS\Core\Site\Entity\SiteInterface;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class SiteHelper
{
    /**
     * Find and return the current language ID
     *
     * @return int
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     */
    public static function getCurrentSiteLanguageId(): int
    {
        if (!self::getLanguageAspect()) {
            return 0;
        }
        return self::getLanguageAspect()->getId();
    }

    /**
     * Find and return the current language ISO2 code
     *
     * @return \TYPO3\CMS\Core\Site\Entity\SiteLanguage|null
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     * @throws \TYPO3\CMS\Core\Exception\SiteNotFoundException
     */
    public static function getCurrentSiteLanguage(): ?SiteLanguage
    {
        if (!self::getLanguageAspect()) {
            return null;
        }
        return self::getCurrentSite()->getLanguageById(self::getLanguageAspect()->getId());
    }

    /**
     * @return SiteInterface
     * @throws \TYPO3\CMS\Core\Exception\SiteNotFoundException
     */
    public static function getCurrentSite(): SiteInterface
    {
        $matcher = GeneralUtility::makeInstance(SiteMatcher::class);
        //wrap in if to stop the php 8 warning: Attempt to read property "id" on null
        if ($GLOBALS['TSFE'] !== null) {
            return $matcher->matchByPageId((int)$GLOBALS['TSFE']->id);
        }
        return $matcher->matchByPageId(0);
    }

    /**
     * Convenience wrapper for the LanguageAspect
     *
     * @return null|\TYPO3\CMS\Core\Context\LanguageAspect
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     */
    public static function getLanguageAspect(): ?\TYPO3\CMS\Core\Context\LanguageAspect
    {
        $context = GeneralUtility::makeInstance(Context::class);

        /** @var \TYPO3\CMS\Core\Context\LanguageAspect $aspect */
        return $context->getAspect('language');
    }
}
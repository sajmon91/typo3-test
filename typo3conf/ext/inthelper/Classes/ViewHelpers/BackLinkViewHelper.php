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

use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\RootlineUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Creates BackLink
 *
 */
class BackLinkViewHelper extends AbstractViewHelper
{

    /**
     * @var SiteFinder
     */
    protected SiteFinder $siteFinder;


    public function __construct(
        SiteFinder $siteFinder
    ) {
        $this->siteFinder = $siteFinder;
    }


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
        $this->registerArgument('pageUid', 'string', 'Page UID', false, false);
        $this->registerArgument('includeSpacer', 'bool', 'Include Spacer', false, false);
        $this->registerArgument('showHidden', 'bool', 'Show hidden', false, false);
        $this->registerArgument('samePage', 'bool', 'show same page, not parent', false, false);
    }

    /**
     *
     */
    public function render()
    {
        $pageUid = (int)$this->arguments['pageUid'] > 0 ? (int)$this->arguments['pageUid'] : $GLOBALS['TSFE']->id;

        $rootLineUtility = new RootlineUtility($pageUid);
        $rootline        = $rootLineUtility->get();

        if (!$this->arguments['samePage'] && count($rootline) > 1) {
            array_shift($rootline);
        }


        /** @var \Int\Intbuilder\Domain\Model\Pages $singlePage */
        foreach ($rootline as $singlePage) {
            $doktype = isset($singlePage['doktype']) ? $singlePage['doktype'] : '';
            $navHide = isset($singlePage['nav_hide']) ? $singlePage['nav_hide'] : '';

            $includeSpacerArgument = $this->arguments['includeSpacer'];
            $showHiddenArgument    = $this->arguments['showHidden'];

            if (
                $doktype < 200 &&
                ($includeSpacerArgument || $doktype !== 199) &&
                ($showHiddenArgument || !$navHide)
            ) {
                return $singlePage['uid'];
            }
        }
        return $pageUid;

    }

}

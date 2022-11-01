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

use Int\Intbuilder\Domain\Repository\PagesNavRepository;
use Int\Intbuilder\Domain\Repository\PagesRepository;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\RootlineUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Creates Breadcrumb
 *
 */
class BreadcrumbViewHelper extends AbstractViewHelper
{
    /**
     * @var PagesRepository
     */
    protected PagesRepository $pagesRepository;

    /**
     * @var PagesNavRepository
     */
    protected PagesNavRepository $pagesNavRepository;

    /**
     * @var SiteFinder
     */
    protected SiteFinder $siteFinder;


    public function __construct(
        PagesRepository $pagesRepository,
        PagesNavRepository $pagesNavRepository,
        SiteFinder $siteFinder
    ) {
        $this->pagesRepository    = $pagesRepository;
        $this->pagesNavRepository = $pagesNavRepository;
        $this->siteFinder         = $siteFinder;
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
        $this->registerArgument('hideLatest', 'bool', 'Show latest item (e.g. for detail pages)', false, false);
        $this->registerArgument('lastItem', 'string', 'Last item', false, '');
    }

    /**
     *
     * @throws \TYPO3\CMS\Core\Exception\SiteNotFoundException
     */
    public function render()
    {
        $pageUid = (int)$this->arguments['pageUid'] > 0 ? (int)$this->arguments['pageUid'] : $GLOBALS['TSFE']->id;

        $rootLineUtility = new RootlineUtility($pageUid);
        $rootline        = array_reverse($rootLineUtility->get());

        $pagesArray = [];

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
                $singleSubPage = [];
                $uid           = $singlePage['uid'];

                $site = $this->siteFinder->getSiteByPageId($uid);

                $singleSubPage['data']  = $this->pagesRepository->findByUid($uid);
                $singleSubPage['title'] = $singlePage['nav_title'] ?: $singlePage['title'];
                if (isset($singlePage['sys_language_uid'])) {
                    $singleSubPage['link']  = $site->getRouter()
                                                   ->generateUri(
                                                       $uid,
                                                       array_merge([ '_language' => $singlePage['sys_language_uid'] ])
                                                   )
                                                   ->getPath();
                } else {
                    $singleSubPage['link'] = $site->getRouter()
                                                   ->generateUri($uid)
                                                   ->getPath();
                }

                $singleSubPage['target']  = isset($singlePage['target']) ? $singlePage['target'] : '';
                $singleSubPage['active']  = $navHide ? '1' : '0';
                $singleSubPage['current'] = '';
                $singleSubPage['spaces']  = $doktype === 199;
                $pagesArray[]             = $singleSubPage;

            }
        }

        if ($this->arguments['hideLatest'] === true) {
            array_pop($pagesArray);
        }
        if ($this->arguments['lastItem']) {
            $lastItem     = [ 'title' => $this->arguments['lastItem'] ];
            $pagesArray[] = $lastItem;
        }

        return $pagesArray;


    }

}

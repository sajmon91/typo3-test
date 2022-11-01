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

use Int\Intbuilder\Domain\Model\Pages;
use Int\Intbuilder\Domain\Repository\FileReferenceRepository;
use Int\Intbuilder\Domain\Repository\PagesRepository;
use Int\Intbuilder\Domain\Repository\PagesNavRepository;
use Int\Intbuilder\Domain\Repository\RootPageRepository;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class PagesProcessor implements DataProcessorInterface
{

    /**
     * @var PagesRepository|null
     */
    protected ?PagesRepository $pagesRepository = null;

    /**
     * @var PagesNavRepository|null
     */
    protected ?PagesNavRepository $navPageRepository = null;

    /**
     * @var RootPageRepository|null
     */
    protected ?RootPageRepository $rootPageRepository = null;

    /**
     * PagesProcessor constructor.
     *
     * @param \Int\Intbuilder\Domain\Repository\PagesRepository    $pagesRepository
     * @param \Int\Intbuilder\Domain\Repository\PagesNavRepository $navPageRepository
     * @param \Int\Intbuilder\Domain\Repository\RootPageRepository $rootPageRepository
     */
    public function __construct(
        PagesRepository $pagesRepository,
        PagesNavRepository $navPageRepository,
        RootPageRepository $rootPageRepository
    ) {

        $this->pagesRepository    = $pagesRepository;
        $this->navPageRepository  = $navPageRepository;
        $this->rootPageRepository = $rootPageRepository;
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
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \TYPO3\CMS\Core\Exception\SiteNotFoundException
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ) {
        $isTranslated = false;
        if (isset($processedData['data']['_PAGES_OVERLAY_UID']) && (int)$processedData['data']['_PAGES_OVERLAY_UID']) {
            $uid          = (int)$processedData['data']['_PAGES_OVERLAY_UID'];
            $isTranslated = true;
        } else {
            $uid = (int)$processedData['data']['uid'];
        }

        /** @var Pages $page */
        $page = $this->pagesRepository->findByUid($uid);

        /** @var SiteFinder $siteFinder */
        $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);
        if ($isTranslated) {
            $page = $this->translatePageFileReferences($page, $uid);
        }
        
        $rootPage = null;

        // Root Page
        if (isset($GLOBALS['TSFE']->rootLine[0])) {
            $rootPage = $this->rootPageRepository->findByUid($GLOBALS['TSFE']->rootLine[0]['uid']);
            if ($isTranslated && $rootPage) {
                if (isset($GLOBALS['TSFE']->rootLine[0]['_PAGES_OVERLAY_UID']) && (int)$GLOBALS['TSFE']->rootLine[0]['_PAGES_OVERLAY_UID']) {
                    $rootPageUid = (int)$GLOBALS['TSFE']->rootLine[0]['_PAGES_OVERLAY_UID'];
                } else {
                    $rootPageUid = (int)$GLOBALS['TSFE']->rootLine[0]['uid'];
                }
                $rootPage = $this->translateRootPageFileReferences(
                    $rootPage,
                    $rootPageUid
                );
            }
        }

        // First Page
        $firstPage = null;
        if (isset($GLOBALS['TSFE']->rootLine[1])) {
            $firstPage = $this->navPageRepository->findByUid($GLOBALS['TSFE']->rootLine[1]['uid']);
    
            if ($isTranslated && $firstPage) {
                if (isset($GLOBALS['TSFE']->rootLine[1]['_PAGES_OVERLAY_UID']) && (int)$GLOBALS['TSFE']->rootLine[1]['_PAGES_OVERLAY_UID']) {
                    $firstPageUid = (int)$GLOBALS['TSFE']->rootLine[1]['_PAGES_OVERLAY_UID'];
                } else {
                    $firstPageUid = (int)$GLOBALS['TSFE']->rootLine[1]['uid'];
                }
                $firstPage = $this->translateFirstPageFileReferences(
                    $firstPage,
                    $firstPageUid
                );
            }
        }
        
        $processedData['data']       = $page;
        $processedData['root']       = $rootPage;
        $processedData['first']      = $firstPage;
        $processedData['siteConfig'] = $siteFinder->getSiteByRootPageId($GLOBALS['TSFE']->rootLine[0]['uid']);
        $processedData['context']    = Environment::getContext();

        if ($page instanceof Pages) {
            $parentPage = $this->navPageRepository->findByUid($page->getPid());
            if ($isTranslated && $parentPage) {
                if ($parentPage->_hasProperty('_PAGES_OVERLAY_UID') && $parentPage->_getProperty('_PAGES_OVERLAY_UID')) {
                    $parentPageUid = (int)$parentPage->_getProperty('_PAGES_OVERLAY_UID');
                } else {
                    $parentPageUid = $parentPage->getUid();
                }
                $parentPage = $this->translateParentPageFileReferences($parentPage, $parentPageUid);
            }
            $processedData['parent'] = $parentPage;
        }

        return $processedData;
    }


    /**
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Doctrine\DBAL\DBALException
     */
    public function translatePageFileReferences($page, $uid)
    {
        $intFooterTeaser = FileReferenceRepository::getTranslatedFileReferenceForPage(
            'int_footer_teaser',
            'pages',
            $uid
        );
        $page->setIntFooterTeaser($intFooterTeaser);

        $intImage1 = FileReferenceRepository::getTranslatedFileReferenceForPage(
            'int_image1',
            'pages',
            $uid
        );
        $page->setIntImage1($intImage1);

        return $page;
    }


    /**
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Doctrine\DBAL\DBALException
     */
    public function translateRootPageFileReferences($page, $uid)
    {
        $intFooterTeaser = FileReferenceRepository::getTranslatedFileReferenceForPage(
            'int_footer_teaser',
            'pages',
            $uid
        );
        $page->setIntFooterTeaser($intFooterTeaser);

        $intTopPages = PagesRepository::getTranslatedPagesForPage(
            'tx_intbuilder_pages_toppages_mm',
            $uid
        );
        $page->setIntTopPages($intTopPages);

        foreach ([ 1, 2, 3, 4 ] as $i) {
            ${'intIcons' . $i} = FileReferenceRepository::getTranslatedFileReferenceForPage(
                'int_icons' . $i,
                'pages',
                $uid
            );
            $page->{'setIntIcons' . $i}(${'intIcons' . $i});

            ${'intBottomPages' . $i} = PagesRepository::getTranslatedPagesForPage(
                'tx_intbuilder_pages_bottompages' . $i . '_mm',
                $uid
            );
            $page->{'setIntBottomPages' . $i}(${'intBottomPages' . $i});
        }
        return $page;
    }


    /**
     * @param $page
     * @param $uid
     *
     * @return mixed
     */
    public function translateFirstPageFileReferences($page, $uid)
    {
        return $page;
    }


    /**
     * @param $page
     * @param $uid
     *
     * @return mixed
     */
    public function translateParentPageFileReferences($page, $uid)
    {
        return $page;
    }

}

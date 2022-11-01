<?php

namespace Int\Inthelper\ViewHelpers;

use Int\Intbuilder\Domain\Model\Pages;
use Int\Intbuilder\Domain\Repository\PagesRepository;
use Int\Inthelper\Service\CacheSnippetService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Get Page Media
 *
 * @package    TYPO3
 * @subpackage Fluid
 * @version
 */
class GetPageMediaViewHelper extends AbstractViewHelper
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
        $this->registerArgument('pageUid', 'int', 'PageUid', false);
    }

    /**
     * Get page
     *
     * @return  \Int\Intbuilder\Domain\Model\FileReference|bool
     */
    public function render()
    {
        $pageUid = $this->arguments['pageUid'];

        if (!$pageUid) {
            $pageUid = $GLOBALS['TSFE']->id;
        }

        $pagesRepository = GeneralUtility::makeInstance(PagesRepository::class);
        $page            = $pagesRepository->findByUid((int)$pageUid);
        if ($page instanceof Pages) {
            return $page->getMedia();
        }

        return false;

    }

}
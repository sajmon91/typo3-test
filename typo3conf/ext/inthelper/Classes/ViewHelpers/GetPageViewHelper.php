<?php

namespace Int\Inthelper\ViewHelpers;

use Int\Intbuilder\Domain\Model\Pages;
use Int\Intbuilder\Domain\Repository\PagesRepository;
use Int\Inthelper\Service\CacheSnippetService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Get Page Object
 *
 * @package    TYPO3
 * @subpackage Fluid
 * @version
 */
class GetPageViewHelper extends AbstractViewHelper
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
        $this->registerArgument('field', 'string', 'Field name', false);
    }

    /**
     * Get page
     *
     * @return bool|\Int\Intbuilder\Domain\Model\Pages
     */
    public function render()
    {
        $pageUid = $this->arguments['pageUid'];
        $field = $this->arguments['field'];

        if (!$pageUid) {
            $pageUid = $GLOBALS['TSFE']->id;
        }

        $pagesRepository = GeneralUtility::makeInstance(PagesRepository::class);
        $page            = $pagesRepository->findByUid((int)$pageUid);
        if ($page instanceof Pages) {
            if (!$field) {
                return $page;
            }
            $getter = 'get'.ucfirst($field);
            if (method_exists(Pages::class, $getter)) {
                return $page->{$getter}();
            }
        }

        return false;

    }

}
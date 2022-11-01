<?php

namespace Int\Inthelper\ViewHelpers;

use Int\Intbuilder\Domain\Model\Pages;
use Int\Intbuilder\Domain\Repository\FileReferenceRepository;
use Int\Intbuilder\Domain\Repository\PagesRepository;
use Int\Inthelper\Service\CacheSnippetService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Get translated FAL object for page [bug due to translation handling of FAL items in pages]
 *
 * @package    TYPO3
 * @subpackage Fluid
 * @version
 */
class GetTranslatedPageFalViewHelper extends AbstractViewHelper
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
     * Get translated page FAL items
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Driver\Exception
     */
    public function render()
    {

        $pageUid = $this->arguments['pageUid'];
        $field   = $this->arguments['field'];

        if (!$pageUid) {
            $pageUid = $GLOBALS['TSFE']->id;
        }

        $pagesRepository = GeneralUtility::makeInstance(PagesRepository::class);
        $page            = $pagesRepository->findByUid((int)$pageUid);

        if (!($page instanceof Pages)) {
            return null;
        }
        $uid = $page->getUid();

        $lang = $GLOBALS['TSFE']->language->getLanguageId();

        $pageTranslated = PagesRepository::getTranslatedPage($uid, $lang);

        return FileReferenceRepository::getTranslatedFileReferenceForPage(
            $field,
            'pages',
            $pageTranslated['uid']
        );
    }

}
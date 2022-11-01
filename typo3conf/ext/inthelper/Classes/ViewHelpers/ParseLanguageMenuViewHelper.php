<?php

namespace Int\Inthelper\ViewHelpers;

use Int\Intbuilder\Domain\Model\Pages;
use Int\Intbuilder\Domain\Repository\PagesRepository;
use Int\Inthelper\Service\CacheSnippetService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Parses language menu
 *
 * @package    TYPO3
 * @subpackage Fluid
 * @version
 */
class ParseLanguageMenuViewHelper extends AbstractViewHelper
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
        $this->registerArgument('langObject', 'array', 'Language Menu object', true);
        $this->registerArgument('hideUnavailable', 'bool', 'Hide unavailable languages', false, true);
        $this->registerArgument('removeActiveLangFromList', 'bool', 'Remove active language from list', false, true);
    }

    /**
     * Get page
     *
     * @return array
     */
    public function render()
    {
        $langObject               = $this->arguments['langObject'];
        $hideUnavailable          = $this->arguments['hideUnavailable'];
        $removeActiveLangFromList = $this->arguments['removeActiveLangFromList'];

        if (!is_array($langObject)) {
            return [];
        }

        $languages      = [];
        $activeLanguage = null;

        foreach ($langObject as $singleLanguage) {
            if ($singleLanguage['active']) {
                $activeLanguage = $singleLanguage;
                if ($removeActiveLangFromList) {
                    continue;
                }
            }
            if (!$hideUnavailable || $singleLanguage['available'] === 1) {
                $languages[$singleLanguage['languageId']] = $singleLanguage;
            }
        }

        return [
            'languages'      => $languages,
            'activeLanguage' => $activeLanguage,
        ];


    }

}
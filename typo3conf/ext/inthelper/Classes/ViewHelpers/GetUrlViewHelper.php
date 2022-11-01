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
class GetUrlViewHelper extends AbstractViewHelper
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
        $this->registerArgument('requestParam', 'string', 'Request parameter', false);
    }

    /**
     * Get SERVER param
     *
     * @return string
     */
    public function render()
    {
        $requestParam = $this->arguments['requestParam'] ?: 'TYPO3_REQUEST_URL';
        return GeneralUtility::getIndpEnv($requestParam);

    }

}
<?php

namespace Int\Inthelper\ViewHelpers;

use Int\Inthelper\Service\CacheSnippetService;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Validates Cached Snippet
 *
 * @package    TYPO3
 * @subpackage Fluid
 * @version
 */
class HasCachedSnippetViewHelper extends AbstractViewHelper
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
        $this->registerArgument('identifier', 'string', 'Cache Snippet identifier', true);
        $this->registerArgument('pageUid', 'int', 'PageUid', false);
    }

    /**
     * Check if cache snippet exists
     *
     * @return string the link title as string, or false if there is none
     * @throws \TYPO3\CMS\Core\Cache\Exception\NoSuchCacheException
     */
    public function render()
    {
        $pageUid    = $this->arguments['pageUid'] ?: 0;
        $identifier = $this->arguments['identifier'];

        return CacheSnippetService::hasSnippetCache($pageUid, $identifier);
    }

}
<?php

namespace Int\Inthelper\ViewHelpers;

use Int\Inthelper\Service\CacheSnippetService;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Get Cached Snippet
 *
 * @package    TYPO3
 * @subpackage Fluid
 * @version
 */
class GetCachedSnippetViewHelper extends AbstractViewHelper
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
        $this->registerArgument('data', 'string', 'Content', false);
    }

    /**
     * Get cache snippet
     *
     * @return string the link title as string, or false if there is none
     * @throws \TYPO3\CMS\Core\Cache\Exception\NoSuchCacheException
     */
    public function render()
    {
        $pageUid    = $this->arguments['pageUid'] > 0 ?: 0;
        $identifier = $this->arguments['identifier'];
        $data       = $this->arguments['data'];

        // We are overriding the Caching mechanisms for the Navigation
        // Disabling Pages, show/hide etc. will not be available
        if (!$data) {
            return CacheSnippetService::getSnippetCache($pageUid, $identifier);
        }
        return CacheSnippetService::getSnippetCache($pageUid, $identifier, $data);
    }

}
<?php

/*
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

namespace Int\Inthelper\Utility;

use TYPO3\CMS\Core\PageTitle\RecordPageTitleProvider;

/**
 * Class PageTitleUtility
 *
 * @package Int\Inthelper\Utility
 */
class PageTitleUtility extends RecordPageTitleProvider
{

    /**
     * Set the title of the current page
     *
     * @param string $title Title
     *
     * @return void
     */
    public function setPageTitle(string $title): void
    {
        if (property_exists($GLOBALS['TSFE'], 'page')) {
            $GLOBALS['TSFE']->page['title'] = $title;
        }

        $this->title = $title;
    }

}

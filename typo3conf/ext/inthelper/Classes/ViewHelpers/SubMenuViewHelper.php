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

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Creates subnav
 */
class SubMenuViewHelper extends AbstractViewHelper
{


    /**
     * Initialize arguments
     *
     * @return void
     * @api
     *
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('menuItems', 'array', 'MenuItems', true);
    }

    /**
     * Split the link tag
     *
     * @return array the link title as string, or false if there is none
     */
    public function render(): array
    {
        $navItemArray = [];
        $counter      = 0;

        foreach ($this->arguments['menuItems'] as $singleItem) {
            if ($singleItem['spacer']) {
                $counter++;
            } else {
                $navItemArray[$counter][] = $singleItem;
            }
        }

        return $navItemArray;
    }

}

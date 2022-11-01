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
 * Sorts array by key
 */
class SortByKeyViewHelper extends AbstractViewHelper
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
        $this->registerArgument('arrayToSort', 'array', 'Array to sort by keys', true);
    }

    /**
     * sort array
     *
     * @return array sorted array
     */
    public function render()
    {
        $arrayToSort = $this->arguments['arrayToSort'];
        ksort($arrayToSort);
        return $arrayToSort;
    }

}

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

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Divides a list as simple list with some divider
 */
class TrimmedListViewHelper extends AbstractViewHelper
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
        $this->registerArgument('list', 'mixed', 'is_iterable list', true);

        $this->registerArgument('prependEach', 'string', 'Prepend each item', false);
        $this->registerArgument('appendEach', 'string', 'Append each item', false);

        $this->registerArgument('prependWhole', 'string', 'Prepend whole list', false);
        $this->registerArgument('appendWhole', 'string', 'Append whole list', false);

        $this->registerArgument('prependFirst', 'bool', 'Prepend first item', false, false);
        $this->registerArgument('appendLast', 'bool', 'Append last item', false, false);
    }

    /**
     * Split the link tag
     *
     * @return string
     *
     */
    public function render()
    {
        $returnValue = [];

        $list = $this->arguments['list'];

        $prependEach = $this->arguments['prependEach'];
        $appendEach  = $this->arguments['appendEach'];

        $prependWhole = $this->arguments['prependWhole'];
        $appendWhole  = $this->arguments['appendWhole'];

        $prependFirst = $this->arguments['prependFirst'] === true ?: false;
        $appendLast  = $this->arguments['appendLast'] === true ?: false;

        if (!is_iterable($list)) {
            return '';
        }

        if ($prependWhole) {
            $returnValue[] = $prependWhole;
        }

        $count = 1;

        foreach ($list as $singleListItem) {
            if ($prependFirst || $count > 1) {
                $returnValue[] = $prependEach;
            }

            $returnValue[] = trim($singleListItem);

            // Add only to latest
            if ($appendLast || $count < count($list)) {
                $returnValue[] = $appendEach;
            }
            $count++;
        }

        if ($appendWhole) {
            $returnValue[] = $appendWhole;
        }

        return implode('', $returnValue);

    }
}

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

use Closure;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * Returns chunks of array / ObjectStorage
 *
 * @package    TYPO3
 * @subpackage Fluid
 * @version
 */
class ChunkColumnsViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    public function initializeArguments()
    {
        $this->registerArgument('list', 'mixed', 'Array / ObjectStorage', true);
        $this->registerArgument('cols', 'integer', 'Number of cols', true);
    }

    public static function renderStatic(
        array $arguments,
        Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $list = $arguments['list'];

        // Cast to array if QueryResult
        if ($list instanceof QueryResultInterface || $list instanceof ObjectStorage) {
            $list = $list->toArray();
        }

        $arrayLength = count($list);

        if ($arrayLength < 1) {
            return [];
        }

        $itemsPerColumn = (int)ceil($arrayLength / $arguments['cols']);
        return array_chunk($list, $itemsPerColumn);
    }
}
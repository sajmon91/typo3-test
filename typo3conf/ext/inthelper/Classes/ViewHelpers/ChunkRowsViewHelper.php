<?php

namespace Int\Inthelper\ViewHelpers;

use Closure;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * Returns chunks of array / ObjectStorage
 *AbstractViewHelper
 *
 * @package    TYPO3
 * @subpackage Fluid
 * @version
 */
class ChunkRowsViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     * Initializes arguments
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('list', 'mixed', 'Array / ObjectStorage', true);
        $this->registerArgument('itemsPerChunk', 'integer', 'Number of items per chunk', true);
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

        if ((int)$arguments['itemsPerChunk'] > 0 && is_array($list)) {
            return array_chunk($list, $arguments['itemsPerChunk']);
        }

        return false;
    }

}

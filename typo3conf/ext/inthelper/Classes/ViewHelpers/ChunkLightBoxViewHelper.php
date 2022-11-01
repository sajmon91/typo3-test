<?php

namespace Int\Inthelper\ViewHelpers;

use Closure;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
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
class ChunkLightBoxViewHelper extends AbstractViewHelper
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
        if (!($arguments['list'] instanceof ObjectStorage)) {
            return [];
        }

        if ((int)$arguments['itemsPerChunk'] > 0) {
            return array_chunk($arguments['list']->toArray(), $arguments['itemsPerChunk']);
        }

        return false;
    }

}

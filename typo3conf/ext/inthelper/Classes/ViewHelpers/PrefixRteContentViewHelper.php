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

namespace Int\Inthelper\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * Injects a snippet into the first <p> at beginning
 * Used to e.g. insert a date into an RTE
 *
 * Before:
 * <p>Content</p>
 *
 * After:
 * <p><contentBefore>Something<contentAfter> Content</p>
 *
 */
class PrefixRteContentViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     * Children must not be escaped, to be able to pass {bodytext} directly to it
     *
     * @var bool
     */
    protected $escapeChildren = false;

    /**
     * Plain HTML should be returned, no output escaping allowed
     *
     * @var bool
     */
    protected $escapeOutput = false;

    /**
     * Initialize arguments.
     *
     * @throws \TYPO3Fluid\Fluid\Core\ViewHelper\Exception
     */
    public function initializeArguments()
    {
        $this->registerArgument('contentToInject', 'string', 'Content', true);
    }

    /**
     * @param array                     $arguments
     * @param \Closure                  $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     *
     * @return string the parsed string.
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {

        $contentToInject = $arguments['contentToInject'];
        $value           = $renderChildrenClosure();
        if (!str_starts_with($value, '<p')) {
            return $value;
        }

        $firstTagClosePosition = strpos($value, '>');

        if (!$firstTagClosePosition) {
            return $value;
        }

        return substr_replace($value, $contentToInject, $firstTagClosePosition + 1, 0);
    }
}

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

use Int\Inthelper\Utility\StringUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * Parses markdown
 */
class ParseMarkdownViewHelper extends AbstractViewHelper
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
        $this->registerArgument('haystack', 'string', 'Haystack', false);
        $this->registerArgument('tag', 'string', 'Tag', false, 'span');
        $this->registerArgument('class', 'string', 'Additional class', false);
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
        $haystack = $arguments['haystack'];
        $tag      = $arguments['tag'] ?: 'span';
        $class    = $arguments['class'];
        $value    = $haystack ?: $renderChildrenClosure();

        $value = str_replace('|', '<br />', $value);

        return StringUtility::parseSimpleMarkdown($value, ['_' => $tag], $class);

    }


}

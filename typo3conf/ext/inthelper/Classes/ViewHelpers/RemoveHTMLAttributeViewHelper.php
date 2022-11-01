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
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * Removes specific html attribute
 */
class RemoveHTMLAttributeViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     * Children must not be escaped, to be able to pass {bodytext} directly to it
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
        $this->registerArgument('attributeToRemove', 'string', 'Attribut to remove, e.g. style', true);
    }

    /**
     * @var boolean
     */

    /**
     * @param array                     $arguments
     * @param \Closure                  $childClosure
     * @param RenderingContextInterface $renderingContext
     *
     * @return string
     */
    public static function renderStatic(
        array $arguments,
        \Closure $childClosure,
        RenderingContextInterface $renderingContext
    ) {
        $attributeToRemove = $arguments['attributeToRemove'];
        return preg_replace('/(<[^>]+) '.$attributeToRemove.'=".*?"/i', '$1', $childClosure());
    }
}

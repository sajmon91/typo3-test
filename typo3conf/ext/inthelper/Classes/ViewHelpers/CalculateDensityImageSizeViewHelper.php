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
 * Replaces Pipe with BR
 */
class CalculateDensityImageSizeViewHelper extends AbstractViewHelper
{

    /**
     * Initialize arguments.
     *
     * @throws \TYPO3Fluid\Fluid\Core\ViewHelper\Exception
     */
    public function initializeArguments()
    {
        $this->registerArgument('dimension', 'string', ' Dimension', true);
        $this->registerArgument('factor', 'float', ' Factor', true);
    }

    /**
     * Extract phone number from string with sign +
     *
     * @return string
     */
    public function render()
    {
        $dimension = $this->arguments['dimension'];
        $factor    = $this->arguments['factor'];

        if (str_contains($dimension, 'c')) {
            return (int)$dimension * $factor . 'c';
        }
        return (int)$dimension * $factor;
    }
}

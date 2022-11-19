<?php
declare(strict_types=1);

namespace Sajmon\Test\ViewHelpers;

use DOMDocument;
use DOMXPath;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;


final class YoutubeViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    protected $escapeOutput = false;
    public function initializeArguments()
    {
        $this->registerArgument('text', 'string', 'convert link in iframe', false);
    }

    public static function renderStatic(
        array $arguments,
        \Closure $childClosure,
        RenderingContextInterface $renderingContext
    ) {
        // convert a tag whit youtube href to iframe
        $text = $arguments['text'];
        $res = preg_replace('/<a\s+href=("\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)")\s+.*?<\/a>/', '<iframe src="https://www.youtube.com/embed/$3" height="400" width="100%" allowfullscreen></iframe>', $text);

        // DebuggerUtility::var_dump($res);

        return $res;
    }

}
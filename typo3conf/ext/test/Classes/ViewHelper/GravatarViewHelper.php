<?php
declare(strict_types=1);

namespace Sajmon\Test\ViewHelpers;

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

final class GravatarViewHelper extends AbstractTagBasedViewHelper
{
    protected $tagName = 'img';

    public function initializeArguments()
    {
        $this->registerArgument('emailAddress', 'string', 'The email address to resolve the gravatar for', false, null);
    }

    public function render()
    {
        $emailAddress = $this->arguments['emailAddress'] ?? $this->renderChildren();

        // DebuggerUtility::var_dump($emailAddress);

        $this->tag->addAttribute(
            'src',
            'http://www.gravatar.com/avatar/' . md5($emailAddress)
        );

        return $this->tag->render();
    }
}
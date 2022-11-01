<?php

namespace Int\Inthelper\ViewHelpers;

use Int\Intbuilder\Domain\Model\Pages;
use Int\Intbuilder\Domain\Repository\PagesRepository;
use Int\Inthelper\Service\CacheSnippetService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Get Page Object
 *
 * @package    TYPO3
 * @subpackage Fluid
 * @version
 */
class GetImageDimensionsViewHelper extends AbstractViewHelper
{

    protected $escapeOutput = false;


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
        $this->registerArgument('imagePath', 'string', 'Image Path', true);
        $this->registerArgument('returnParsedDimensions', 'bool', 'Return parsed dimensions', false);
        $this->registerArgument('setAutoHeight', 'bool', 'Set height to "auto"', false);
    }

    /**
     *
     * @return array|string
     */
    public function render()
    {
        $imagePath  = urldecode(GeneralUtility::getIndpEnv('TYPO3_DOCUMENT_ROOT') . $this->arguments['imagePath']);
        $imageSizes = getimagesize($imagePath);

        $height = 'height: ' . $imageSizes[0] . 'px';
        if ($this->arguments['setAutoHeight']) {
            $height = 'auto !important';
        }

        if ($this->arguments['returnParsedDimensions']) {
            return 'width="' . $imageSizes[0] . 'px" height="' . $imageSizes[1] . 'px" style="width:' . $imageSizes[0] . 'px; ' . $height . '"';
        }
        return $imageSizes;
    }

}
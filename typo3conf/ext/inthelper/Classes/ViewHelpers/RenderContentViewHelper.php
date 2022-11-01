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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\RecordsContentObject;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Renders Content element base on Content Element UID
 */
class RenderContentViewHelper extends AbstractViewHelper
{


    /**
     * @var RecordsContentObject
     */
    protected $recordsContentObject;

    public function __construct(RecordsContentObject $recordsContentObject)
    {
        $this->recordsContentObject = $recordsContentObject;
    }

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
        $this->registerArgument('contentUid', 'int', 'Content UID', true);
    }

    /**
     * Return content element
     *
     * @return string
     */
    public function render()
    {
        $contentUid = $this->arguments['contentUid'];
        $conf       = [
            'tables'       => 'tt_content',
            'source'       => $contentUid,
            'dontCheckPid' => 1,
        ];
        return $this->recordsContentObject->render($conf);
    }

}

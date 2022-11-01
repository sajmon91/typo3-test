<?php
declare(strict_types=1);
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


namespace Int\Inthelper\ViewHelpers;


use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;


/**
 * Get Youtube ID from passsed url
 */
class YouTubeVideoIdViewHelper extends AbstractViewHelper
{


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
        $this->registerArgument('url', 'string', 'Url link', true);
    }


    /**
     * Split the link tag
     *
     * @return string
     *
     */
    public function render()
    {
        $url = $this->arguments['url'];
        if (stristr($url, 'youtu.be/')) {
            preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID);
            return $final_ID[4];
        } else {
            @preg_match(
                '/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i',
                $url,
                $final_ID
            );
            return $final_ID[5];
        }
    }
}




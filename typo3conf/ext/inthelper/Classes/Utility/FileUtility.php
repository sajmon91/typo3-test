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

declare(strict_types=1);

namespace Int\Inthelper\Utility;

use Int\Inthelper\Helper\SlackHelper;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Resource\Exception\InvalidFileException;

/**
 * FileUtility
 */
class FileUtility
{

    /**
     * Validates if file exists
     *
     * @param string $file         Absolute File Path
     * @param bool   $triggerError Trigger Error
     *
     * @return bool
     * @throws \JsonException
     * @throws \TYPO3\CMS\Core\Resource\Exception\InvalidFileException
     */
    public static function validateAbsoluteFile(string $file, bool $triggerError = false): bool
    {
        // $file must be absolute, so check if file exists
        // Get response code

        if (!is_file($file) && !is_file(Environment::getPublicPath() . $file)) {
            if ($triggerError) {
                SlackHelper::notifySlackChannel(
                    'File missing: "' . $file . '"',
                    'File missing: "' . $file . '"',
                    [
                        'FILE: ' . __FILE__ . ':' . __LINE__,
                    ],
                    SlackHelper::LOGTYPE_ERROR
                );
                throw new InvalidFileException(
                    'Missing file "' . $file . '"'
                );
            }
            return false;
        }
        return true;
    }

    /**
     * Validates if folder exists
     *
     * @param string $folder       Absolute Folder Path
     * @param bool   $triggerError Trigger Error
     *
     * @return bool
     * @throws \JsonException
     * @throws \TYPO3\CMS\Core\Resource\Exception\InvalidFileException
     */
    public static function validateAbsoluteFolder(string $folder, bool $triggerError = false): bool
    {
        // $file must be absolute, so check if file exists
        // Get response code

        if (!is_dir($folder)) {

            if ($triggerError) {
                SlackHelper::notifySlackChannel(
                    'Folder missing: "' . $folder . '"',
                    'Folder missing: "' . $folder . '"',
                    [
                        'FILE: ' . __FILE__ . ':' . __LINE__,
                    ],
                    SlackHelper::LOGTYPE_ERROR
                );
                throw new InvalidFileException(
                    'Missing folder "' . $folder . '"'
                );
            }
            return false;
        }
        return true;
    }

}

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

namespace Int\Inthelper\Helper;


/**
 * LogHelper
 */
class LogHelper
{

    public const LOGTYPE_DEV   = 'dev';
    public const LOGTYPE_ERROR = 'error';
    public const LOGTYPE_INFO     = 'info';
    public const LOGTYPE_SECURITY = 'security';

    /**
     * Notifies Slack channel
     *
     * @param string $title           Title
     * @param string $note            Note
     * @param array  $origin          Origin
     * @param string $type            Message Type
     * @param bool   $replaceNewLines Replace new lines
     *
     * @return void
     */
    public static function logMessageToFile(
        string $title,
        string $note,
        array $origin = [],
        string $type = self::LOGTYPE_DEV,
        bool $replaceNewLines
    ): void {

        $message = [];

        $message[] = $type;
        $message[] = date('Y-m-d H:i:s');
        $message[] = str_replace("\n", ' ', $title);
        if ($replaceNewLines) {
            $message[] = str_replace("\n", ' ', $note);
        } else {
            $message[] = $note;
        }
        $message[] = implode(', ', str_replace("\n", ' ', $origin));

        $file = fopen(
            $GLOBALS['TYPO3_CONF_VARS']['SYS']['logPath'] . $type . '-' . date('Y-m-d', time()) . '.log',
            'ab'
        );

        if (!$file) {
            SlackHelper::notifySlackChannel(
                'File not writable: ' . $GLOBALS['TYPO3_CONF_VARS']['SYS']['logPath'] . $type . '-' . date(
                    'Y-m-d',
                    time()
                ) . '.log',
                'Content to be written: ' . implode('; ', $message),
                [
                    '*File:* ' . __FILE__ . ', ' . __LINE__,
                ],
                SlackHelper::LOGTYPE_ERROR
            );
            return;
        }

        fwrite($file, implode('; ', $message) . "\n");
        fclose($file);
    }

}

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
 * SlackHelper
 */
class SlackHelper
{

    public const LOGTYPE_DEV      = 'dev';
    public const LOGTYPE_ERROR    = 'error';
    public const LOGTYPE_INFO     = 'info';
    public const LOGTYPE_SECURITY = 'security';

    /**
     * Notifies Slack channel
     *
     * @param string       $title    Title
     * @param string|array $note     Note
     * @param array        $origin   Origin
     * @param string       $type     Message Type
     * @param string       $channel  Channel
     * @param string       $username Username
     * @param string       $icon     Icon with full path
     *
     * @return void
     * @throws \JsonException
     */
    public static function notifySlackChannel(
        string $title,
        $note,
        array $origin = [],
        string $type = self::LOGTYPE_DEV,
        string $channel = '',
        string $username = '',
        string $icon = '',
        string $slackHook = ''
    ) {
        
        if ($slackHook === '') {
            $slackHook = $GLOBALS['TYPO3_CONF_VARS']['SYS']['slackhook'][$type];
        }

        if (empty($slackHook)) {
            $slackHook = $GLOBALS['TYPO3_CONF_VARS']['SYS']['slackhook']['dev'];
        }

        if (empty($slackHook)) {
            $serverData   = [];
            $serverData[] = $_SERVER['SERVER_NAME'];
            $serverData[] = $_SERVER['HTTP_HOST'];
            $serverData[] = __FILE__;
            $serverData[] = __LINE__;
            $serverData[] = ' – SET $GLOBALS[\'TYPO3_CONF_VARS\'][\'SYS\'][\'slackhook\'][' . $type . ']';
            mail(
                'logs@intention.rs',
                'Slack Hook empty at ' . $_SERVER['HTTP_HOST'],
                'Slack hook is empty: ' . implode(" ", $serverData)
            );
        }

        $noteText = [];

        if ($title) {
            $noteText[] = '*' . $title . '*';
        }

        if ($note) {
            if (is_array($note)) {
                $noteText[] = var_export($note, true);
            } else {
                $noteText[] = $note;
            }
        }

        if ($_SERVER['HTTP_REFERER']) {
            $noteText[] = "\n*Referer:* " . $_SERVER['HTTP_REFERER'];
        } else if ($_SERVER['SCRIPT_FILENAME']) {
            $noteText[] = "\n*Script filename:* " . $_SERVER['SCRIPT_FILENAME'];
        }

        $noteText[] = implode("\n", $origin);

        $data = [
            'text'     => implode("\n", $noteText),
            'icon_url' => $icon,
            'username' => $username,
            'channel'  => $channel,
        ];

        $ch = curl_init();

        curl_setopt_array(
            $ch,
            [
                CURLOPT_URL            => $slackHook,
                CURLOPT_POST           => 1,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_POSTFIELDS     => [
                    'payload' => json_encode($data, JSON_THROW_ON_ERROR),
                ],
            ]
        );

        curl_exec($ch);
        curl_close($ch);
    }

}

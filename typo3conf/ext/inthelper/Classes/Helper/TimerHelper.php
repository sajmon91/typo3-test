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

use DateTime;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class TimerHelper
{

    public array $timerArray = [];
    public string $timerTitle = '';

    /**
     * @param string $message
     */
    public function addTimer(string $message): void
    {
        $this->timerArray[] = [
            'time'    => microtime(true),
            'message' => $message,
        ];
    }

    /**
     * @param string $message
     *
     * @return void
     */
    public function returnTimer(string $message = ''): void
    {

        $this->addTimer($message);

        foreach ($this->timerArray as $key => $singleTimer) {
            if ($key === 0) {
                $date = DateTime::createFromFormat(
                    'U.u',
                    number_format(microtime(true), 6, '.', '')
                );

                $value = $singleTimer['message'] . ': ' . $date->format('m-d-Y H:i:s.u');
            } else {
                $value = $singleTimer['message'] . ': ' . round(
                        $singleTimer['time'] - $this->timerArray[($key - 1)]['time'],
                        4
                    ) . 's';
            }
            DebuggerUtility::var_dump($value);
        }
    }

}
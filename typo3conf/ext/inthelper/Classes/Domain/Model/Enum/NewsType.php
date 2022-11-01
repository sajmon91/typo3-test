<?php
/**
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

namespace Int\Inthelper\Domain\Model\Enum;

use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * This model represents an news type
 */
class NewsType
{

    public const LANGUAGE_PATH = 'LLL:EXT:inthelper/Resources/Private/Language/locallang_enum_db.xlf:news_type.';

    public const NEWS  = 0;
    public const EVENT = 100;

    /**
     * Returns the news type labels
     *
     * @return array $newsTypes
     */
    public static function toConfigArray(): array
    {
        return [
            [
                self::LANGUAGE_PATH . 'news',
                self::NEWS,
            ],
            [
                self::LANGUAGE_PATH . 'event',
                self::EVENT,
            ],
        ];
    }

    /**
     * Returns the news types
     *
     * @return array $newsTypes
     */
    public static function toArray()
    {
        return [
            self::NEWS  => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'news',
                'inthelper'
            ),
            self::EVENT => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'event',
                'inthelper'
            ),
        ];
    }

    /**
     * @param int $newsType
     *
     * @return mixed|string
     */
    public static function getNameByNewsType(int $newsType)
    {
        $namesArray = self::toArray();
        if ($namesArray[$newsType]) {
            return $namesArray[$newsType];
        }
        return '';
    }
}
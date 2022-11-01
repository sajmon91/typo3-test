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
 * This model represents a category type
 */
class CategoryType
{

    public const LANGUAGE_PATH = 'LLL:EXT:inthelper/Resources/Private/Language/locallang_enum_db.xlf:category_type.';

    public const NONE               = 0;
    public const ITEM_CATEGORY      = 100;
    public const NEWS_CATEGORY      = 200;
    public const EVENT_CATEGORY     = 300;
    public const LOCATION_CATEGORY  = 400;
    public const REFERENCE_CATEGORY = 500;

    /**
     * Returns the category type labels
     *
     * @return array $categoryTypes
     */
    public static function toConfigArray(): array
    {
        return [
            [ '', self::NONE ],
            [
                self::LANGUAGE_PATH . 'item_category',
                self::ITEM_CATEGORY,
            ],
            [
                self::LANGUAGE_PATH . 'news_category',
                self::NEWS_CATEGORY,
            ],
            [
                self::LANGUAGE_PATH . 'event_category',
                self::EVENT_CATEGORY,
            ],
            [
                self::LANGUAGE_PATH . 'location_category',
                self::LOCATION_CATEGORY,
            ],
            [
                self::LANGUAGE_PATH . 'reference_category',
                self::REFERENCE_CATEGORY,
            ],
        ];
    }

    /**
     * Returns the category types
     *
     * @return array $categoryTypes
     */
    public static function toArray()
    {
        return [
            self::NONE               => '',
            self::ITEM_CATEGORY      => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'item_category',
                'inthelper'
            ),
            self::NEWS_CATEGORY      => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'news_category',
                'inthelper'
            ),
            self::EVENT_CATEGORY     => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'event_category',
                'inthelper'
            ),
            self::LOCATION_CATEGORY  => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'location_category',
                'inthelper'
            ),
            self::REFERENCE_CATEGORY => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'reference_category',
                'inthelper'
            ),
        ];
    }

    /**
     * @param int $categoryType
     *
     * @return mixed|string
     */
    public static function getNameByCategoryType(int $categoryType)
    {
        $namesArray = self::toArray();
        if ($namesArray[$categoryType]) {
            return $namesArray[$categoryType];
        }
        return '';
    }
}
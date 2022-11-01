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
 * This model represents a property type
 */
class PropertyType
{

    public const LANGUAGE_PATH = 'LLL:EXT:inthelper/Resources/Private/Language/locallang_enum_db.xlf:property_type.';

    public const NONE   = 0;
    public const STRING = 10;
    public const NUMBER = 20;
    public const TEXT   = 30;
    public const BOOL   = 40;
    public const FILE   = 50;


    /**
     * Returns the bool option labels
     *
     * @return array $categoryTypes
     */
    public static function toConfigArray(): array
    {
        return [
            [ '', self::NONE ],
            [
                self::LANGUAGE_PATH . 'string',
                self::STRING,
            ],
            [
                self::LANGUAGE_PATH . 'number',
                self::NUMBER,
            ],
            [
                self::LANGUAGE_PATH . 'text',
                self::TEXT,
            ],
            [
                self::LANGUAGE_PATH . 'bool',
                self::BOOL,
            ],
        ];
    }

    /**
     * Returns the bool options
     *
     * @return array $boolOptions
     */
    public static function toArray(): array
    {
        return [
            self::NONE   => '',
            self::STRING => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'string',
                'inthelper'
            ),
            self::NUMBER => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'number',
                'inthelper'
            ),
            self::TEXT   => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'text',
                'inthelper'
            ),
            self::BOOL   => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'bool',
                'inthelper'
            ),
        ];
    }


    /**
     * Returns the bool option labels
     *
     * @return array $categoryTypes
     */
    public static function toImportArray(): array
    {
        return [
            [ '', self::NONE ],
            [
                'string',
                self::STRING,
            ],
            [
                'number',
                self::NUMBER,
            ],
            [
                'text',
                self::TEXT,
            ],
            [
                'bool',
                self::BOOL,
            ],
        ];
    }
}
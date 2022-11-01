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
 * This model represents a bool option
 */
class BoolOption
{

    public const LANGUAGE_PATH = 'LLL:EXT:inthelper/Resources/Private/Language/locallang_enum_db.xlf:bool_option.';

    public const NONE = 0;
    public const YES  = 10;
    public const NO   = 20;

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
                self::LANGUAGE_PATH . 'yes',
                self::YES,
            ],
            [
                self::LANGUAGE_PATH . 'no',
                self::NO,
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
            self::NONE => '',
            self::YES  => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'yes',
                'inthelper'
            ),
            self::NO   => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'no',
                'inthelper'
            ),
        ];
    }
}
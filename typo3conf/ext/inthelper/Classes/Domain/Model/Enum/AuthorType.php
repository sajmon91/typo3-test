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
 * This model represents an author type
 */
class AuthorType
{

    public const LANGUAGE_PATH = 'LLL:EXT:inthelper/Resources/Private/Language/locallang_enum_db.xlf:author_type.';

    public const NONE   = 0;
    public const EDITOR = 100;

    /**
     * Returns the author type labels
     *
     * @return array $authorTypes
     */
    public static function toConfigArray(): array
    {
        return [
            [ '', self::NONE ],
            [
                self::LANGUAGE_PATH . 'editor',
                self::EDITOR,
            ],
        ];
    }

    /**
     * Returns the author types
     *
     * @return array $authorTypes
     */
    public static function toArray()
    {
        return [
            self::NONE   => '',
            self::EDITOR => LocalizationUtility::translate(
                self::LANGUAGE_PATH . 'editor',
                'inthelper'
            ),
        ];
    }

    /**
     * @param int $authorType
     *
     * @return mixed|string
     */
    public static function getNameByAuthorType(int $authorType)
    {
        $namesArray = self::toArray();
        if ($namesArray[$authorType]) {
            return $namesArray[$authorType];
        }
        return '';
    }
}
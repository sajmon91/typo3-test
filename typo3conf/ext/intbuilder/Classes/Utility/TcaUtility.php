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

namespace Int\Intbuilder\Utility;

use Int\Inthelper\UserFunctions\FormEngine\SlugPrefix;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Adds Field Definitions
 */
class TcaUtility
{

    /**
     * @var string
     */
    public static string $langFile = 'LLL:EXT:intbuilder/Resources/Private/Language/locallang_content_db.xlf:';

    /**
     * @var string
     */
    public static string $langFileCore = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';

    /**
     * @var array|string[]
     */
    public static array $defaultCeFields = [

        'int_identifier' => 'string',

        'int_header1' => 'string',
        'int_header2' => 'string',
        'int_header3' => 'string',

        'int_subheader1' => 'string',
        'int_subheader2' => 'string',
        'int_subheader3' => 'string',

        'int_lead1' => 'rte',
        'int_lead2' => 'rte',
        'int_lead3' => 'rte',

        'int_text1' => 'rte',
        'int_text2' => 'rte',
        'int_text3' => 'rte',

        'int_link_phone1' => 'link_phone',
        'int_link_phone2' => 'link_phone',
        'int_link_phone3' => 'link_phone',

        'int_link_mail1' => 'link_mail',
        'int_link_mail2' => 'link_mail',
        'int_link_mail3' => 'link_mail',

        'int_link_external1' => 'link_external',
        'int_link_external2' => 'link_external',
        'int_link_external3' => 'link_external',

        'int_link_file1' => 'link_file',
        'int_link_file2' => 'link_file',
        'int_link_file3' => 'link_file',

        'int_link1' => 'link',
        'int_link2' => 'link',
        'int_link3' => 'link',

        'int_image1' => 'image',
        'int_image2' => 'image',
        'int_image3' => 'image',

        'int_video1' => 'video',
        'int_video2' => 'video',
        'int_video3' => 'video',

        'int_number1' => 'integer',
        'int_number2' => 'integer',
        'int_number3' => 'integer',

        'int_float1' => 'float',
        'int_float2' => 'float',
        'int_float3' => 'float',

        'int_select1' => 'select',
        'int_select2' => 'select',
        'int_select3' => 'select',

        'int_checkbox1' => 'checkbox',
        'int_checkbox2' => 'checkbox',
        'int_checkbox3' => 'checkbox',
    ];

    /**
     * We will add default SIZE select options for these fields
     *
     * @var array|string[]
     */
    public static array $positionCeDropdownFields = [
    ];

    /**
     * We will add default COLOR select options for these fields
     *
     * @var array|string[]
     */
    public static array $colorCeDropdownFields = [
    ];

    /**
     * Default SIZES array, used for margins, paddings etc.
     *
     * @var array|string[]
     */
    public static array $sizesArray = [
        [ '', '' ],
        [ 'xxs', 'xxs' ],
        [ 'xs', 'xs' ],
        [ 's', 's' ],
        [ 'm', 'm' ],
        [ 'l', 'l' ],
        [ 'xl', 'xl' ],
        [ 'xxl', 'xxl' ],
    ];

    /**
     * Default COLORS array, used for backgrounds etc.
     *
     * @var array|string[]
     */
    public static array $colorsArray = [
        [ '', '' ],
        [ 'Accent Background', 'accent1' ],
        [ 'Accent Background 2', 'accent2' ],
        [ 'Light Background', 'light1' ],
        [ 'Light Background 2', 'light2' ],
    ];

    /**
     * reloadOnChange
     */
    public static array $reloadOnChangeFields = [];

    /**
     * reloadOnChange
     */
    public static array $displayConditions = [];

    /**
     * Add Default Fields for CE
     *
     * @return array
     */
    public static function addDefaultCeFields(): array
    {
        $returnArray = [];

        foreach (static::$defaultCeFields as $defaultCeFieldName => $defaultCeFieldType) {
            $inputConfig = [];
            if (array_key_exists($defaultCeFieldName, self::$displayConditions)) {
                $inputConfig['displayCond'] = self::$displayConditions[$defaultCeFieldName];
            }
            if (in_array($defaultCeFieldName, self::$reloadOnChangeFields, true)) {
                $inputConfig['onChange'] = 'reload';
            }

            switch ($defaultCeFieldType) {
                case 'string':
                    $returnArray[$defaultCeFieldName] = self::addInput(
                        $defaultCeFieldName,
                        'tt_content',
                        $inputConfig
                    );
                    break;
                case 'rte':
                    $returnArray[$defaultCeFieldName] = self::addRte(
                        $defaultCeFieldName,
                        'tt_content',
                        $inputConfig
                    );
                    break;
                case 'link':
                    $returnArray[$defaultCeFieldName] = self::addLink(
                        $defaultCeFieldName,
                        'tt_content',
                        $inputConfig,
                        false,
                        false,
                        true,
                        false,
                        false,
                        false,
                        false,
                        true,
                        true,
                        false,
                        false
                    );
                    break;
                case 'link_phone':
                    $returnArray[$defaultCeFieldName] = self::addPhoneLink(
                        $defaultCeFieldName,
                        'tt_content',
                        $inputConfig
                    );
                    break;
                case 'link_mail':
                    $returnArray[$defaultCeFieldName] = self::addMailLink(
                        $defaultCeFieldName,
                        'tt_content',
                        $inputConfig
                    );
                    break;
                case 'link_external':
                    $returnArray[$defaultCeFieldName] = self::addExternalLink(
                        $defaultCeFieldName,
                        'tt_content',
                        $inputConfig
                    );
                    break;
                case 'link_file':
                    $returnArray[$defaultCeFieldName] = self::addFileLink(
                        $defaultCeFieldName,
                        'tt_content',
                        $inputConfig
                    );
                    break;
                case 'image':
                    $returnArray[$defaultCeFieldName] = self::addImage(
                        $defaultCeFieldName,
                        'tt_content',
                        0,
                        1,
                        null,
                        $inputConfig
                    );
                    break;
                case 'video':
                    $returnArray[$defaultCeFieldName] = self::addVideo(
                        $defaultCeFieldName,
                        'tt_content',
                        0,
                        20,
                        $inputConfig
                    );
                    break;
                case 'integer':
                    $returnArray[$defaultCeFieldName] = self::addInteger(
                        $defaultCeFieldName,
                        'tt_content',
                        0,
                        99999999,
                        $inputConfig
                    );
                    break;
                case 'float':
                    $returnArray[$defaultCeFieldName] = self::addFloat(
                        $defaultCeFieldName,
                        'tt_content',
                        0,
                        99999999,
                        $inputConfig
                    );
                    break;
                case 'checkbox':
                    $returnArray[$defaultCeFieldName] = self::addCheckbox(
                        $defaultCeFieldName,
                        'tt_content',
                        $inputConfig
                    );
                    break;
                case 'group':
                    $returnArray[$defaultCeFieldName] = self::addGroup(
                        $defaultCeFieldName,
                        'tt_content',
                        'tt_content',
                        $inputConfig
                    );
                    break;
                case 'select':
                    $items = [ [ '', '' ] ];
                    if (in_array($defaultCeFieldName, self::$positionCeDropdownFields, true)) {
                        $items = self::$sizesArray;
                    }
                    if (in_array($defaultCeFieldName, self::$colorCeDropdownFields, true)) {
                        $items = self::$colorsArray;
                    }

                    $returnArray[$defaultCeFieldName] = self::addSelect(
                        $defaultCeFieldName,
                        'tt_content',
                        $items,
                        0,
                        1,
                        $inputConfig
                    );
                    break;
            }
        }

        return $returnArray;
    }

    /**
     * Adds an input field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param array|null $config     Config array
     * @param int|null   $size       Input field size
     * @param int|null   $max        Max count of characters
     *
     * @return array
     */
    public static function addInput(
        string $identifier,
        string $table,
        ?array $config = [],
        ?int $size = 60,
        ?int $max = 200
    ): array {
        $inputConfig = [
            'exclude'     => 1,
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',
            'config'      => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => $size,
                'max'  => $max,
            ],
        ];

        return array_replace_recursive($inputConfig, $config);
    }

    /**
     * Adds an input field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param array|null $config     Config array
     * @param int|null   $lower      Min value
     * @param int|null   $upper      Highest value
     * @param int|null   $step       Step
     * @param int|null   $width      Width
     *
     * @return array
     */
    public static function addRange(
        string $identifier,
        string $table,
        ?array $config = [],
        ?int $lower = 0,
        ?int $upper = 200,
        ?int $step = 1,
        ?int $width = 200
    ): array {
        $inputConfig = [
            'exclude'     => 1,
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',
            'config'      => [
                'type'    => 'input',
                'size'    => 10,
                'eval'    => 'trim,int',
                'range'   => [
                    'lower' => $lower,
                    'upper' => $upper,
                ],
                'default' => 10,
                'slider'  => [
                    'step'  => $step,
                    'width' => $width,
                ],
            ],
        ];

        return array_replace_recursive($inputConfig, $config);
    }

    /**
     * Adds an date field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param string     $dbType     Date
     * @param array|null $config     Config array
     *
     * @return array
     */
    public static function addDatePicker(
        string $identifier,
        string $table,
        string $dbType = 'date',
        ?array $config = []
    ): array {
        $inputConfig = [
            'exclude'     => 1,
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',
            'config'      => [
                'dbType'     => $dbType,
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'eval'       => 'date',
            ],
        ];

        return array_replace_recursive($inputConfig, $config);
    }

    /**
     * Adds an input field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param array|null $config     Config array
     *
     * @return array
     */
    public static function addCheckbox(
        string $identifier,
        string $table,
        ?array $config = []
    ): array {
        $inputConfig = [
            'exclude'     => 1,
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',
            'config'      => [
                'type' => 'check',
            ],
        ];

        return array_replace_recursive($inputConfig, $config);
    }

    /**
     * Adds an text field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param array|null $config     Config array
     * @param int|null   $max        Max count of characters
     * @param int|null   $rows       Rows
     *
     * @param int|null   $cols       Columns
     *
     * @return array
     */
    public static function addText(
        string $identifier,
        string $table,
        ?array $config = [],
        ?int $max = 1000,
        ?int $rows = 5,
        ?int $cols = 40
    ): array {
        $inputConfig = [
            'exclude'     => 1,
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',
            'config'      => [
                'type' => 'text',
                'eval' => 'trim',
                'cols' => $cols,
                'rows' => $rows,
                'max'  => $max,
            ],
        ];

        return array_replace_recursive($inputConfig, $config);
    }

    /**
     * Adds an text field
     *
     * @param string      $identifier            Identifier
     * @param string      $table                 Table Name
     * @param array|null  $config                Config array
     * @param string|null $richtextConfiguration RTE Configuration preset
     * @param int|null    $cols                  Columns
     * @param int|null    $rows                  Rows
     * @param int|null    $max                   Max count of characters
     *
     * @return array
     */
    public static function addRte(
        string $identifier,
        string $table,
        ?array $config = [],
        ?string $richtextConfiguration = 'default',
        ?int $cols = 40,
        ?int $rows = 5,
        ?int $max = 1000
    ): array {
        $inputConfig = [
            'config' => [
                'type'                  => 'text',
                'eval'                  => 'trim',
                'cols'                  => $cols,
                'rows'                  => $rows,
                'max'                   => $max,
                'enableRichtext'        => true,
                'richtextConfiguration' => $richtextConfiguration,
            ],
        ];

        return static::addText(
            $identifier,
            $table,
            array_replace_recursive($inputConfig, $config)
        );
    }

    /**
     * Adds an link field
     *
     * @param string     $identifier   Identifier
     * @param string     $table        Table Name
     * @param array|null $config       Config array
     * @param bool       $removeFile   Allow file
     * @param bool       $removeMail   Allow Mail
     * @param bool       $removeFolder Allow Folder
     * @param bool       $removeUrl    Allow Url
     * @param bool       $removePage   Allow Page
     * @param bool       $removeSpec   Allow Specials,
     * @param bool       $removePhone  Allow Phone,
     * @param bool       $hideClass    Show Class input
     * @param bool       $hideParams   Show Params
     * @param bool       $hideTarget   Show Target field
     * @param bool       $hideTitle    Show Title field
     *
     * @return array
     */
    public static function addLink(
        string $identifier,
        string $table,
        ?array $config = [],
        bool $removeFile = false,
        bool $removeMail = false,
        bool $removeFolder = true,
        bool $removeUrl = false,
        bool $removePage = false,
        bool $removeSpec = true,
        bool $removePhone = false,
        bool $hideClass = true,
        bool $hideParams = true,
        bool $hideTarget = false,
        bool $hideTitle = false
    ): array {
        $blindLinkFieldsArray  = [];
        $blindLinkOptionsArray = [];

        if ($hideClass) {
            $blindLinkFieldsArray[] = 'class';
        }

        if ($hideParams) {
            $blindLinkFieldsArray[] = 'params';
        }

        if ($hideTarget) {
            $blindLinkFieldsArray[] = 'target';
        }

        if ($hideTitle) {
            $blindLinkFieldsArray[] = 'title';
        }

        if ($removeFile) {
            $blindLinkOptionsArray[] = 'file';
        }

        if ($removeMail) {
            $blindLinkOptionsArray[] = 'mail';
        }

        if ($removeFolder) {
            $blindLinkOptionsArray[] = 'folder';
        }

        if ($removeUrl) {
            $blindLinkOptionsArray[] = 'url';
        }

        if ($removePage) {
            $blindLinkOptionsArray[] = 'page';
        }

        if ($removeSpec) {
            $blindLinkOptionsArray[] = 'spec';
        }

        if ($removePhone) {
            $blindLinkOptionsArray[] = 'telephone';
        }

        $inputConfig = [
            'config' => [
                'renderType'   => 'inputLink',
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'blindLinkFields'  => implode(', ', $blindLinkFieldsArray),
                            'blindLinkOptions' => implode(', ', $blindLinkOptionsArray),
                        ],
                    ],
                ],
            ],
        ];

        return static::addInput(
            $identifier,
            $table,
            array_replace_recursive($inputConfig, $config)
        );
    }

    /**
     * Adds an phone link field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param array|null $config     Config array
     *
     * @return array
     */
    public static function addPhoneLink(
        string $identifier,
        string $table,
        ?array $config = []
    ): array {
        $inputConfig = [
            'config' => [
                'renderType'   => 'inputLink',
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'blindLinkOptions' => 'file, mail, folder, url, page, spec',
                            'blindLinkFields'  => 'class, params',
                        ],
                    ],
                ],
            ],
        ];

        return static::addInput(
            $identifier,
            $table,
            array_replace_recursive($inputConfig, $config)
        );
    }

    /**
     * Adds an phone link field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param array|null $config     Config array
     *
     * @return array
     */
    public static function addMailLink(
        string $identifier,
        string $table,
        ?array $config = []
    ): array {
        $inputConfig = [
            'config' => [
                'renderType'   => 'inputLink',
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'blindLinkOptions' => 'file, folder, url, page, spec, telephone',
                            'blindLinkFields'  => 'class, params',
                        ],
                    ],
                ],
            ],
        ];

        return static::addInput(
            $identifier,
            $table,
            array_replace_recursive($inputConfig, $config)
        );
    }

    /**
     * Adds an link field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param array|null $config     Config array
     *
     * @return array
     */
    public static function addExternalLink(
        string $identifier,
        string $table,
        ?array $config = []
    ): array {
        $inputConfig = [
            'config' => [
                'renderType'   => 'inputLink',
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'blindLinkOptions' => 'file, mail, folder, page, spec',
                            'blindLinkFields'  => 'class, params',
                        ],
                    ],
                ],
            ],
        ];

        return static::addInput(
            $identifier,
            $table,
            array_replace_recursive($inputConfig, $config)
        );
    }

    /**
     * Adds an link field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param array|null $config     Config array
     *
     * @return array
     */
    public static function addFileLink(
        string $identifier,
        string $table,
        ?array $config = []
    ): array {
        $inputConfig = [
            'config' => [
                'renderType'   => 'inputLink',
                'fieldControl' => [
                    'linkPopup' => [
                        'options' => [
                            'blindLinkOptions' => 'mail, folder, url, page, spec, telephone',
                            'blindLinkFields'  => 'class, params',
                        ],
                    ],
                ],
            ],
        ];

        return static::addInput(
            $identifier,
            $table,
            array_replace_recursive($inputConfig, $config)
        );
    }

    /**
     * Adds an integer field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param int        $rangeLower Lower Range
     * @param int        $rangeUpper Upper Range
     * @param array|null $config     Config
     *
     * @return array
     */
    public static function addInteger(
        string $identifier,
        string $table,
        int $rangeLower,
        int $rangeUpper,
        ?array $config = []
    ): array {
        $inputConfig = [
            'config' => [
                'eval'  => 'int',
                'range' => [
                    'lower' => $rangeLower,
                    'upper' => $rangeUpper,
                ],
            ],
        ];

        return static::addInput(
            $identifier,
            $table,
            array_replace_recursive($inputConfig, $config)
        );
    }

    /**
     * Adds an integer field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param float      $rangeLower Lower Range
     * @param float      $rangeUpper Upper Range
     * @param array|null $config     Config
     *
     * @return array
     */
    public static function addFloat(
        string $identifier,
        string $table,
        float $rangeLower,
        float $rangeUpper,
        ?array $config = []
    ): array {
        $inputConfig = [
            'config' => [
                'eval'  => 'double2',
                'range' => [
                    'lower' => $rangeLower,
                    'upper' => $rangeUpper,
                ],
            ],
        ];

        return static::addInput(
            $identifier,
            $table,
            array_replace_recursive($inputConfig, $config)
        );
    }

    /**
     * Adds an image field
     *
     * @param string      $identifier            Identifier
     * @param string      $table                 Table name
     * @param int         $minItems              Min Items
     * @param int         $maxItems              Max Items
     * @param string|null $allowedFileExtensions Allowed File extensions
     * @param array|null  $config                Config array
     *
     * @return array
     */
    public static function addImage(
        string $identifier,
        string $table,
        int $minItems,
        int $maxItems,
        ?string $allowedFileExtensions = 'jpg,jpeg,png,svg,gif',
        ?array $config = []
    ): array {
        if (!$allowedFileExtensions) {
            $allowedFileExtensions = 'jpg,jpeg,png,svg,gif';
        }
        $inputConfig = [
            'exclude'     => 1,
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',
            'config'      => ExtensionManagementUtility::getFileFieldTCAConfig(
                $identifier,
                [
                    'behaviour'        => [
                        'allowLanguageSynchronization' => true,
                    ],
                    'minitems'         => $minItems,
                    'maxitems'         => $maxItems,
                    'appearance'       => [
                        'collapseAll'                     => 1,
                        'expandSingle'                    => 1,
                        'createNewRelationLinkTitle'      => self::$langFileCore . 'images.addFileReference',
                        'fileUploadAllowed'               => true,
                        'showPossibleLocalizationRecords' => true,
                        'showAllLocalizationLink'         => true,
                        'showSynchronizationLink'         => true,
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            '0'                        => [
                                'showitem' => '
                                    --palette--;;imageoverlayPalette,
                                    --palette--;;filePalette',
                            ],
                            File::FILETYPE_TEXT        => [
                                'showitem' => '
                                    --palette--;;imageoverlayPalette,
                                    --palette--;;filePalette',
                            ],
                            File::FILETYPE_IMAGE       => [
                                'showitem' => '
                                    --palette--;;imageoverlayPalette,
                                    --palette--;;filePalette',
                            ],
                            File::FILETYPE_AUDIO       => [
                                'showitem' => '
                                    --palette--;;audioOverlayPalette,
                                    --palette--;;filePalette',
                            ],
                            File::FILETYPE_VIDEO       => [
                                'showitem' => '
                                    --palette--;;videoOverlayPalette,
                                    --palette--;;filePalette',
                            ],
                            File::FILETYPE_APPLICATION => [
                                'showitem' => '
                                    --palette--;;imageoverlayPalette,
                                    --palette--;;filePalette',
                            ],
                        ],
                    ],
                ],
                $allowedFileExtensions
            ),
        ];

        return array_replace_recursive($inputConfig, $config);
    }

    /**
     * Adds an file field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table name
     * @param int        $minItems   Min Items
     * @param int        $maxItems   Max Items
     * @param array|null $config     Config array
     *
     * @return array
     */
    public static function addFile(
        string $identifier,
        string $table,
        int $minItems,
        int $maxItems,
        ?array $config = []
    ): array {
        $inputConfig = [
            'exclude'     => true,
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',
            'config'      => ExtensionManagementUtility::getFileFieldTCAConfig(
                $identifier,
                [
                    'behaviour'     => [
                        'allowLanguageSynchronization' => true,
                    ],
                    'appearance'    => [
                        'createNewRelationLinkTitle'      => self::$langFileCore . 'media.addFileReference',
                        'showPossibleLocalizationRecords' => true,
                        'showRemovedLocalizationRecords'  => true,
                        'showSynchronizationLink'         => true,
                        'showAllLocalizationLink'         => true,
                    ],
                    'foreign_types' => [
                        '0'                        => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                        ],
                        File::FILETYPE_TEXT        => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                        ],
                        File::FILETYPE_IMAGE       => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                        ],
                        File::FILETYPE_AUDIO       => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                        ],
                        File::FILETYPE_VIDEO       => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                        ],
                        File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette',
                        ],
                    ],
                    'minitems'      => $minItems,
                    'maxitems'      => $maxItems,
                ]
            ),
        ];

        return array_replace_recursive($inputConfig, $config);
    }

    /**
     * Adds an video field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table name
     * @param int        $minItems   Min Items
     * @param int        $maxItems   Max Items
     * @param array|null $config     Config array
     *
     * @return array
     */
    public static function addVideo(
        string $identifier,
        string $table,
        int $minItems,
        int $maxItems,
        ?array $config = []
    ): array {
        $inputConfig = ExtensionManagementUtility::getFileFieldTCAConfig(
            $identifier,
            [
                'minitems'   => $minItems,
                'maxitems'   => $maxItems,
                'appearance' => [
                    'collapseAll'                => 1,
                    'expandSingle'               => 1,
                    'createNewRelationLinkTitle' => self::$langFileCore . 'images.addFileReference',
                    'fileUploadAllowed'          => false,
                ],
            ],
            'mp4,webm,m4v,youtube,vimeo' //$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        );

        return [
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',
            'config'      => array_merge($inputConfig, $config),
        ];
    }

    /**
     * Adds a group field
     *
     * @param string     $identifier    Identifier
     * @param string     $table         Table Name
     * @param string     $allowedTables Allowed Tables
     * @param array|null $config        Config
     *
     * @return array
     */
    public static function addGroup(
        string $identifier,
        string $table,
        string $allowedTables,
        ?array $config = []
    ): array {
        $inputConfig = [
            'exclude'     => 1,
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',
            'config'      => [
                'type'          => 'group',
                'internal_type' => 'db',
                'allowed'       => $allowedTables,
                'fieldControl'  => [
                    'editPopup'  => [
                        'disabled' => true,
                    ],
                    'addRecord'  => [
                        'disabled' => true,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
        ];

        return array_replace_recursive($inputConfig, $config);
    }

    /**
     * Adds a group field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param array      $items      Items
     * @param int        $minItems   Min Items
     * @param int        $maxItems   Max Items
     * @param array|null $config     Config
     *
     * @return array
     */
    public static function addSelect(
        string $identifier,
        string $table,
        array $items,
        int $minItems = 1,
        int $maxItems = 1,
        ?array $config = []
    ): array {
        $inputConfig = [
            'exclude'     => 1,
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',
            'config'      => [
                'type'       => 'select',
                'minitems'   => $minItems,
                'maxitems'   => $maxItems,
                'renderType' => 'selectSingle',
                'items'      => $items,
                'behaviour'      => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ];

        return array_replace_recursive($inputConfig, $config);
    }

    /**
     * Adds a slug field
     *
     * @param string     $identifier Identifier
     * @param string     $table      Table Name
     * @param array      $fields
     * @param bool       $prefixParentPageSlug
     * @param string     $prefix
     * @param string     $suffix
     * @param array|null $config     Config
     *
     * @return array
     */
    public static function addSlug(
        string $identifier,
        string $table,
        array $fields,
        bool $prefixParentPageSlug = true,
        string $prefix = '',
        string $suffix = '',
        ?array $config = []
    ): array {
        $inputConfig = [
            'exclude'     => 1,
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',
            'config'      => [
                'type'              => 'slug',
                'generatorOptions'  => [
                    'fields'               => $fields,
                    'fieldSeparator'       => '-',
                    'prefixParentPageSlug' => $prefixParentPageSlug,
                    'replacements'         => [
                        '/' => '',
                    ],
                ],
                'appearance'        => [
                    'prefix' => SlugPrefix::class . '->getPrefix',
                ],
                'fallbackCharacter' => '-',
                'eval'              => 'uniqueInSite',
                'default'           => '',
            ],
        ];

        return array_replace_recursive($inputConfig, $config);
    }

    /**
     * Adds a irre field
     *
     * @param string     $identifier        Identifier
     * @param string     $table             Table Name
     * @param string     $tableForeign      Foreign (child) table name
     * @param string     $tableForeignField Foreign (child) field connected to tt_content
     * @param int        $minItems          Min number of items
     * @param int        $maxItems          Max number of items
     * @param array|null $config            Config
     *
     * @return array
     */
    public static function addIrre(
        string $identifier,
        string $table,
        string $tableForeign,
        string $tableForeignField,
        int $minItems,
        int $maxItems,
        ?array $config = []
    ): array {
        $inputConfig = [
            'exclude'     => 1,
            'label'       => self::$langFile . $table . '.field.' . $identifier,
            'description' => self::$langFile . $table . '.field.' . $identifier . '.description',

            'config' => [
                'type'           => 'inline',
                'foreign_table'  => $tableForeign,
                'foreign_field'  => $tableForeignField,
                'foreign_sortby' => 'sorting',
                'minitems'       => $minItems,
                'maxitems'       => $maxItems,
                'behaviour'      => [
                    'allowLanguageSynchronization' => true,
                ],
                'appearance'     => [
                    'collapseAll'                     => 1,
                    'expandSingle'                    => 1,
                    'levelLinksPosition'              => 'top',
                    'useSortable'                     => true,
                    'showPossibleLocalizationRecords' => false,
                    'showRemovedLocalizationRecords'  => false,
                    'showSynchronizationLink'         => true,
                    'showAllLocalizationLink'         => true,
                    'enabledControls'                 => [
                        'info'     => true,
                        'new'      => true,
                        'dragdrop' => true,
                        'sort'     => true,
                        'hide'     => true,
                        'delete'   => true,
                        'localize' => true,
                    ],
                ],
            ],
        ];

        return array_replace_recursive($inputConfig, $config);
    }

}

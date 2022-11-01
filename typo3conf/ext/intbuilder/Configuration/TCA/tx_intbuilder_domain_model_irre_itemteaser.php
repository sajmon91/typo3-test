<?php

$ceName       = 'Item Teaser';
$table        = str_replace('.php', '', basename(__FILE__));
$resourcePath = 'EXT:intbuilder/Resources/';
$langFile     = 'LLL:' . $resourcePath . 'Private/Language/locallang_content_db.xlf:';

\Int\Intbuilder\Utility\TcaUtility::$langFile = $langFile;

return [
    'ctrl'     => [
        'label'                    => 'header',
        'sortby'                   => 'sorting',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'title'                    => $langFile . $table,
        'delete'                   => 'deleted',
        'origUid'                  => 't3_origuid',
        'hideAtCopy'               => false,
        'versioningWS'             => true,
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'dividers2tabs'            => true,
        'enablecolumns'            => [
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime',
        ],
        'iconfile'                 => $resourcePath . 'Public/Backend/Icons/RecordIcons/' . strtolower(
                str_replace(' ', '-', $ceName) . '.svg'
            ),
    ],
    'types'    => [
        '0' => [
            'showitem' => '
                item_type,
                item_priority,
                header,
                subheader,
                item_date,
                text,
                link,
                --div--;' . $langFile . 'div.images,
                image1,
                image2,
                image3,
                logo,
                --div--;' . $langFile . 'div.settings,
                background_color,
                grey_overlay,
                tags,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                hidden, 
                starttime, 
                endtime
            ',
        ],
    ],
    'palettes' => [
        'visibility' => [
            'showitem' => 'hidden',
        ],
    ],
    'columns'  => [
        'sys_language_uid'  => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config'  => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'special'    => 'languages',
                'items'      => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple',
                    ],
                ],
                'default'    => 0,
            ],
        ],
        'l10n_parent'       => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label'       => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config'      => [
                'type'                => 'select',
                'renderType'          => 'selectSingle',
                'default'             => 0,
                'items'               => [
                    [ '', 0 ],
                ],
                'foreign_table'       => $table,
                'foreign_table_where' => 'AND {#' . $table . '}.{#pid}=###CURRENT_PID### AND {#' . $table . '}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource'   => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label'       => [
            'label'  => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max'  => 255,
            ],
        ],
        'hidden'            => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config'  => [
                'type'       => 'check',
                'renderType' => 'checkboxToggle',
                'items'      => [
                    [
                        0                    => '',
                        1                    => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime'         => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'eval'       => 'datetime,int',
                'default'    => 0,
                'behaviour'  => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'endtime'           => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'eval'       => 'datetime,int',
                'default'    => 0,
                'range'      => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038),
                ],
                'behaviour'  => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'parent_tt_content' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'header'            => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'header',
            $table,
            [
                'eval' => 'trim',
            ],
            100
        ),
        'subheader'         => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'subheader',
            $table,
            [
                'eval' => 'trim',
            ],
            100
        ),
        'image1'            => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'image1',
            $table,
            0,
            1,
            'png,jpg,jpeg'
        ),
        'image2'            => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'image2',
            $table,
            0,
            1,
            'png,jpg,jpeg'
        ),
        'image3'            => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'image3',
            $table,
            0,
            1,
            'png,jpg,jpeg'
        ),
        'logo'              => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'logo',
            $table,
            0,
            1,
            'jpg,svg,png'
        ),
        'text'              => \Int\Intbuilder\Utility\TcaUtility::addRte(
            'text',
            $table,
        ),
        'link'              => \Int\Intbuilder\Utility\TcaUtility::addLink(
            'link',
            $table,
        ),
        'item_type'         => \Int\Intbuilder\Utility\TcaUtility::addSelect(
            'item_type',
            $table,
            [
                [ 'Page', 0 ],
                [ 'Event', 1 ],
                [ 'News', 2 ],
            ]
        ),
        'item_priority'     => \Int\Intbuilder\Utility\TcaUtility::addCheckbox(
            'item_priority',
            $table,
        ),
        'item_date'         => \Int\Intbuilder\Utility\TcaUtility::addDatePicker(
            'item_date',
            $table,
        ),
        'tags'              => [
            'exclude' => true,
            'label'   => $langFile . 'tx_intbuilder_domain_model_irre_itemteaser.field.tags',
            'config'  => [
                'type'                => 'select',
                'renderType'          => 'selectMultipleSideBySide',
                'foreign_table'       => 'tx_intbuilder_domain_model_category',
                'foreign_table_where' => ' AND tx_intbuilder_domain_model_category.sys_language_uid IN (-1,0) AND tx_intbuilder_domain_model_category.type IN (' . \Int\Inthelper\Domain\Model\Enum\CategoryType::NEWS_CATEGORY . ', ' . \Int\Inthelper\Domain\Model\Enum\CategoryType::EVENT_CATEGORY . ', ' . \Int\Inthelper\Domain\Model\Enum\CategoryType::LOCATION_CATEGORY . ', ' . \Int\Inthelper\Domain\Model\Enum\CategoryType::REFERENCE_CATEGORY . ')',
                'MM'                  => 'tx_intbuilder_itemteaser_category_mm',
                'size'                => 10,
                'autoSizeMax'         => 30,
                'maxitems'            => 9999,
                'multiple'            => 0,
                'fieldControl'        => [
                    'editPopup'  => [
                        'disabled' => false,
                    ],
                    'addRecord'  => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
        ],
        'background_color'  => \Int\Intbuilder\Utility\TcaUtility::addSelect(
            'background_color',
            $table,
            [
                [ '', '' ],
//                [ 'Background 1', '1' ],
//                [ 'Background 2', '2' ],
//                [ 'Background 3', '3' ],
                [ 'Background 1 dark', '10' ],
                [ 'Background 2 dark', '11' ],
                [ 'Background 3 dark', '12' ],
            ]
        ),
        'grey_overlay' => \Int\Intbuilder\Utility\TcaUtility::addCheckbox(
            'grey_overlay',
            $table
        )
    ],
];
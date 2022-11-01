<?php

$extensionname = 'intbuilder';
$table         = str_replace('.php', '', basename(__FILE__));
$resourcePath  = 'EXT:intbuilder/Resources/';
$langFile      = 'LLL:' . $resourcePath . 'Private/Language/locallang_content_db.xlf:';

\Int\Intbuilder\Utility\TcaUtility::$langFile = $langFile;


return [
    'ctrl'      => [
        'title'                    => $langFile . $table,
        'label'                    => 'oid',
        'label_alt_force'          => true,
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'sortby'                   => 'sorting',
        'versioningWS'             => true,
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete'                   => 'deleted',
        'enablecolumns'            => [
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime',
        ],
        'searchFields'             => 'oid,name',
        'iconfile'                 => $resourcePath . 'Public/Backend/Icons/RecordIcons/' . strtolower(
                str_replace(' ', '-', 'category')
            ) . '.svg',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, oid, name, show_in_list, show_in_filter, image1, image2, icon1, icon2, type, child_categories',
    ],
    'types'     => [
        '1' => [ 'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, oid, name, show_in_list, show_in_filter, image1, image2, icon1, icon2, type, child_categories, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime' ],
    ],
    'columns'   => [
        'hidden'           => [
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
        'oid'              => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'oid',
            $table,
            [
                'eval' => 'trim,required',
            ],
            50
        ),
        'name'             => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'name',
            $table,
            [
                'eval' => 'trim,required',
            ]
        ),
        'show_in_filter' => \Int\Intbuilder\Utility\TcaUtility::addCheckbox(
            'show_in_filter',
            $table
        ),
        'show_in_list' => \Int\Intbuilder\Utility\TcaUtility::addCheckbox(
            'show_in_list',
            $table
        ),
        'type'             => \Int\Intbuilder\Utility\TcaUtility::addSelect(
            'type',
            $table,
            \Int\Inthelper\Domain\Model\Enum\CategoryType::toConfigArray(),
            1,
            1,
            [
                'onChange' => 'reload',
            ]
        ),
        'image1'           => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'image1',
            $table,
            0,
            1
        ),
        'image2'           => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'image2',
            $table,
            0,
            1
        ),
        'icon1'            => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'icon1',
            $table,
            0,
            1
        ),
        'icon2'            => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'icon2',
            $table,
            0,
            1
        ),
        'child_categories' => [
            'exclude' => true,
            'label'   => $langFile . 'tx_intbuilder_domain_model_category.field.child_categories',
            'config'  => [
                'type'          => 'select',
                'renderType'    => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_intbuilder_domain_model_category',
                'MM'            => 'tx_intbuilder_category_childcategories_mm',
                'size'          => 10,
                'autoSizeMax'   => 30,
                'maxitems'      => 100,
                'multiple'      => 0,
                'fieldControl'  => [
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
        'parent_category'  => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
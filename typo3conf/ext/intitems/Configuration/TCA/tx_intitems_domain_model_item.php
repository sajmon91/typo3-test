<?php

$extensionname = 'intitems';
$table         = str_replace('.php', '', basename(__FILE__));
$langFile      = 'LLL:EXT:' . $extensionname . '/Resources/Private/Language/locallang_db.xlf:';

\Int\Intbuilder\Utility\TcaUtility::$langFile = $langFile;


return [
    'ctrl'    => [
        'title'                    => $langFile . $table,
        'label'                    => 'oid',
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
        'searchFields'             => 'oid,name,description_short,description',
        'iconfile'                 => 'EXT:intitems/Resources/Public/Icons/item.svg',
    ],
    'types'   => [
        '1' => [
            'showitem' => 'sys_language_uid, 
        l10n_parent, 
        l10n_diffsource, 
        hidden, 
        oid, 
        name, 
        slug,
        description_short, 
        description, 
        --div--;LLL:EXT:intitems/Resources/Private/Language/locallang_db.xlf:tabs.images,
        list_image, 
        header_image, 
        images, 
        --div--;LLL:EXT:intitems/Resources/Private/Language/locallang_db.xlf:tabs.documents,
        files1, 
        files2, 
        files3, 
        --div--;LLL:EXT:intitems/Resources/Private/Language/locallang_db.xlf:tabs.properties, 
        properties, 
        --div--;LLL:EXT:intitems/Resources/Private/Language/locallang_db.xlf:tabs.categories, 
        categories, 
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
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
        'l10n_parent'      => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label'       => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config'      => [
                'type'                => 'select',
                'renderType'          => 'selectSingle',
                'default'             => 0,
                'items'               => [
                    [ '', 0 ],
                ],
                'foreign_table'       => 'tx_intitems_domain_model_item',
                'foreign_table_where' => 'AND {#tx_intitems_domain_model_item}.{#pid}=###CURRENT_PID### AND {#tx_intitems_domain_model_item}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource'  => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
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
        'starttime'        => [
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
        'endtime'          => [
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

        'oid'               => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'oid',
            $table,
            [
                'eval' => 'trim,required',
            ]
        ),
        'name'              => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'name',
            $table,
            [
                'eval' => 'trim,required',
            ]
        ),
        'description_short' => \Int\Intbuilder\Utility\TcaUtility::addText(
            'description_short',
            $table
        ),
        'description'       => \Int\Intbuilder\Utility\TcaUtility::addRte(
            'description',
            $table
        ),
        'list_image'        => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'list_image',
            $table,
            0,
            1
        ),
        'header_image'      => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'header_image',
            $table,
            0,
            1
        ),
        'images'            => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'images',
            $table,
            0,
            100
        ),
        'files1'            => \Int\Intbuilder\Utility\TcaUtility::addFile(
            'files1',
            $table,
            0,
            100
        ),
        'files2'            => \Int\Intbuilder\Utility\TcaUtility::addFile(
            'files2',
            $table,
            0,
            100
        ),
        'files3'            => \Int\Intbuilder\Utility\TcaUtility::addFile(
            'files3',
            $table,
            0,
            100
        ),
        'properties'        => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'properties',
            $table,
            'tx_intitems_domain_model_itemproperty',
            'item',
            0,
            100
        ),
        'categories'        => [
            'exclude' => true,
            'label'   => 'LLL:EXT:intitems/Resources/Private/Language/locallang_db.xlf:tx_intitems_domain_model_item.field.categories',
            'config'  => [
                'type'          => 'select',
                'renderType'    => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_intbuilder_domain_model_category',
                'MM'            => 'tx_intitems_item_category_mm',
                'size'          => 10,
                'autoSizeMax'   => 30,
                'maxitems'      => 9999,
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
        'slug'              => \Int\Intbuilder\Utility\TcaUtility::addSlug(
            'slug',
            $table,
            [ 'name' ]
        ),
    ],
];

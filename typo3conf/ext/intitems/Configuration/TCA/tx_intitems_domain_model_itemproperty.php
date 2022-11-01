<?php

$extensionname = 'intitems';
$table         = str_replace('.php', '', basename(__FILE__));
$langFile      = 'LLL:EXT:' . $extensionname . '/Resources/Private/Language/locallang_db.xlf:';

\Int\Intbuilder\Utility\TcaUtility::$langFile = $langFile;


return [
    'ctrl'    => [
        'title'                    => 'LLL:EXT:intitems/Resources/Private/Language/locallang_db.xlf:tx_intitems_domain_model_itemproperty',
        'label'                    => 'value_label',
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
        'searchFields'             => 'value_label,value_input,value_text,value_int,value_bool,',
        'iconfile'                 => 'EXT:intitems/Resources/Public/Icons/itemproperty.svg',
    ],
    'types'   => [
        '1' => [ 'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, value_label, value_type, value_input, value_text, value_int, value_bool, toggle_item, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime' ],
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
                'foreign_table'       => 'tx_intitems_domain_model_itemproperty',
                'foreign_table_where' => 'AND {#tx_intitems_domain_model_itemproperty}.{#pid}=###CURRENT_PID### AND {#tx_intitems_domain_model_itemproperty}.{#sys_language_uid} IN (-1,0)',
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

        'value_label' => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'value_label',
            $table,
            [
                'eval' => 'trim,required',
            ]
        ),
        'value_type'  => [
            'exclude'   => true,
            'l10n_mode' => 'exclude',
            'onChange'  => 'reload',
            'label'     => 'LLL:EXT:intitems/Resources/Private/Language/locallang_db.xlf:tx_intitems_domain_model_itemproperty.field.value_type',
            'config'    => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'items'      => \Int\Inthelper\Domain\Model\Enum\PropertyType::toConfigArray(),
                'size'       => 1,
                'maxitems'   => 1,
                'eval'       => '',
            ],
        ],
        'toggle_item' => \Int\Intbuilder\Utility\TcaUtility::addCheckbox(
            'toggle_item',
            $table
        ),

        'value_int'   => \Int\Intbuilder\Utility\TcaUtility::addInteger(
            'value_int',
            $table,
            0,
            9999999,
            [
                'displayCond' => 'FIELD:value_type:=:' . \Int\Inthelper\Domain\Model\Enum\PropertyType::NUMBER,
            ]

        ),
        'value_input' => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'value_input',
            $table,
            [
                'displayCond' => 'FIELD:value_type:=:' . \Int\Inthelper\Domain\Model\Enum\PropertyType::STRING,
            ]

        ),
        'value_bool'  => \Int\Intbuilder\Utility\TcaUtility::addCheckbox(
            'value_bool',
            $table,
            [
                'displayCond' => 'FIELD:value_type:=:' . \Int\Inthelper\Domain\Model\Enum\PropertyType::BOOL,
            ]

        ),
        'value_text'  => \Int\Intbuilder\Utility\TcaUtility::addRte(
            'value_text',
            $table,
            [
                'displayCond' => 'FIELD:value_type:=:' . \Int\Inthelper\Domain\Model\Enum\PropertyType::TEXT,
            ]

        ),

        'item' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];

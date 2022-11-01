<?php

$ceName       = 'Teaser Slider Image';
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
                header,
                text,
                link,
                images,
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
            'tt_content',
            [
                'eval' => 'trim',
            ],
            100
        ),
        'images'            => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'images',
            'tt_content',
            0,
            1,
            'png,jpg,jpeg'
        ),
        'text'              => \Int\Intbuilder\Utility\TcaUtility::addRte(
            'text',
            'tt_content'
        ),
        'link'              => \Int\Intbuilder\Utility\TcaUtility::addLink(
            'link',
            'tt_content'
        ),
    ],
];
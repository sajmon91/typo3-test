<?php

$extensionname = 'intnews';
$table         = str_replace('.php', '', basename(__FILE__));
$langFile      = 'LLL:EXT:' . $extensionname . '/Resources/Private/Language/locallang_db.xlf:';

\Int\Intbuilder\Utility\TcaUtility::$langFile = $langFile;


return [
    'ctrl'    => [
        'title'                    => $langFile . $table,
        'label'                    => 'name',
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
        'searchFields'             => 'oid,name,subheader,description_short,description',
        'iconfile'                 => 'EXT:intnews/Resources/Public/Icons/news.svg',
    ],
    'types'   => [
        '1' => [
            'showitem' => 'sys_language_uid, 
        l10n_parent, 
        l10n_diffsource, 
        hidden, 
        oid, 
        news_type,
        name, 
        subheader, 
        hide_original_language,
        news_date,
        event_location,
        event_address,
        event_hall,
        event_booth,
        event_duration,
        event_link,
        slug,
        description_short, 
        description, 
        --div--;LLL:EXT:intnews/Resources/Private/Language/locallang_db.xlf:tabs.images,
        list_image, 
        header_image, 
        --div--;LLL:EXT:intnews/Resources/Private/Language/locallang_db.xlf:tabs.documents,
        files, 
        --div--;LLL:EXT:intnews/Resources/Private/Language/locallang_db.xlf:tabs.categories,
        authors, 
        categories, 
        --div--;LLL:EXT:intnews/Resources/Private/Language/locallang_db.xlf:tabs.contents, 
        contents, 
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
                'foreign_table'       => 'tx_intnews_domain_model_news',
                'foreign_table_where' => 'AND {#tx_intnews_domain_model_news}.{#pid}=###CURRENT_PID### AND {#tx_intnews_domain_model_news}.{#sys_language_uid} IN (-1,0)',
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
        'subheader'         => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'subheader',
            $table,
            [
                'eval' => 'trim',
            ]
        ),
        'event_location'    => \Int\Intbuilder\Utility\TcaUtility::addText(
            'event_location',
            $table,
            [
                'displayCond' => 'FIELD:news_type:=:' . \Int\Inthelper\Domain\Model\Enum\NewsType::EVENT,
                'eval'        => 'trim',
            ],
        ),
        'event_address'    => \Int\Intbuilder\Utility\TcaUtility::addText(
            'event_address',
            $table,
            [
                'displayCond' => 'FIELD:news_type:=:' . \Int\Inthelper\Domain\Model\Enum\NewsType::EVENT,
                'eval'        => 'trim',
            ],
        ),
        'event_hall'    => \Int\Intbuilder\Utility\TcaUtility::addText(
            'event_hall',
            $table,
            [
                'displayCond' => 'FIELD:news_type:=:' . \Int\Inthelper\Domain\Model\Enum\NewsType::EVENT,
                'eval'        => 'trim',
            ],
        ),
        'event_booth'    => \Int\Intbuilder\Utility\TcaUtility::addText(
            'event_booth',
            $table,
            [
                'displayCond' => 'FIELD:news_type:=:' . \Int\Inthelper\Domain\Model\Enum\NewsType::EVENT,
                'eval'        => 'trim',
            ],
        ),
        'event_duration'    => \Int\Intbuilder\Utility\TcaUtility::addText(
            'event_duration',
            $table,
            [
                'displayCond' => 'FIELD:news_type:=:' . \Int\Inthelper\Domain\Model\Enum\NewsType::EVENT,
                'eval'        => 'trim',
            ]
        ),
        'event_link'        => \Int\Intbuilder\Utility\TcaUtility::addLink(
            'event_link',
            $table,
            [
                'displayCond' => 'FIELD:news_type:=:' . \Int\Inthelper\Domain\Model\Enum\NewsType::EVENT,
            ]
        ),
        'news_date'         => \Int\Intbuilder\Utility\TcaUtility::addDatePicker(
            'news_date',
            $table
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
        'files'             => \Int\Intbuilder\Utility\TcaUtility::addFile(
            'files',
            $table,
            0,
            100
        ),
        'categories'        => [
            'exclude' => true,
            'label'   => 'LLL:EXT:intnews/Resources/Private/Language/locallang_db.xlf:tx_intnews_domain_model_news.field.categories',
            'config'  => [
                'type'                => 'select',
                'renderType'          => 'selectMultipleSideBySide',
                'foreign_table'       => 'tx_intbuilder_domain_model_category',
                'foreign_table_where' => 'tx_intbuilder_domain_model_category.type IN (' . \Int\Inthelper\Domain\Model\Enum\CategoryType::NEWS_CATEGORY . ', ' . \Int\Inthelper\Domain\Model\Enum\CategoryType::EVENT_CATEGORY . ', ' . \Int\Inthelper\Domain\Model\Enum\CategoryType::LOCATION_CATEGORY . ')  AND tx_intbuilder_domain_model_category.sys_language_uid IN (-1,0)',
                'MM'                  => 'tx_intnews_news_category_mm',
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
                'behaviour'  => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'authors'           => [
            'exclude' => true,
            'label'   => 'LLL:EXT:intnews/Resources/Private/Language/locallang_db.xlf:tx_intnews_domain_model_news.field.authors',
            'config'  => [
                'type'          => 'select',
                'renderType'    => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_intbuilder_domain_model_author',
                'MM'            => 'tx_intnews_news_author_mm',
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
            'behaviour'  => [
                'allowLanguageSynchronization' => true,
            ],
        ],
        'contents'          => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'contents',
            $table,
            'tt_content',
            'int_parent_news',
            0,
            50,
            [
                'config' => [
                    'overrideChildTca' => [
                        'columns' => [
                            'colPos' => [
                                'config' => [
                                    'default' => 98,
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ),
        'slug'              => \Int\Intbuilder\Utility\TcaUtility::addSlug(
            'slug',
            $table,
            [ 'name' ]
        ),
        'news_type'         => [
            'exclude'   => true,
            'l10n_mode' => 'exclude',
            'onChange'  => 'reload',
            'label'     => 'LLL:EXT:intnews/Resources/Private/Language/locallang_db.xlf:tx_intnews_domain_model_news.field.news_type',
            'config'    => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'items'      => \Int\Inthelper\Domain\Model\Enum\NewsType::toConfigArray(),
                'size'       => 1,
                'maxitems'   => 1,
                'eval'       => '',
            ],
        ],
        'hide_original_language' => \Int\Intbuilder\Utility\TcaUtility::addCheckbox(
            'hide_original_language',
            $table,
            [
                'displayCond' => 'FIELD:sys_language_uid:=:0',
            ]
        )
    ],
];

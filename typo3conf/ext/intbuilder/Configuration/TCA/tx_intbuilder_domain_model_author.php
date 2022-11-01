<?php

$extensionname = 'intbuilder';
$table         = str_replace('.php', '', basename(__FILE__));
$resourcePath  = 'EXT:intbuilder/Resources/';
$langFile      = 'LLL:' . $resourcePath . 'Private/Language/locallang_content_db.xlf:';

\Int\Intbuilder\Utility\TcaUtility::$langFile = $langFile;


return [
    'ctrl'      => [
        'title'                    => $langFile . $table,
        'label'                    => 'name_prefix',
        'label_alt'                => 'first_name, last_name',
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
        'searchFields'             => 'name_prefix, first_name, last_name, author_position, author_company, email, phone, website, linkedin, xing',
        'iconfile'                 => $resourcePath . 'Public/Backend/Icons/RecordIcons/' . strtolower(
                str_replace(' ', '-', 'author')
            ) . '.svg',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, author_type, name_prefix, first_name, last_name, author_position, author_company, email, phone, website, linkedin, xing, image',
    ],
    'types'     => [
        '1' => [ 'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, author_type, name_prefix, first_name, last_name, author_position, author_company, email, phone, website, linkedin, xing, image, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime' ],
    ],
    'columns'   => [
        'hidden'          => [
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
        'name_prefix'     => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'name_prefix',
            $table
        ),
        'first_name'      => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'first_name',
            $table
        ),
        'last_name'       => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'last_name',
            $table
        ),
        'author_position' => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'author_position',
            $table
        ),
        'author_company'  => \Int\Intbuilder\Utility\TcaUtility::addInput(
            'author_company',
            $table
        ),
        'email'           => \Int\Intbuilder\Utility\TcaUtility::addMailLink(
            'email',
            $table
        ),
        'phone'           => \Int\Intbuilder\Utility\TcaUtility::addPhoneLink(
            'phone',
            $table
        ),
        'website'         => \Int\Intbuilder\Utility\TcaUtility::addExternalLink(
            'website',
            $table
        ),
        'linkedin'        => \Int\Intbuilder\Utility\TcaUtility::addExternalLink(
            'linkedin',
            $table
        ),
        'xing'            => \Int\Intbuilder\Utility\TcaUtility::addExternalLink(
            'xing',
            $table
        ),
        'image'           => \Int\Intbuilder\Utility\TcaUtility::addImage(
            'image',
            $table,
            0,
            10
        ),
        'author_type'     => \Int\Intbuilder\Utility\TcaUtility::addSelect(
            'author_type',
            $table,
            \Int\Inthelper\Domain\Model\Enum\AuthorType::toConfigArray(),
            1,
            1,
            [
                'onChange' => 'reload',
            ]
        ),
    ],
];
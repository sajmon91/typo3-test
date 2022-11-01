<?php

$extensionName = 'intbuilder';
$table         = str_replace('.php', '', basename(__FILE__));
$langFile      = 'LLL:EXT:' . $extensionName . '/Resources/Private/Language/locallang_pages_db.xlf:';

\Int\Intbuilder\Utility\TcaUtility::$langFile = $langFile;


# ----------------------------------------------------------------------------------------------------------------------
# Additional fields
# Will appear when added to palette later
# ----------------------------------------------------------------------------------------------------------------------

// addWhere Setting for header and footer pages
$pagesCondition = ' AND pages.sys_language_uid IN (-1,0) AND pages.nav_hide=0 AND pages.hidden=0 AND pages.deleted=0 AND pages.doktype IN (1, 3, 4) ORDER BY pages.title ';

$newFields = [
    'int_top_pages'           => \Int\Intbuilder\Utility\TcaUtility::addSelect(
        'int_top_pages',
        $table,
        [],
        0,
        9999,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
            'config'      => [
                'renderType'          => 'selectMultipleSideBySide',
                'foreign_table'       => 'pages',
                'foreign_table_where' => $pagesCondition,
                'MM'                  => 'tx_intbuilder_pages_toppages_mm',
                'suggestOptions'      => [
                    'default' => [
                        'addWhere' => $pagesCondition,
                    ],
                ],
            ],
        ]
    ),
    'int_bottom_pages1'       => \Int\Intbuilder\Utility\TcaUtility::addSelect(
        'int_bottom_pages1',
        $table,
        [],
        0,
        9999,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
            'config'      => [
                'renderType'          => 'selectMultipleSideBySide',
                'foreign_table'       => 'pages',
                'foreign_table_where' => $pagesCondition,
                'MM'                  => 'tx_intbuilder_pages_bottompages1_mm',
                'suggestOptions'      => [
                    'default' => [
                        'addWhere' => $pagesCondition,
                    ],
                ],
            ],
        ]
    ),
    'int_bottom_pages2'       => \Int\Intbuilder\Utility\TcaUtility::addSelect(
        'int_bottom_pages2',
        $table,
        [],
        0,
        9999,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
            'config'      => [
                'renderType'          => 'selectMultipleSideBySide',
                'foreign_table'       => 'pages',
                'foreign_table_where' => $pagesCondition,
                'MM'                  => 'tx_intbuilder_pages_bottompages2_mm',
                'suggestOptions'      => [
                    'default' => [
                        'addWhere' => $pagesCondition,
                    ],
                ],
            ],
        ]
    ),
    'int_bottom_pages3'       => \Int\Intbuilder\Utility\TcaUtility::addSelect(
        'int_bottom_pages3',
        $table,
        [],
        0,
        9999,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
            'config'      => [
                'renderType'          => 'selectMultipleSideBySide',
                'foreign_table'       => 'pages',
                'foreign_table_where' => $pagesCondition,
                'MM'                  => 'tx_intbuilder_pages_bottompages3_mm',
                'suggestOptions'      => [
                    'default' => [
                        'addWhere' => $pagesCondition,
                    ],
                ],
            ],
        ]
    ),
    'int_bottom_pages4'       => \Int\Intbuilder\Utility\TcaUtility::addSelect(
        'int_bottom_pages4',
        $table,
        [],
        0,
        9999,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
            'config'      => [
                'renderType'          => 'selectMultipleSideBySide',
                'foreign_table'       => 'pages',
                'foreign_table_where' => $pagesCondition,
                'MM'                  => 'tx_intbuilder_pages_bottompages4_mm',
                'suggestOptions'      => [
                    'default' => [
                        'addWhere' => $pagesCondition,
                    ],
                ],
            ],
        ]
    ),
    'int_icons1'              => \Int\Intbuilder\Utility\TcaUtility::addImage(
        'int_icons1',
        $table,
        0,
        20,
        'svg,png,gif,jpg,jpeg',
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
    'int_icons2'              => \Int\Intbuilder\Utility\TcaUtility::addImage(
        'int_icons2',
        $table,
        0,
        20,
        'svg,png,gif,jpg,jpeg',
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
    'int_icons3'              => \Int\Intbuilder\Utility\TcaUtility::addImage(
        'int_icons3',
        $table,
        0,
        20,
        'svg,png,gif,jpg,jpeg',
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
    'int_icons4'              => \Int\Intbuilder\Utility\TcaUtility::addImage(
        'int_icons4',
        $table,
        0,
        20,
        'svg,png,gif,jpg,jpeg',
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
    'int_header1'             => \Int\Intbuilder\Utility\TcaUtility::addInput(
        'int_header1',
        $table,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
    'int_header2'             => \Int\Intbuilder\Utility\TcaUtility::addInput(
        'int_header2',
        $table,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
    'int_header3'             => \Int\Intbuilder\Utility\TcaUtility::addInput(
        'int_header3',
        $table,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
    'int_header4'             => \Int\Intbuilder\Utility\TcaUtility::addInput(
        'int_header4',
        $table,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
    'int_new'                 => \Int\Intbuilder\Utility\TcaUtility::addCheckbox(
        'int_new',
        $table,
        [
            'displayCond' => 'FIELD:pid:!=:1',
        ]
    ),
    'int_image1'              => \Int\Intbuilder\Utility\TcaUtility::addImage(
        'int_image1',
        $table,
        0,
        5,
        'svg',
        [
            'displayCond' => 'FIELD:pid:=:1',
        ]
    ),
    'int_footer_teaser'       => \Int\Intbuilder\Utility\TcaUtility::addImage(
        'int_footer_teaser',
        $table,
        0,
        3
    ),
    'int_footer_teaser_title' => \Int\Intbuilder\Utility\TcaUtility::addInput(
        'int_footer_teaser_title',
        $table
    ),
    'int_header_desktop'      => \Int\Intbuilder\Utility\TcaUtility::addSelect(
        'int_header_desktop',
        $table,
        [],
        0,
        1,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
    'int_header_mobile'       => \Int\Intbuilder\Utility\TcaUtility::addSelect(
        'int_header_mobile',
        $table,
        [],
        0,
        1,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
    'int_footer_desktop'      => \Int\Intbuilder\Utility\TcaUtility::addSelect(
        'int_footer_desktop',
        $table,
        [],
        0,
        1,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
    'int_footer_mobile'       => \Int\Intbuilder\Utility\TcaUtility::addSelect(
        'int_footer_mobile',
        $table,
        [],
        0,
        1,
        [
            'displayCond' => 'FIELD:is_siteroot:=:1',
        ]
    ),
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    $table,
    $newFields
);


# ----------------------------------------------------------------------------------------------------------------------
# Add new palette
# Fields will be visible only if added here
# ----------------------------------------------------------------------------------------------------------------------

$GLOBALS['TCA']['pages']['palettes']['int_partials'] = [
    'showitem' => '
    int_header_desktop,
    int_header_mobile,
    --linebreak--, 
    int_footer_desktop,
    int_footer_mobile,
    ',
];

$GLOBALS['TCA']['pages']['palettes']['int_header'] = [
    'showitem' => '
    int_top_pages,
    --linebreak--, 
    int_new,
    --linebreak--,
    int_image1,
    ',
];

$GLOBALS['TCA']['pages']['palettes']['int_footer'] = [
    'showitem' => '
    int_bottom_pages1, 
    --linebreak--, 
    int_bottom_pages2, 
    --linebreak--, 
    int_bottom_pages3, 
    --linebreak--, 
    int_bottom_pages4,
    ',
];

$GLOBALS['TCA']['pages']['palettes']['int_footer_teaser'] = [
    'showitem' => '
    int_footer_teaser_title,
    --linebreak--,
    int_footer_teaser,
    ',
];

$GLOBALS['TCA']['pages']['palettes']['int_icons'] = [
    'showitem' => '
    int_icons1, 
    --linebreak--, 
    int_icons2, 
    --linebreak--, 
    int_icons3, 
    --linebreak--, 
    int_icons4
    ',
];

$GLOBALS['TCA']['pages']['palettes']['int_headers'] = [
    'showitem' => '
    int_header1, 
    --linebreak--, 
    int_header2, 
    --linebreak--, 
    int_header3, 
    --linebreak--, 
    int_header4
    ',
];


# ----------------------------------------------------------------------------------------------------------------------
# Make fields visible in TCEforms
# --palette--;HEADLINE;palette_name
# ----------------------------------------------------------------------------------------------------------------------

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;' . $langFile . 'div.pages_navigation,
    --palette--;' . $langFile . 'palette.int_partials;int_partials,
    --palette--;' . $langFile . 'palette.top_pages;int_header,
    --palette--;' . $langFile . 'palette.bottom_pages;int_footer,
    --palette--;' . $langFile . 'palette.footer_teaser;int_footer_teaser,
    --palette--;' . $langFile . 'palette.icons;int_icons,
    --palette--;' . $langFile . 'palette.headers;int_headers',
    '1',
    'after:subtitle'
);

// Override / with -
// See https://forge.typo3.org/issues/86596
$GLOBALS['TCA']['pages']['columns']['slug']['config']['generatorOptions']['replacements'] = [ '/' => '-' ];
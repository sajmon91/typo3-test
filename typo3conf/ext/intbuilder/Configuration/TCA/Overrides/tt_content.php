<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$extensionName = 'intbuilder';
$table         = str_replace('.php', '', basename(__FILE__));
$langFile      = 'LLL:EXT:' . $extensionName . '/Resources/Private/Language/locallang_content_db.xlf:';

\Int\Intbuilder\Utility\TcaUtility::$langFile = $langFile;


# ----------------------------------------------------------------------------------------------------------------------
# Add new Content Elements here
# Add fields as configuration
# e.g. 'int-default' => 'header',
# ----------------------------------------------------------------------------------------------------------------------

$contentElements = [
    'text'                     => 'int_identifier, header, int_text1, int_background_color',
    'image'                    => 'int_identifier, header, int_text1, int_text2, int_image1, int_background_color',
    'accordion-irre'           => 'int_identifier, header, int_text1, int_irre_accordion, int_background_color',
    'hero-slider-irre'         => 'int_identifier, header, int_text1, int_link1, int_irre_heroslider',
    'quote'                    => 'int_identifier, int_text1, int_image1, int_image2, int_checkbox1, int_background_color',
    'tabs-irre'                => 'int_identifier, header, int_text1, int_irre_tabs, int_background_color',
    'teaser-box-irre'          => 'int_identifier, header, int_text1, int_irre_teaserbox, int_link1, int_link2, int_column_count, int_background_color',
    'teaser-box-icon-irre'     => 'int_identifier, header, int_text1, int_irre_teaserboxicon, int_column_count, int_background_color',
    'teaser-box-image-irre'    => 'int_identifier, header, int_text1, int_irre_teaserboximage, int_column_count, int_background_color',
    'text-with-image'          => 'int_identifier, header, int_text1, int_image1, int_image_position, int_background_color',
    'video'                    => 'int_identifier, header, int_text1, int_video1, int_background_color',
    'gallery'                  => 'int_identifier, header, int_text1, int_image1, int_column_count, int_background_color',
    'admin-images-detail'      => 'int_identifier, header, int_text1, int_image1',
    'summary1'                 => 'int_identifier, int_header1, int_text1, int_subheader1, int_text3, int_link_phone1, int_link_mail1, int_header2, int_text2, int_header3, int_image1',
    'summary2'                 => 'int_identifier, header, int_text1, int_text2, int_link1, int_background_color',
    'download-irre'            => 'int_identifier, header, int_irre_download',
    'usp-irre'                 => 'int_identifier, header, int_text1, int_image1, int_irre_usp, int_link1, int_background_color',
    'box-teaser-irre'          => 'int_identifier, header, int_text1, int_irre_boxteaser, int_link1',
    'teaser-slider-box-irre'   => 'int_identifier, header, int_text1, int_irre_teasersliderbox, int_link1, int_background_color',
    'teaser-slider-image-irre' => 'int_identifier, header, int_text1, int_irre_teasersliderimage, int_background_color',
    'page-header'              => 'int_identifier, int_text1, int_image1, int_image2, int_background_color',
    'page-hero'                => 'int_identifier, int_text1, int_link1, int_image1',
    'divider'                  => 'int_identifier, int_checkbox1',
    'sticky-box'               => 'int_identifier, int_image1',
    'item-teaser'              => 'int_identifier, header, int_text1, int_irre_itemteaser',
    'references'               => 'int_identifier, header, int_text1, int_irre_references, int_background_color',
];

$newFields = array_merge(
    \Int\Intbuilder\Utility\TcaUtility::addDefaultCeFields(),
    [
        // Colors >= 10 will be handled as dark colors and invert the text color
        'int_background_color'       => \Int\Intbuilder\Utility\TcaUtility::addSelect(
            'int_background_color',
            $table,
            [
                [ '', '' ],
                [ 'Background 1', '1' ],
                [ 'Background 2', '2' ],
                [ 'Background 3', '3' ],
                [ 'Background 1 dark', '10' ],
                [ 'Background 2 dark', '11' ],
                [ 'Background 3 dark', '12' ],
            ]
        ),
        'int_width_container'        => \Int\Intbuilder\Utility\TcaUtility::addSelect(
            'int_width_container',
            $table,
            [
                [ '', '' ],
                [ 'mobile-s', 'mobile-s' ],
                [ 'mobile-m', 'mobile-m' ],
                [ 'mobile-l', 'mobile-l' ],
                [ 'tablet', 'tablet' ],
                [ 'desktop-s', 'desktop-s' ],
                [ 'desktop-m', 'desktop-m' ],
                [ 'desktop-l', 'desktop-l' ],
                [ 'desktop-xl', 'desktop-xl' ],
            ]
        ),
        'int_image_position'         => \Int\Intbuilder\Utility\TcaUtility::addSelect(
            'int_image_position',
            $table,
            [
                [ 'Left', 'left' ],
                [ 'Right', 'right' ],
            ]
        ),
        'int_column_count'           => \Int\Intbuilder\Utility\TcaUtility::addSelect(
            'int_column_count',
            $table,
            [
                [ '1', '1' ],
                [ '2', '2' ],
                [ '3', '3' ],
                [ '4', '4' ],
            ]
        ),
        'int_irre_heroslider'        => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_heroslider',
            $table,
            'tx_intbuilder_domain_model_irre_heroslider',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_accordion'         => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_accordion',
            $table,
            'tx_intbuilder_domain_model_irre_accordion',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_tabs'              => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_tabs',
            $table,
            'tx_intbuilder_domain_model_irre_tabs',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_teaserbox'         => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_teaserbox',
            $table,
            'tx_intbuilder_domain_model_irre_teaserbox',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_teaserboxicon'     => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_teaserboxicon',
            $table,
            'tx_intbuilder_domain_model_irre_teaserboxicon',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_teaserboximage'    => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_teaserboximage',
            $table,
            'tx_intbuilder_domain_model_irre_teaserboximage',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_download'          => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_download',
            $table,
            'tx_intbuilder_domain_model_irre_download',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_usp'               => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_usp',
            $table,
            'tx_intbuilder_domain_model_irre_usp',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_boxteaser'         => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_boxteaser',
            $table,
            'tx_intbuilder_domain_model_irre_boxteaser',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_teasersliderbox'   => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_teasersliderbox',
            $table,
            'tx_intbuilder_domain_model_irre_teasersliderbox',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_teasersliderimage' => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_teasersliderimage',
            $table,
            'tx_intbuilder_domain_model_irre_teasersliderimage',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_itemteaser'        => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_itemteaser',
            $table,
            'tx_intbuilder_domain_model_irre_itemteaser',
            'parent_tt_content',
            0,
            50
        ),
        'int_irre_references'        => \Int\Intbuilder\Utility\TcaUtility::addIrre(
            'int_irre_references',
            $table,
            'tx_intbuilder_domain_model_irre_references',
            'parent_tt_content',
            0,
            200
        ),
        'int_parent_news'            => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ]
);

# ----------------------------------------------------------------------------------------------------------------------
# First Tab title
# ----------------------------------------------------------------------------------------------------------------------

$tcaFirstTab = '
--div--;' . $langFile . 'div.data,
';


# ----------------------------------------------------------------------------------------------------------------------
# Additional Tabs and palettes
# ----------------------------------------------------------------------------------------------------------------------

$GLOBALS['TCA']['tt_content']['palettes']['container'] = [
    'showitem' => '',
];

$GLOBALS['TCA']['tt_content']['palettes']['container_background'] = [
    'showitem' => '',
];

$GLOBALS['TCA']['tt_content']['palettes']['content_slug'] = [
    'showitem' => '--linebreak--, tx_content_slug_fragment, --linebreak--',
];

$tcaBase = '--div--;' . $langFile . 'div.margins_paddings,
                --palette--;' . $langFile . 'palettes.container;container,
            --div--;' . $langFile . 'div.backgrounds,
                --palette--;' . $langFile . 'palettes.container_background;container_background,
            --div--;' . $langFile . 'div.settings,
                --palette--;' . $langFile . 'palettes.content_slug;content_slug,
                --palette--;;language,
                --palette--;;general,
                --palette--;;hidden,
                --palette--;;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
';


# ----------------------------------------------------------------------------------------------------------------------
# Create fields TCA and add columnsOverrides
# ----------------------------------------------------------------------------------------------------------------------

if (!empty($contentElements)) {
    foreach ($contentElements as $singleContentElement => $singleContentElementFields) {
        // Adds the content element to the "Type" dropdown
        // Numerical array:
        // [0] => Plugin label,
        // [1] => Plugin identifier / plugin key, ideally prefixed with an extension-specific name (e.g. "events2_list"),
        // [2] => Path to plugin icon,
        // [3] => an optional "group" ID, falls back to "default
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
            [
                $langFile . 'new_ce.' . $singleContentElement . '.title',
                $singleContentElement,
                'EXT:intbuilder/Resources/Public/Backend/Previews/' . $singleContentElement . '.png',
            ],
            'CType',
            'intbuilder'
        );

        // Configure the default backend fields for the content elements
        $GLOBALS['TCA'][$table]['types'][$singleContentElement] = [
            'showitem' => $tcaFirstTab . $singleContentElementFields . ', ' . $tcaBase,
        ];

    }
}


# ----------------------------------------------------------------------------------------------------------------------
# Override settings by CE's
# ----------------------------------------------------------------------------------------------------------------------
$GLOBALS['TCA']['tt_content']['types']['gallery']['columnsOverrides'] = [
    'int_image1' => [
        'config' => [
            'maxitems' => 100,
        ],
    ],
];

$GLOBALS['TCA']['tt_content']['types']['admin-images-detail']['columnsOverrides'] = [
    'int_image1' => [
        'config' => [
            'maxitems' => 100,
        ],
    ],
];

$GLOBALS['TCA']['tt_content']['types']['summary1']['columnsOverrides'] = [
    'int_header1'    => [
        'label' => $langFile . 'tt_content.override.summary1.header_summary',
    ],
    'int_header2'    => [
        'label' => $langFile . 'tt_content.override.summary1.header_relatedlinks',
    ],
    'int_header3'    => [
        'label' => $langFile . 'tt_content.override.summary1.header_downloads',
    ],
    'int_subheader1' => [
        'label' => $langFile . 'tt_content.override.summary1.header_contacts',
    ],
    'int_image1'     => [
        'label'  => $langFile . 'tt_content.override.summary1.documents',
        'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
            'int_image1',
            [
                'minitems'   => 0,
                'maxitems'   => 100,
                'appearance' => [
                    'collapseAll'                => 1,
                    'expandSingle'               => 1,
                    'createNewRelationLinkTitle' => $langFile . 'tt_content.override.summary1.add_new_document',
                    'fileUploadAllowed'          => false,
                ],
            ],
            'pdf'
        ),
    ],
];

$GLOBALS['TCA']['tt_content']['types']['summary2']['columnsOverrides'] = [
    'int_text1' => [
        'description' => $langFile . 'tt_content.override.summary2.description',
    ],
];

$GLOBALS['TCA']['tt_content']['types']['page-header']['columnsOverrides'] = [
    'int_text1' => [
        'config' => [
            'enableRichtext' => false,
        ],
    ],
];

$GLOBALS['TCA']['tt_content']['types']['page-hero']['columnsOverrides'] = [
    'int_text1' => [
        'config' => [
            'enableRichtext' => false,
        ],
    ],
];

$GLOBALS['TCA']['tt_content']['types']['divider']['columnsOverrides'] = [
    'int_checkbox1' => [
        'label' => $langFile . 'tt_content.override.divider',
    ],
];

$GLOBALS['TCA']['tt_content']['types']['quote']['columnsOverrides'] = [
    'int_image1'    => [
        'label' => $langFile . 'tt_content.override.quote.int_image1',
    ],
    'int_image2'    => [
        'label' => $langFile . 'tt_content.override.quote.int_image2',
    ],
    'int_checkbox1' => [
        'label' => $langFile . 'tt_content.override.quote.int_checkbox1',
    ],
];

//$GLOBALS['TCA']['tt_content']['types']['sticky-box']['columnsOverrides'] = [
//    //'int_image1, int_subheader1, int_text1, int_text2, int_text3, int_image2'
//    'int_image1'     => [
//        'label' => $langFile . 'tt_content.override.sticky-box.int_image1',
//    ],
//    'int_subheader1' => [
//        'label' => $langFile . 'tt_content.override.sticky-box.int_subheader1',
//    ],
//    'int_select1'    => [
//        'label' => $langFile . 'tt_content.override.sticky-box.int_select1',
//        'config' => [
//            'size'=> 10,
//            'renderType' => 'selectMultipleSideBySide',
//            'minitems'=>0,
//            'maxitems'=>100,
//            'items' => [
//                [ 'Asia', 'Asia' ],
//                [ 'Africa', 'Africa' ],
//                [ 'Europe', 'Europe' ],
//                [ 'North America', 'North America' ],
//                [ 'South America', 'South America' ],
//                [ 'Australia/Oceania', 'Australia/Oceania' ],
//            ],
//        ],
//    ],
//    'int_select2'    => [
//        'label' => $langFile . 'tt_content.override.sticky-box.int_select2',
//        'config' => [
//            'size'=> 10,
//            'renderType' => 'selectMultipleSideBySide',
//            'minitems'=>0,
//            'maxitems'=>100,
//            'items' => [
//                [ 'Andorra', 'Andorra' ],
//                [ 'United Arab Emirates', 'United Arab Emirates' ],
//                [ 'Afghanistan', 'Afghanistan' ],
//                [ 'Antigua and Barbuda', 'Antigua and Barbuda' ],
//                [ 'Anguilla', 'Anguilla' ],
//                [ 'Albania', 'Albania' ],
//                [ 'Armenia', 'Armenia' ],
//                [ 'Angola', 'Angola' ],
//                [ 'Antarctica', 'Antarctica' ],
//                [ 'Argentina', 'Argentina' ],
//                [ 'American Samoa', 'American Samoa' ],
//                [ 'Austria', 'Austria' ],
//                [ 'Australia', 'Australia' ],
//                [ 'Aruba', 'Aruba' ],
//                [ 'Åland', 'Åland' ],
//                [ 'Azerbaijan', 'Azerbaijan' ],
//                [ 'Bosnia and Herzegovina', 'Bosnia and Herzegovina' ],
//                [ 'Barbados', 'Barbados' ],
//                [ 'Bangladesh', 'Bangladesh' ],
//                [ 'Belgium', 'Belgium' ],
//                [ 'Burkina Faso', 'Burkina Faso' ],
//                [ 'Bulgaria', 'Bulgaria' ],
//                [ 'Bahrain', 'Bahrain' ],
//                [ 'Burundi', 'Burundi' ],
//                [ 'Benin', 'Benin' ],
//                [ 'Saint Barthélemy', 'Saint Barthélemy' ],
//                [ 'Bermuda', 'Bermuda' ],
//                [ 'Brunei', 'Brunei' ],
//                [ 'Bolivia', 'Bolivia' ],
//                [ 'Bonaire, Sint Eustatius, and Saba', 'Bonaire, Sint Eustatius, and Saba' ],
//                [ 'Brazil', 'Brazil' ],
//                [ 'Bahamas', 'Bahamas' ],
//                [ 'Bhutan', 'Bhutan' ],
//                [ 'Bouvet Island', 'Bouvet Island' ],
//                [ 'Botswana', 'Botswana' ],
//                [ 'Belarus', 'Belarus' ],
//                [ 'Belize', 'Belize' ],
//                [ 'Canada', 'Canada' ],
//                [ 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands' ],
//                [ 'DR Congo', 'DR Congo' ],
//                [ 'Central African Republic', 'Central African Republic' ],
//                [ 'Congo Republic', 'Congo Republic' ],
//                [ 'Switzerland', 'Switzerland' ],
//                [ 'Ivory Coast', 'Ivory Coast' ],
//                [ 'Cook Islands', 'Cook Islands' ],
//                [ 'Chile', 'Chile' ],
//                [ 'Cameroon', 'Cameroon' ],
//                [ 'China', 'China' ],
//                [ 'Colombia', 'Colombia' ],
//                [ 'Costa Rica', 'Costa Rica' ],
//                [ 'Cuba', 'Cuba' ],
//                [ 'Cabo Verde', 'Cabo Verde' ],
//                [ 'Curaçao', 'Curaçao' ],
//                [ 'Christmas Island', 'Christmas Island' ],
//                [ 'Cyprus', 'Cyprus' ],
//                [ 'Czechia', 'Czechia' ],
//                [ 'Germany', 'Germany' ],
//                [ 'Djibouti', 'Djibouti' ],
//                [ 'Denmark', 'Denmark' ],
//                [ 'Dominica', 'Dominica' ],
//                [ 'Dominican Republic', 'Dominican Republic' ],
//                [ 'Algeria', 'Algeria' ],
//                [ 'Ecuador', 'Ecuador' ],
//                [ 'Estonia', 'Estonia' ],
//                [ 'Egypt', 'Egypt' ],
//                [ 'Western Sahara', 'Western Sahara' ],
//                [ 'Eritrea', 'Eritrea' ],
//                [ 'Spain', 'Spain' ],
//                [ 'Ethiopia', 'Ethiopia' ],
//                [ 'Finland', 'Finland' ],
//                [ 'Fiji', 'Fiji' ],
//                [ 'Falkland Islands', 'Falkland Islands' ],
//                [ 'Micronesia', 'Micronesia' ],
//                [ 'Faroe Islands', 'Faroe Islands' ],
//                [ 'France', 'France' ],
//                [ 'Gabon', 'Gabon' ],
//                [ 'United Kingdom', 'United Kingdom' ],
//                [ 'Grenada', 'Grenada' ],
//                [ 'Georgia', 'Georgia' ],
//                [ 'French Guiana', 'French Guiana' ],
//                [ 'Guernsey', 'Guernsey' ],
//                [ 'Ghana', 'Ghana' ],
//                [ 'Gibraltar', 'Gibraltar' ],
//                [ 'Greenland', 'Greenland' ],
//                [ 'The Gambia', 'The Gambia' ],
//                [ 'Guinea', 'Guinea' ],
//                [ 'Guadeloupe', 'Guadeloupe' ],
//                [ 'Equatorial Guinea', 'Equatorial Guinea' ],
//                [ 'Greece', 'Greece' ],
//                [ 'South Georgia and South Sandwich Islands', 'South Georgia and South Sandwich Islands' ],
//                [ 'Guatemala', 'Guatemala' ],
//                [ 'Guam', 'Guam' ],
//                [ 'Guinea-Bissau', 'Guinea-Bissau' ],
//                [ 'Guyana', 'Guyana' ],
//                [ 'Hong Kong', 'Hong Kong' ],
//                [ 'Heard and McDonald Islands', 'Heard and McDonald Islands' ],
//                [ 'Honduras', 'Honduras' ],
//                [ 'Croatia', 'Croatia' ],
//                [ 'Haiti', 'Haiti' ],
//                [ 'Hungary', 'Hungary' ],
//                [ 'Indonesia', 'Indonesia' ],
//                [ 'Ireland', 'Ireland' ],
//                [ 'Israel', 'Israel' ],
//                [ 'Isle of Man', 'Isle of Man' ],
//                [ 'India', 'India' ],
//                [ 'British Indian Ocean Territory', 'British Indian Ocean Territory' ],
//                [ 'Iraq', 'Iraq' ],
//                [ 'Iran', 'Iran' ],
//                [ 'Iceland', 'Iceland' ],
//                [ 'Italy', 'Italy' ],
//                [ 'Jersey', 'Jersey' ],
//                [ 'Jamaica', 'Jamaica' ],
//                [ 'Jordan', 'Jordan' ],
//                [ 'Japan', 'Japan' ],
//                [ 'Kenya', 'Kenya' ],
//                [ 'Kyrgyzstan', 'Kyrgyzstan' ],
//                [ 'Cambodia', 'Cambodia' ],
//                [ 'Kiribati', 'Kiribati' ],
//                [ 'Comoros', 'Comoros' ],
//                [ 'St Kitts and Nevis', 'St Kitts and Nevis' ],
//                [ 'North Korea', 'North Korea' ],
//                [ 'South Korea', 'South Korea' ],
//                [ 'Kuwait', 'Kuwait' ],
//                [ 'Cayman Islands', 'Cayman Islands' ],
//                [ 'Kazakhstan', 'Kazakhstan' ],
//                [ 'Laos', 'Laos' ],
//                [ 'Lebanon', 'Lebanon' ],
//                [ 'Saint Lucia', 'Saint Lucia' ],
//                [ 'Liechtenstein', 'Liechtenstein' ],
//                [ 'Sri Lanka', 'Sri Lanka' ],
//                [ 'Liberia', 'Liberia' ],
//                [ 'Lesotho', 'Lesotho' ],
//                [ 'Lithuania', 'Lithuania' ],
//                [ 'Luxembourg', 'Luxembourg' ],
//                [ 'Latvia', 'Latvia' ],
//                [ 'Libya', 'Libya' ],
//                [ 'Morocco', 'Morocco' ],
//                [ 'Monaco', 'Monaco' ],
//                [ 'Moldova', 'Moldova' ],
//                [ 'Montenegro', 'Montenegro' ],
//                [ 'Saint Martin', 'Saint Martin' ],
//                [ 'Madagascar', 'Madagascar' ],
//                [ 'Marshall Islands', 'Marshall Islands' ],
//                [ 'North Macedonia', 'North Macedonia' ],
//                [ 'Mali', 'Mali' ],
//                [ 'Myanmar', 'Myanmar' ],
//                [ 'Mongolia', 'Mongolia' ],
//                [ 'Macao', 'Macao' ],
//                [ 'Northern Mariana Islands', 'Northern Mariana Islands' ],
//                [ 'Martinique', 'Martinique' ],
//                [ 'Mauritania', 'Mauritania' ],
//                [ 'Montserrat', 'Montserrat' ],
//                [ 'Malta', 'Malta' ],
//                [ 'Mauritius', 'Mauritius' ],
//                [ 'Maldives', 'Maldives' ],
//                [ 'Malawi', 'Malawi' ],
//                [ 'Mexico', 'Mexico' ],
//                [ 'Malaysia', 'Malaysia' ],
//                [ 'Mozambique', 'Mozambique' ],
//                [ 'Namibia', 'Namibia' ],
//                [ 'New Caledonia', 'New Caledonia' ],
//                [ 'Niger', 'Niger' ],
//                [ 'Norfolk Island', 'Norfolk Island' ],
//                [ 'Nigeria', 'Nigeria' ],
//                [ 'Nicaragua', 'Nicaragua' ],
//                [ 'Netherlands', 'Netherlands' ],
//                [ 'Norway', 'Norway' ],
//                [ 'Nepal', 'Nepal' ],
//                [ 'Nauru', 'Nauru' ],
//                [ 'Niue', 'Niue' ],
//                [ 'New Zealand', 'New Zealand' ],
//                [ 'Oman', 'Oman' ],
//                [ 'Panama', 'Panama' ],
//                [ 'Peru', 'Peru' ],
//                [ 'French Polynesia', 'French Polynesia' ],
//                [ 'Papua New Guinea', 'Papua New Guinea' ],
//                [ 'Philippines', 'Philippines' ],
//                [ 'Pakistan', 'Pakistan' ],
//                [ 'Poland', 'Poland' ],
//                [ 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon' ],
//                [ 'Pitcairn Islands', 'Pitcairn Islands' ],
//                [ 'Puerto Rico', 'Puerto Rico' ],
//                [ 'Palestine', 'Palestine' ],
//                [ 'Portugal', 'Portugal' ],
//                [ 'Palau', 'Palau' ],
//                [ 'Paraguay', 'Paraguay' ],
//                [ 'Qatar', 'Qatar' ],
//                [ 'Réunion', 'Réunion' ],
//                [ 'Romania', 'Romania' ],
//                [ 'Serbia', 'Serbia' ],
//                [ 'Russia', 'Russia' ],
//                [ 'Rwanda', 'Rwanda' ],
//                [ 'Saudi Arabia', 'Saudi Arabia' ],
//                [ 'Solomon Islands', 'Solomon Islands' ],
//                [ 'Seychelles', 'Seychelles' ],
//                [ 'Sudan', 'Sudan' ],
//                [ 'Sweden', 'Sweden' ],
//                [ 'Singapore', 'Singapore' ],
//                [ 'Saint Helena', 'Saint Helena' ],
//                [ 'Slovenia', 'Slovenia' ],
//                [ 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen' ],
//                [ 'Slovakia', 'Slovakia' ],
//                [ 'Sierra Leone', 'Sierra Leone' ],
//                [ 'San Marino', 'San Marino' ],
//                [ 'Senegal', 'Senegal' ],
//                [ 'Somalia', 'Somalia' ],
//                [ 'Suriname', 'Suriname' ],
//                [ 'South Sudan', 'South Sudan' ],
//                [ 'São Tomé and Príncipe', 'São Tomé and Príncipe' ],
//                [ 'El Salvador', 'El Salvador' ],
//                [ 'Sint Maarten', 'Sint Maarten' ],
//                [ 'Syria', 'Syria' ],
//                [ 'Eswatini', 'Eswatini' ],
//                [ 'Turks and Caicos Islands', 'Turks and Caicos Islands' ],
//                [ 'Chad', 'Chad' ],
//                [ 'French Southern Territories', 'French Southern Territories' ],
//                [ 'Togo', 'Togo' ],
//                [ 'Thailand', 'Thailand' ],
//                [ 'Tajikistan', 'Tajikistan' ],
//                [ 'Tokelau', 'Tokelau' ],
//                [ 'Timor-Leste', 'Timor-Leste' ],
//                [ 'Turkmenistan', 'Turkmenistan' ],
//                [ 'Tunisia', 'Tunisia' ],
//                [ 'Tonga', 'Tonga' ],
//                [ 'Turkey', 'Turkey' ],
//                [ 'Trinidad and Tobago', 'Trinidad and Tobago' ],
//                [ 'Tuvalu', 'Tuvalu' ],
//                [ 'Taiwan', 'Taiwan' ],
//                [ 'Tanzania', 'Tanzania' ],
//                [ 'Ukraine', 'Ukraine' ],
//                [ 'Uganda', 'Uganda' ],
//                [ 'U.S. Outlying Islands', 'U.S. Outlying Islands' ],
//                [ 'United States', 'United States' ],
//                [ 'Uruguay', 'Uruguay' ],
//                [ 'Uzbekistan', 'Uzbekistan' ],
//                [ 'Vatican City', 'Vatican City' ],
//                [ 'St Vincent and Grenadines', 'St Vincent and Grenadines' ],
//                [ 'Venezuela', 'Venezuela' ],
//                [ 'British Virgin Islands', 'British Virgin Islands' ],
//                [ 'U.S. Virgin Islands', 'U.S. Virgin Islands' ],
//                [ 'Vietnam', 'Vietnam' ],
//                [ 'Vanuatu', 'Vanuatu' ],
//                [ 'Wallis and Futuna', 'Wallis and Futuna' ],
//                [ 'Samoa', 'Samoa' ],
//                [ 'Kosovo', 'Kosovo' ],
//                [ 'Yemen', 'Yemen' ],
//                [ 'Mayotte', 'Mayotte' ],
//                [ 'South Africa', 'South Africa' ],
//                [ 'Zambia', 'Zambia' ],
//                [ 'Zimbabwe', 'Zimbabwe' ],
//            ],
//        ],
//    ],
//];


# ----------------------------------------------------------------------------------------------------------------------
# DO NOT CHANGE BELOW THIS LINE
# ----------------------------------------------------------------------------------------------------------------------


// Change Preview Renderer
$GLOBALS['TCA'][$table]['ctrl']['previewRenderer'] = \Int\Intbuilder\Hooks\PageLayoutView\PreviewRenderer::class;

// Replace identifier
$GLOBALS['TCA'][$table]['ctrl']['label']     = 'int_identifier';
$GLOBALS['TCA'][$table]['ctrl']['label_alt'] = 'header';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    $table,
    $newFields
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    $table,
    implode(',', array_keys($contentElements))
);

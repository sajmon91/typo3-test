<?php


# ----------------------------------------------------------------------------------------------------------------------
# Add an entry in the static template list found in sys_templates for static TS
# ----------------------------------------------------------------------------------------------------------------------

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'intbuilder',
    'Configuration/TypoScript',
    'Intbuilder Typoscript'
);

// https://github.com/smichaelsen/melon-images

//$GLOBALS['TCA']['sys_file_reference']['columns']['crop']['config']['cropVariants'] = [
//    'demo' => [
//        'title' => 'Demo',
//        'allowedAspectRatios' => [
//            '4:3' => [
//                'title' => '4:3',
//                'value' => 4 / 3
//            ],
//                 'NaN' => [
//                     'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
//                     'value' => 0.0
//                 ],
//        ],
//        'selectedRatio' => '4:3',
//        'cropArea' => [
//            'x' => 0.0,
//            'y' => 0.0,
//            'width' => 1.0,
//            'height' => 1.0,
//        ],
//        'focusArea' => [
//    'x'      => 0.1,
//    'y'      => 0.1,
//    'width'  => 0.8,
//    'height' => 0.8,
//        ],
//        'coverAreas' => [
//            [
//                'x' => 0.05,
//                'y' => 0.85,
//                'width' => 0.9,
//                'height' => 0.1,
//            ]
//        ],
//    ],
//];
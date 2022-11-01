<?php

/**
 * Extension Manager/Repository config file for ext "demo_test_package".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'demo test package',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
            'fluid_styled_content' => '11.5.0-11.5.99',
            'rte_ckeditor' => '11.5.0-11.5.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'CompanyTest\\DemoTestPackage\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Stefan',
    'author_email' => 'stefan.sajmon@gmail.com',
    'author_company' => 'Company test',
    'version' => '1.0.0',
];

<?php
/***************************************************************
 * Extension Manager/Repository config file for ext "Int.Inthelper".
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/
$EM_CONF[$_EXTKEY] = [
    'title'                         => 'Inthelper',
    'description'                   => 'TYPO3 Helper extension',
    'category'                      => 'misc',
    'version'                       => '11.0.1',
    'state'                         => 'stable',
    'uploadfolder'                  => 0,
    'createDirs'                    => '',
    'clearCacheOnLoad'              => 1,
    'author'                        => 'Saša Stojanović',
    'author_email'                  => 'stojanovic@intention.rs',
    'author_company'                => 'Intention Digital',
    'constraints'                   => [
        'depends'   => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [
        ],
        'suggests'  => [
        ],
    ],
    '_md5_values_when_last_written' => 'a:0:{}',
    'suggests'                      => [
    ],
    'autoload'                      => [
        'psr-4' => [
            'Int\\Inthelper\\' => 'Classes',
        ],
    ],
];

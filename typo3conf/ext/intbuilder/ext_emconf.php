<?php
/***************************************************************
 * Extension Manager/Repository config file for ext "Int.Intbuilder".
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/
$EM_CONF[$_EXTKEY] = [
    'title'                         => 'Intbuilder',
    'description'                   => 'TYPO3 main project extension',
    'category'                      => 'misc',
    'version'                       => '11.0.2',
    'state'                         => 'stable',
    'uploadfolder'                  => 0,
    'createDirs'                    => '',
    'clearCacheOnLoad'              => 1,
    'author'                        => 'Saša Stojanović',
    'author_email'                  => 'stojanovic@intention.rs',
    'author_company'                => 'Intention Digital',
    'constraints'                   => [
        'depends'   => [
            'typo3'           => '11.5.0-11.5.99',
            'inthelper'       => '11.0.0-11.0.99',
            'sourceopt'       => '4.0.0-4.0.99',
            'staticfilecache' => '12.3.0-12.3.99',
            'content_slug'    => '2.1.0-2.1.99',
            'slug'            => '4.0.0-4.0.99',
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
            'Int\\Intbuilder\\' => 'Classes',
        ],
    ],
];

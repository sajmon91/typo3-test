<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "Int.Intnews".
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title'            => 'Intnews',
    'description'      => 'Simple News listing with detail page',
    'category'         => 'plugin',
    'author'           => 'Saša Stojanović',
    'author_email'     => 'stojanovic@intention.rs',
    'state'            => 'stable',
    'clearCacheOnLoad' => 1,
    'version'          => '11.0.0',
    'constraints'      => [
        'depends'   => [
            'typo3'      => '11.5.0-11.5.99',
            'inthelper'  => '11.0.0-11.0.99',
            'intbuilder' => '11.0.0-11.0.99'
        ],
        'conflicts' => [],
        'suggests'  => [],
    ],
    'autoload'         => [
        'psr-4' => [
            'Int\\Intnews\\' => 'Classes',
        ],
    ],
];

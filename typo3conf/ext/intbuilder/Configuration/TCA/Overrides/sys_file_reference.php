<?php

$extensionName = 'intbuilder';
$table         = str_replace('.php', '', basename(__FILE__));
$langFile      = 'LLL:EXT:' . $extensionName . '/Resources/Private/Language/locallang_sysfilereference_db.xlf:';

\Int\Intbuilder\Utility\TcaUtility::$langFile = $langFile;


$newFields = [
    'int_lightbox' => \Int\Intbuilder\Utility\TcaUtility::addCheckbox(
        'int_lightbox',
        $table,
    ),
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    $table,
    $newFields
);


TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_file_reference', $newFields, 1);
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'sys_file_reference',
    'imageoverlayPalette',
    'int_lightbox',
    'after:crop'
);

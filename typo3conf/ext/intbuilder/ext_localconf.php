<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}


# ----------------------------------------------------------------------------------------------------------------------
# DO NOT CHANGE BELOW THIS LINE
# ----------------------------------------------------------------------------------------------------------------------

$publicPath = 'EXT:intbuilder/Resources/Public/Backend/';


# ----------------------------------------------------------------------------------------------------------------------
# Configure RTE Presets
# ----------------------------------------------------------------------------------------------------------------------

$rteConfigPath = '/Configuration/RTE/Configurations/';

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['minimal'] = 'EXT:intbuilder' . $rteConfigPath . 'Minimal.yaml';
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['nostyle'] = 'EXT:intbuilder' . $rteConfigPath . 'NoStyle.yaml';
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:intbuilder' . $rteConfigPath . 'Default.yaml';


# ----------------------------------------------------------------------------------------------------------------------
# Configure INT Snippet Cache
# ----------------------------------------------------------------------------------------------------------------------

if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['int_snippet']) || !is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['int_snippet'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['int_snippet'] = [];
}

# ----------------------------------------------------------------------------------------------------------------------
# DO NOT CHANGE BELOW THIS LINE
# ----------------------------------------------------------------------------------------------------------------------


$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Imaging\IconRegistry::class
);

$iconRegistry->registerIcon(
    'author',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    [ 'source' => 'EXT:intbuilder/Resources/Public/Backend/Icons/RecordIcons/author.svg' ]
);

$iconRegistry->registerIcon(
    'category',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    [ 'source' => 'EXT:intbuilder/Resources/Public/Backend/Icons/RecordIcons/category.svg' ]
);
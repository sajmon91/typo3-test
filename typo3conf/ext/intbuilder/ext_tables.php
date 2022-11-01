<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$publicPath = 'EXT:intbuilder/Resources/Public/Backend/';


# ----------------------------------------------------------------------------------------------------------------------
# Register Content elements
# ----------------------------------------------------------------------------------------------------------------------

$contentElements = [
    'text',
    'image',
    'accordion-irre',
    'hero-slider-irre',
    'quote',
    'tabs-irre',
    'teaser-box-irre',
    'teaser-box-icon-irre',
    'teaser-box-image-irre',
    'text-with-image',
    'video',
    'admin-images-detail',
    'summary1',
    'summary2',
    'download-irre',
    'usp-irre',
    'box-teaser-irre',
    'teaser-slider-box-irre',
    'teaser-slider-image-irre',
    'gallery',
    'page-header',
    'page-hero',
    'divider',
    'sticky-box',
    'item-teaser',
    'references'
];


# ----------------------------------------------------------------------------------------------------------------------
# Add list of tables which should be allowed on pages, these are usually items from IRRE items
# ----------------------------------------------------------------------------------------------------------------------

$allowedTables = [
    'tx_intbuilder_domain_model_irre_accordion',
    'tx_intbuilder_domain_model_irre_heroslider',
    'tx_intbuilder_domain_model_irre_tabs',
    'tx_intbuilder_domain_model_irre_teaserbox',
    'tx_intbuilder_domain_model_irre_teaserboxicon',
    'tx_intbuilder_domain_model_irre_teaserboximage',
    'tx_intbuilder_domain_model_irre_download',
    'tx_intbuilder_domain_model_irre_usp',
    'tx_intbuilder_domain_model_irre_boxteaser',
    'tx_intbuilder_domain_model_irre_teasersliderbox',
    'tx_intbuilder_domain_model_irre_teasersliderimage',
    'tx_intbuilder_domain_model_irre_itemteaser',
    'tx_intbuilder_domain_model_irre_references',
];

foreach ($allowedTables as $singleAllowedTable) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages($singleAllowedTable);
}


# ----------------------------------------------------------------------------------------------------------------------
# Register Plugins
# ----------------------------------------------------------------------------------------------------------------------

//\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
//    'Int.Intbuilder',
//    'Dummy',
//    'Dummy'
//);


# ----------------------------------------------------------------------------------------------------------------------
# DO NOT CHANGE BELOW THIS LINE
# ----------------------------------------------------------------------------------------------------------------------

// Create Icons for all Content Elements
if (!empty($contentElements)) {
    foreach ($contentElements as $singleContentElement) {
        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)->registerIcon(
            $singleContentElement,
            \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
            [ 'source' => $publicPath . 'Previews/' . $singleContentElement . '.png' ]
        );
    }
}


# ----------------------------------------------------------------------------------------------------------------------
# Add changed skin for BE
# ----------------------------------------------------------------------------------------------------------------------

$GLOBALS['TBE_STYLES']['skins']['intbuilder']                          = [];
$GLOBALS['TBE_STYLES']['skins']['intbuilder']['name']                  = 'intbuilder';
$GLOBALS['TBE_STYLES']['skins']['intbuilder']['stylesheetDirectories'] = [
    'visual' => 'EXT:intbuilder/stylesheets/visual',
];
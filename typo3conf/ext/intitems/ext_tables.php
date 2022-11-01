<?php
defined('TYPO3_MODE') || die();

call_user_func(static function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_intitems_domain_model_item',
        'EXT:intitems/Resources/Private/Language/locallang_csh_tx_intitems_domain_model_item.xlf'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_intitems_domain_model_item');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_intitems_domain_model_itemproperty',
        'EXT:intitems/Resources/Private/Language/locallang_csh_tx_intitems_domain_model_itemproperty.xlf'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
        'tx_intitems_domain_model_itemproperty'
    );
});

$pluginSignature = str_replace(
        '_',
        '',
        'intitems'
    ) . '_itemlist';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:intitems/Configuration/FlexForms/items.xml'
);
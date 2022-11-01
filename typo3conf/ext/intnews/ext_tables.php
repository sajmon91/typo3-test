<?php
defined('TYPO3_MODE') || die();

call_user_func(static function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_intnews_domain_model_news',
        'EXT:intnews/Resources/Private/Language/locallang_csh_tx_intnews_domain_model_news.xlf'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_intnews_domain_model_news');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
        'tx_intnews_domain_model_newsproperty',
        'EXT:intnews/Resources/Private/Language/locallang_csh_tx_intnews_domain_model_newsproperty.xlf'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
        'tx_intnews_domain_model_newsproperty'
    );
});

$pluginSignature = str_replace(
        '_',
        '',
        'intnews'
    ) . '_newslist';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:intnews/Configuration/FlexForms/news.xml'
);
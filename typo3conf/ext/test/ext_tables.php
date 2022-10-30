<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_test_domain_model_news', 'EXT:test/Resources/Private/Language/locallang_csh_tx_test_domain_model_news.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_test_domain_model_news');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_test_domain_model_newscategory', 'EXT:test/Resources/Private/Language/locallang_csh_tx_test_domain_model_newscategory.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_test_domain_model_newscategory');
})();

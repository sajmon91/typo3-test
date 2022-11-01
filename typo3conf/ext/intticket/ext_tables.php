<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_intticket_domain_model_ticket', 'EXT:intticket/Resources/Private/Language/locallang_csh_tx_intticket_domain_model_ticket.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_intticket_domain_model_ticket');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_intticket_domain_model_note', 'EXT:intticket/Resources/Private/Language/locallang_csh_tx_intticket_domain_model_note.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_intticket_domain_model_note');
})();

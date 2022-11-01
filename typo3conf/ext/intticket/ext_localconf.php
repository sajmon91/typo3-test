<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Intticket',
        'Ticketlist',
        [
            \Int\Intticket\Controller\TicketController::class => 'readMails, list, show, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \Int\Intticket\Controller\TicketController::class => 'readMails, list, show, new, create, edit, update, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    ticketlist {
                        iconIdentifier = intticket-plugin-ticketlist
                        title = LLL:EXT:intticket/Resources/Private/Language/locallang_db.xlf:tx_intticket_ticketlist.name
                        description = LLL:EXT:intticket/Resources/Private/Language/locallang_db.xlf:tx_intticket_ticketlist.description
                        tt_content_defValues {
                            CType = list
                            list_type = intticket_ticketlist
                        }
                    }
                }
                show = *
            }
       }'
    );
})();

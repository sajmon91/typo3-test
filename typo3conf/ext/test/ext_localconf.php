<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Test',
        'Newslist',
        [
            \Sajmon\Test\Controller\NewsController::class => 'list, show, search'
        ],
        // non-cacheable actions
        [
            \Sajmon\Test\Controller\NewsController::class => 'list, show, search',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Test',
        'Newscategories',
        [
            \Sajmon\Test\Controller\NewsCategoryController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \Sajmon\Test\Controller\NewsCategoryController::class => 'list, show'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    newslist {
                        iconIdentifier = test-plugin-newslist
                        title = LLL:EXT:test/Resources/Private/Language/locallang_db.xlf:tx_test_newslist.name
                        description = LLL:EXT:test/Resources/Private/Language/locallang_db.xlf:tx_test_newslist.description
                        tt_content_defValues {
                            CType = list
                            list_type = test_newslist
                        }
                    }
                    newscategories {
                        iconIdentifier = test-plugin-newscategories
                        title = LLL:EXT:test/Resources/Private/Language/locallang_db.xlf:tx_test_newscategories.name
                        description = LLL:EXT:test/Resources/Private/Language/locallang_db.xlf:tx_test_newscategories.description
                        tt_content_defValues {
                            CType = list
                            list_type = test_newscategories
                        }
                    }
                }
                show = *
            }
       }'
    );
})();

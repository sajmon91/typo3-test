<?php
defined('TYPO3_MODE') || die();

call_user_func(
    function () {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Intitems',
            'Itemlist',
            [
                \Int\Intitems\Controller\ItemController::class => 'list',
            ],
            // non-cacheable actions
            [
                \Int\Intitems\Controller\ItemController::class => '',
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Intitems',
            'Itemdetail',
            [
                \Int\Intitems\Controller\ItemController::class => 'show',
            ],
            // non-cacheable actions
            [
                \Int\Intitems\Controller\ItemController::class => '',
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        itemlist {
                            iconIdentifier = intitems-plugin-itemlist
                            title = LLL:EXT:intitems/Resources/Private/Language/locallang_db.xlf:tx_intitems_itemlist.name
                            description = LLL:EXT:intitems/Resources/Private/Language/locallang_db.xlf:tx_intitems_itemlist.description
                            tt_content_defValues {
                                CType = list
                                list_type = intitems_itemlist
                            }
                        }
                        itemdetail {
                            iconIdentifier = intitems-plugin-itemdetail
                            title = LLL:EXT:intitems/Resources/Private/Language/locallang_db.xlf:tx_intitems_itemdetail.name
                            description = LLL:EXT:intitems/Resources/Private/Language/locallang_db.xlf:tx_intitems_itemdetail.description
                            tt_content_defValues {
                                CType = list
                                list_type = intitems_itemdetail
                            }
                        }
                    }
                    show = *
                }
           }'
        );
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Imaging\IconRegistry::class
        );

        $iconRegistry->registerIcon(
            'intitems-plugin-itemlist',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            [ 'source' => 'EXT:intitems/Resources/Public/Icons/user_plugin_itemlist.svg' ]
        );

        $iconRegistry->registerIcon(
            'intitems-plugin-itemdetail',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            [ 'source' => 'EXT:intitems/Resources/Public/Icons/user_plugin_itemdetail.svg' ]
        );

    }
);

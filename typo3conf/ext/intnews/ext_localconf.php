<?php
defined('TYPO3_MODE') || die();

call_user_func(
    function () {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Intnews',
            'Newslist',
            [
                \Int\Intnews\Controller\NewsController::class => 'list',
            ],
            // non-cacheable actions
            [
                \Int\Intnews\Controller\NewsController::class => '',
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Intnews',
            'Newsdetail',
            [
                \Int\Intnews\Controller\NewsController::class => 'show',
            ],
            // non-cacheable actions
            [
                \Int\Intnews\Controller\NewsController::class => '',
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardNewss.plugins {
                    elements {
                        itemlist {
                            iconIdentifier = intnews-plugin-itemlist
                            title = LLL:EXT:intnews/Resources/Private/Language/locallang_db.xlf:tx_intnews_newslist.name
                            description = LLL:EXT:intnews/Resources/Private/Language/locallang_db.xlf:tx_intnews_newslist.description
                            tt_content_defValues {
                                CType = list
                                list_type = intnews_newslist
                            }
                        }
                        itemdetail {
                            iconIdentifier = intnews-plugin-itemdetail
                            title = LLL:EXT:intnews/Resources/Private/Language/locallang_db.xlf:tx_intnews_newsdetail.name
                            description = LLL:EXT:intnews/Resources/Private/Language/locallang_db.xlf:tx_intnews_newsdetail.description
                            tt_content_defValues {
                                CType = list
                                list_type = intnews_newsdetail
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
            'intnews-plugin-itemlist',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            [ 'source' => 'EXT:intnews/Resources/Public/Icons/user_plugin_newslist.svg' ]
        );

        $iconRegistry->registerIcon(
            'intnews-plugin-itemdetail',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            [ 'source' => 'EXT:intnews/Resources/Public/Icons/user_plugin_newsdetail.svg' ]
        );

    }
);

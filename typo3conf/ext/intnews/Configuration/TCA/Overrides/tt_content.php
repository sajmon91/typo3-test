<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Intnews',
    'Newslist',
    'News list'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Intnews',
    'Newsdetail',
    'News detail'
);

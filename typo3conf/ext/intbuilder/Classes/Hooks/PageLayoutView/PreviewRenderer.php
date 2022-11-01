<?php

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

declare(strict_types=1);

namespace Int\Intbuilder\Hooks\PageLayoutView;

use Int\Intbuilder\Domain\Model\Content;
use Int\Intbuilder\Domain\Model\Irre\TeaserBoxImage;
use Int\Intbuilder\Domain\Repository\ContentRepository;
use TYPO3\CMS\Backend\Preview\PreviewRendererInterface;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Service\FlexFormService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\View\BackendLayout\Grid\GridColumnItem;
use Int\Intbuilder\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Service\ImageService;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Contains a preview rendering for the page module of CType
 */
class PreviewRenderer implements PreviewRendererInterface
{

    /**
     * @var array
     */
    public array $ce = [
        'accordion-irre',
        'hero-slider-irre',
        'tabs-irre',
        'text-with-image',
        'text',
        'image',
        'video',
        'teaser-box-irre',
        'teaser-box-icon-irre',
        'teaser-box-image-irre',
        'quote',
        'gallery',
        'summary1',
        'summary2',
        'download-irre',
        'usp-irre',
        'box-teaser-irre',
        'teaser-slider-box-irre',
        'teaser-slider-image-irre',
        'divider',
        'sticky-box',
        'item-teaser',
        'references',
        'pardot-form-container',
        'product-group',
        'page-hero',
        'page-header',

        'html',
        'list'
    ];

    /**
     * @var array
     */
    public array $ceMapping = [];

    /**
     * @var array
     */
    public array $pluginMapping = [];

    public function renderPageModulePreviewFooter(GridColumnItem $item): string
    {
        return '';
    }

    /**
     * Dedicated method for rendering preview header HTML for
     * the page module only. Receives $item which is an instance of
     * GridColumnItem which has a getter method to return the record.
     *
     * @param \TYPO3\CMS\Backend\View\BackendLayout\Grid\GridColumnItem $item
     *
     * @return string
     */
    public function renderPageModulePreviewHeader(GridColumnItem $item): string
    {
        $this->ceMapping = $this->buildCe();

        $record = $item->getRecord();
        $header = '';
        if ($record['int_identifier']) {
            $header = '<strong>' . $this->wrapLink($item, $record['int_identifier']) . '</strong><br />';
        } else {
            if ($record['header']) {
                $header = '<strong>' . $this->wrapLink($item, $record['header']) . '</strong><br />';
            }
        }
        return $header . '<h4 class="intbuilder-ce-name">' . $this->ceMapping[$record['CType']] . '</h4>';
    }

    /**
     * Dedicated method for rendering preview body HTML for
     * the page module only.
     *
     * @param GridColumnItem $item
     *
     * @return string
     */
    public function renderPageModulePreviewContent(GridColumnItem $item): string
    {
        $this->ceMapping = $this->buildCe();
        $record          = $item->getRecord();

        $title        = '';
        $subheader    = '';
        $bodytext     = '';
        $headerPlugin = '';

        $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
        $origSettings    = $flexFormService->convertFlexFormContentToArray($record['pi_flexform']);

        $imagePath = '/typo3conf/ext/intbuilder/Resources/Public/Backend/Previews/';

        if ($record['header']) {
            $title = $record['header'];
        }

        if ($record['int_header1']) {
            $subheader = $record['int_header1'];
        }

        if ($record['int_header2']) {
            $subheader .= ' (' . $record['int_header2'] . ') ';
        }

        if ($record['int_text1']) {
            $bodytext = $record['int_text1'];
        }

        $icon = '<img src="' . $imagePath . $record['CType'] . '.png" align="right"  class="intbuilder_thumbnail" alt="' . $imagePath . $record['CType'] . '.png" />';

        if ($record['CType'] === 'list') {

            $headerPlugin = 'PLUGIN';

            if (isset($origSettings['settings']['headline'])) {
                $headerPlugin .= ': ' . $origSettings['settings']['headline'];
            }

            if (isset($origSettings['settings']['subheadline'])) {
                $subheader = $origSettings['settings']['subheadline'];
            }

            $pluginIdentifier = explode('_', $record['list_type'])[0];

            if (!empty($origSettings['settings']['whichView'])) {
                $icon = '<img src="' . $imagePath . strtolower(
                        $pluginIdentifier . '_' . $origSettings['settings']['whichView']
                    ) . '.png" align="right" class="intbuilder_thumbnail" alt="' . $imagePath
                    . $pluginIdentifier . '_' .
                    $origSettings['settings']['whichView'] . '.png" />';
            } else {
                $icon = '<img src="' . $imagePath . strtolower(
                        $pluginIdentifier . '_' . $record['list_type']
                    ) . '.png" align="right" class="intbuilder_thumbnail" alt="' . $imagePath
                    . $pluginIdentifier . '_' . $record['list_type'] . '.png" />';
            }
        }

        $itemContent = '';

        if ($headerPlugin) {
            $itemContent .= '<div class="intbuilder-header-plugin">' . $this->wrapLink($item, $headerPlugin) . '</div>';
        }

        $itemContent .= '<div class="intbuilder-wrapper">';

        $itemContent .= $this->wrapLink($item, $icon);
        if (!isset($this->ceMapping[$record['CType']])) {
            if (!empty($this->pluginMapping[$record['list_type']]) && isset($this->pluginMapping[$record['list_type']])) {
                $ceTitle = $this->pluginMapping[$record['list_type']];
            } else {
                $ceTitle = 'CE title missing';
            }
            $itemContent .= $ceTitle;
        }

        if ($title) {
            $itemContent .= '<h2 class="intbuilder-ce-header">' . $this->wrapLink($item, $title) . '</h2>';
        }

        if ($subheader) {
            $itemContent .= '<h3 class="intbuilder-ce-header">' . $this->wrapLink($item, $subheader) . '</h3>';
        }

        if ($bodytext) {
            $itemContent .= $this->wrapLink($item, $bodytext);
        }

        for ($imageCount = 1; $imageCount <= 1; $imageCount++) {
            if ($record['int_image' . $imageCount]) {
                $contentRepository = GeneralUtility::makeInstance(ContentRepository::class);
                $imageService      = GeneralUtility::makeInstance(ImageService::class);
                /** @var \Int\Intbuilder\Domain\Model\Content $contentElement */
                $contentElement = $contentRepository->findByUid($record['uid']);

                if (
                    $contentElement instanceof Content &&
                    method_exists($contentElement, 'getIntImage' . $imageCount . 'Current') &&
                    $contentElement->{'getIntImage' . $imageCount . 'Current'}()
                ) {

                    $imageObj = $contentElement->{'getIntImage' . $imageCount . 'Current'}();

                    if ($imageObj instanceof FileReference) {
                        $image = $imageService->getImage(
                            '/' . $imageObj->getOriginalResource()->getPublicUrl(),
                            null,
                            false
                        );

                        $processedImage = $imageService->applyProcessingInstructions(
                            $image,
                            [
                                'maxWidth'  => '300',
                                'maxHeight' => '200',
                            ]
                        );
                        $itemContent    .= $this->wrapLink(
                            $item,
                            $this->wrapImage($imageService->getImageUri($processedImage))
                        );
                    }
                }
            }
        }

        $contentRepository = GeneralUtility::makeInstance(ContentRepository::class);

        $irreItems = [];


        $irreItems[] = $this->buildIrreCe(
            $record,
            $contentRepository,
            'int_irre_accordion',
            'tx_intbuilder_domain_model_irre_accordion',
            \Int\Intbuilder\Domain\Model\Irre\Accordion::class
        );
        $irreItems[] = $this->buildIrreCe(
            $record,
            $contentRepository,
            'int_irre_tabs',
            'tx_intbuilder_domain_model_irre_tabs',
            \Int\Intbuilder\Domain\Model\Irre\Tabs::class
        );
        $irreItems[] = $this->buildIrreCe(
            $record,
            $contentRepository,
            'int_irre_heroslider',
            'tx_intbuilder_domain_model_irre_heroslider',
            \Int\Intbuilder\Domain\Model\Irre\HeroSlider::class
        );
        $irreItems[] = $this->buildIrreCe(
            $record,
            $contentRepository,
            'int_irre_teaserbox',
            'tx_intbuilder_domain_model_irre_teaserbox',
            \Int\Intbuilder\Domain\Model\Irre\TeaserBox::class
        );
        $irreItems[] = $this->buildIrreCe(
            $record,
            $contentRepository,
            'int_irre_teaserboxicon',
            'tx_intbuilder_domain_model_irre_teaserboxicon',
            \Int\Intbuilder\Domain\Model\Irre\TeaserBoxIcon::class
        );
        $irreItems[] = $this->buildIrreCe(
            $record,
            $contentRepository,
            'int_irre_teaserboximage',
            'tx_intbuilder_domain_model_irre_teaserboximage',
            \Int\Intbuilder\Domain\Model\Irre\TeaserBoxImage::class
        );
        $irreItems[] = $this->buildIrreCe(
            $record,
            $contentRepository,
            'int_irre_download',
            'tx_intbuilder_domain_model_irre_download',
            \Int\Intbuilder\Domain\Model\Irre\Download::class
        );
        $irreItems[] = $this->buildIrreCe(
            $record,
            $contentRepository,
            'int_irre_usp',
            'tx_intbuilder_domain_model_irre_usp',
            \Int\Intbuilder\Domain\Model\Irre\Usp::class
        );
        $irreItems[] = $this->buildIrreCe(
            $record,
            $contentRepository,
            'int_irre_boxteaser',
            'tx_intbuilder_domain_model_irre_boxteaser',
            \Int\Intbuilder\Domain\Model\Irre\BoxTeaser::class
        );
        $irreItems[] = $this->buildIrreCe(
            $record,
            $contentRepository,
            'int_irre_teasersliderbox',
            'tx_intbuilder_domain_model_irre_teasersliderbox',
            \Int\Intbuilder\Domain\Model\Irre\TeaserSliderBox::class
        );
        $irreItems[] = $this->buildIrreCe(
            $record,
            $contentRepository,
            'int_irre_teasersliderimage',
            'tx_intbuilder_domain_model_irre_teasersliderimage',
            \Int\Intbuilder\Domain\Model\Irre\TeaserSliderImage::class
        );

        if ($irreItems) {
            $itemContent .= '<div class="intbuilder-ce-irre-container">' . implode('', $irreItems) . '</div>';
        }

        $itemContent .= '</div>';

        return $itemContent;
    }

    /**
     * Dedicated method for wrapping a preview header and body HTML.
     *
     * @param string         $previewHeader
     * @param string         $previewContent
     * @param GridColumnItem $item
     *
     * @return string
     */
    public function wrapPageModulePreview($previewHeader, $previewContent, GridColumnItem $item): string
    {
        return $previewHeader . $previewContent;
    }

    public function wrapLink(GridColumnItem $item, string $content): string
    {
        return '<a href="' . $item->getEditUrl() . '">' . $content . '</a>';
    }

    public function wrapImage(string $imagePath): string
    {
        return '<p><img src="' . $imagePath . '"/></p>';
    }

    public function buildCe(): array
    {
        $returnArray = [];
        foreach ($this->ce as $singleCeIdentifier) {
            $translation = LocalizationUtility::translate(
                'LLL:EXT:intbuilder/Resources/Private/Language/locallang_content_db.xlf:new_ce.' . $singleCeIdentifier . '.title',
                'intbuilder'
            );
            if (!$translation) {
                $translation = 'Translate: ' . $singleCeIdentifier;
            }
            $returnArray[$singleCeIdentifier] = $translation;
        }
        return $returnArray;
    }

    public function buildIrreCe($record, $contentRepository, $getterName, $table, $model): string
    {
        $returnValue = '';
        if ($record[$getterName]) {
            /** @var Content $contentElement */
            $contentElement = $contentRepository->findByUid($record['uid']);
            $getterNameFull = 'get' . GeneralUtility::underscoredToUpperCamelCase($getterName);
            if (!$contentElement) {
                return $returnValue;
            }
            $irreContents = $contentElement->{$getterNameFull}();
            if (!$irreContents) {
                return $returnValue;
            }

            $dataMapper = GeneralUtility::makeInstance(DataMapper::class);

            foreach ($irreContents as $singleIrreContent) {
                if ($record['sys_language_uid'] > 0) {
                    $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(
                        $table
                    );
                    $queryResult  = $queryBuilder->select('*')
                                                 ->from($table)
                                                 ->where(
                                                     $queryBuilder->expr()->eq(
                                                         'sys_language_uid',
                                                         $record['sys_language_uid']
                                                     )
                                                 )
                                                 ->andWhere(
                                                     $queryBuilder->expr()->eq(
                                                         'l10n_parent',
                                                         $singleIrreContent->getUid()
                                                     )
                                                 )
                                                 ->execute()
                                                 ->fetchAllAssociative();

                    $singleIrreContentArray = $dataMapper->map($model, $queryResult);
                    $singleIrreContent      = $singleIrreContentArray[0];
                }
                $irreContent = '';
                if (!($singleIrreContent instanceof $model)) {
                    continue;
                }
                if (method_exists($singleIrreContent, 'getCurrentImage') && $singleIrreContent->getCurrentImage()) {
                    $imageService = GeneralUtility::makeInstance(ImageService::class);
                    $imageObj     = $singleIrreContent->getCurrentImage();
                    if ($imageObj instanceof FileReference) {
                        $image          = $imageService->getImage(
                            '/' . $imageObj->getOriginalResource()->getPublicUrl(),
                            null,
                            false
                        );
                        $processedImage = $imageService->applyProcessingInstructions(
                            $image,
                            [
                                'width'  => '200c',
                                'height' => '100c',
                            ]
                        );
                        $irreContent    .= '<img class="intbuilder-ce-irre-item--image" src="' . $imageService->getImageUri(
                                $processedImage
                            ) . '"/><br /><br />';
                    }
                }
                if (method_exists($singleIrreContent, 'getCurrentIcon') && $singleIrreContent->getCurrentIcon()) {
                    $imageService = GeneralUtility::makeInstance(ImageService::class);
                    $imageObj     = $singleIrreContent->getCurrentIcon();
                    if ($imageObj instanceof FileReference) {
                        $image          = $imageService->getImage(
                            '/' . $imageObj->getOriginalResource()->getPublicUrl(),
                            null,
                            false
                        );
                        $processedImage = $imageService->applyProcessingInstructions(
                            $image,
                            [
                                'width'  => '200c',
                                'height' => '100c',
                            ]
                        );
                        $irreContent    .= '<img class="intbuilder-ce-irre-item--icon" src="' . $imageService->getImageUri(
                                $processedImage
                            ) . '"/><br /><br />';
                    }
                }
                if ($singleIrreContent->getHeader()) {
                    $irreContent .= '<h4>' . $singleIrreContent->getHeader() . '</h4>';
                }
                if (method_exists($singleIrreContent, 'getText') && $singleIrreContent->getText()) {
                    $irreContent .= substr(strip_tags($singleIrreContent->getText()), 0, 200) . ' …';
                } else {
                    if (method_exists($singleIrreContent, 'getHeader2') && $singleIrreContent->getHeader2()) {
                        $irreContent .= substr(strip_tags($singleIrreContent->getHeader2()), 0, 200) . ' …';
                    } else {
                        if (method_exists($singleIrreContent, 'getSubheader1') && $singleIrreContent->getSubheader1()) {
                            $irreContent .= substr(strip_tags($singleIrreContent->getSubheader1()), 0, 200) . ' …';
                        } else {
                            if (method_exists($singleIrreContent, 'getSubheader2') && $singleIrreContent->getSubheader2(
                                )) {
                                $irreContent .= substr(strip_tags($singleIrreContent->getSubheader2()), 0, 200) . ' …';
                            }
                        }
                    }
                }


                if ($irreContent) {
                    $returnValue .= '<div class="intbuilder-ce-irre-item">' . $irreContent . '</div>';
                }
            }
        }
        return $returnValue;
    }
}

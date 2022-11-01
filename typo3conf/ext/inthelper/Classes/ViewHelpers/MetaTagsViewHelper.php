<?php
/**
 *
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

namespace Int\Inthelper\ViewHelpers;

use Int\Intbuilder\Domain\Model\PagesNav;
use Int\Intbuilder\Domain\Repository\PagesNavRepository;
use Int\Inthelper\Helper\SlackHelper;
use Int\Inthelper\Utility\FileUtility;
use InvalidArgumentException;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Int\Intbuilder\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Adds Meta Tags
 */
class MetaTagsViewHelper extends AbstractViewHelper
{


    protected array $titleTags = [ 'title', 'og:title', 'twitter:title' ];

    protected array $descriptionTags = [ 'description', 'og:description', 'twitter:description' ];
    protected array $urlTags = [ 'url', 'og:url', 'twitter:domain' ];
    protected array $baseNameTags = [ 'og:site_name', 'twitter:site' ];
    protected array $imageTags = [ 'og:image', 'twitter:image' ];


    /**
     * Initialize arguments
     *
     * @return void
     * @api
     *
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('title', 'link', 'Title', true);
        $this->registerArgument('description', 'string', 'Description', false);
        $this->registerArgument('uri', 'string', 'URI', false);
        $this->registerArgument('image', 'mixed', 'File', false);
    }

    /**
     *
     * @throws \JsonException
     * @throws \TYPO3\CMS\Core\Exception\SiteNotFoundException
     * @throws \TYPO3\CMS\Core\Resource\Exception\InvalidFileException
     */
    public function render(): void
    {
        // Validate arguments
        foreach ($this->argumentDefinitions as $singleArgumentDefinition) {
            if (
                $singleArgumentDefinition->isRequired() &&
                empty($this->arguments[$singleArgumentDefinition->getName()])
            ) {
                return;
            }
        }

        // Get Content Object for cropping
        $contentObject = GeneralUtility::makeInstance(ContentObjectRenderer::class);
        // Get Meta Tag registry
        $metaTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class);

        // Get arguments
        $title = $contentObject->crop(strip_tags($this->arguments['title']), 70 . '| … |' . true);

        $description = '';
        if ($this->arguments['description']) {
            $description = $contentObject->crop(
                strip_tags(html_entity_decode($this->arguments['description'])),
                200 . '| … |' . true
            );
        }
        $file = $this->arguments['image'];
        $uri  = $this->arguments['uri'];

        if (empty($uri)) {
            $uri = GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL');
        }

        // Everything's fine, let's set the meta tags where needed

        // Set Main title field
        $GLOBALS['TSFE']->page['title'] = $title;

        // Set SM title fields
        foreach ($this->titleTags as $singleTitleTag) {
            $metaTagManager->getManagerForProperty($singleTitleTag)
                           ->addProperty($singleTitleTag, $title);
        }

        // Set SM Description Tags
        foreach ($this->descriptionTags as $singleDescriptionTag) {
            $metaTagManager->getManagerForProperty($singleDescriptionTag)
                           ->addProperty($singleDescriptionTag, $description);
        }

        // Set URL Tags
        if ($uri) {
            foreach ($this->urlTags as $singleUrlTag) {
                $metaTagManager->getManagerForProperty($singleUrlTag)
                               ->addProperty($singleUrlTag, $uri);
            }
        }

        // Set Site name Tags, get the rootpage first
        $rootPage = GeneralUtility::makeInstance(PagesNavRepository::class)
                                  ->findByUid(
                                      GeneralUtility::makeInstance(SiteFinder::class)
                                                    ->getSiteByPageId((int)$GLOBALS['TSFE']->id)
                                                    ->getRootPageId()
                                  );
        // Root page exists, so add the Rootpage Title as Sitename
        if ($rootPage instanceof PagesNav) {
            foreach ($this->baseNameTags as $singleBaseNameTag) {
                $metaTagManager->getManagerForProperty($singleBaseNameTag)
                               ->addProperty($singleBaseNameTag, $rootPage->getTitle());
            }
        }

        // $file must be absolute, so check if file exists
        if (!empty($file)) {
            $filePath = false;

            if (is_string($file)) {
                $filePath = $file;
            }
            if (($file instanceof FileReference)) {
                $filePath = $file->getOriginalResource()->getPublicUrl();
            }

            if (!($filePath && FileUtility::validateAbsoluteFile($filePath))) {
                SlackHelper::notifySlackChannel(
                    'Missing file "' . $filePath . '" for MetaTags',
                    'Missing file "' . $filePath . '" for Meta Tags ViewHelper',
                    [
                        'FILE: ' . __FILE__ . ':' . __LINE__,
                    ],
                    SlackHelper::LOGTYPE_ERROR
                );
            } else {
                $siteConfig = $GLOBALS['TYPO3_REQUEST']->getAttribute('site')->getConfiguration();

                // Set Image Tags if existing
                foreach ($this->imageTags as $singleImageTag) {
                    $metaTagManager->getManagerForProperty($singleImageTag)
                                   ->addProperty($singleImageTag, $siteConfig['base'] . ltrim($filePath, '/'));
                }
            }

        }

    }

}

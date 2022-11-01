<?php

namespace Int\Inthelper\Controller;


use Int\Intbuilder\Domain\Model\Content;
use Int\Intbuilder\Domain\Repository\ContentRepository;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/***
 *
 * This file is part of the "Inthelper" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Intention Digital
 *
 ***/

/**
 * AbstractController
 */
class AbstractController extends ActionController
{
    /**
     * contentRepository
     *
     * @var \Int\Intbuilder\Domain\Repository\ContentRepository|null
     */
    protected ?ContentRepository $contentRepository = null;

    /**
     * contentObject
     *
     * @var \Int\Intbuilder\Domain\Model\Content|null
     */
    protected ?Content $contentObject = null;

    /**
     * ConfigurationManager
     *
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager|null
     */
    protected $configurationManager = null;

    /**
     * ContentProcessor constructor
     *
     * @param \Int\Intbuilder\Domain\Repository\ContentRepository   $contentRepository
     * @param \Int\Intbuilder\Domain\Model\Content                  $contentObject
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManager $configurationManager
     */
    public function __construct(
        ContentRepository $contentRepository,
        Content $contentObject,
        ConfigurationManager $configurationManager
    ) {
        $this->configurationManager = $configurationManager;
        $this->contentRepository    = $contentRepository;
        $this->contentObject        = $contentObject;

        $contentObjectRaw = $this->configurationManager->getContentObject();
        if ($contentObjectRaw instanceof ContentObjectRenderer) {
            $this->contentObject = $this->contentRepository->findByUid($contentObjectRaw->data['uid']);
        }
    }
}

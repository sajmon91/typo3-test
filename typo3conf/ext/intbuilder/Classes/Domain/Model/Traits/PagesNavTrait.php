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

namespace Int\Intbuilder\Domain\Model\Traits;


use Int\Intbuilder\Domain\Model\Pages;
use Int\Intbuilder\Domain\Model\PagesNav;
use Int\Intbuilder\Domain\Model\RootPage;
use Int\Intbuilder\Domain\Repository\PagesNavRepository;
use Int\Intbuilder\Domain\Repository\RootPageRepository;
use TYPO3\CMS\Core\Resource\FileReference;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * This model represents a Nav Page trait
 */
trait PagesNavTrait
{

    /**
     * @var string
     */
    protected string $title = '';

    /**
     * @var string
     */
    protected string $navTitle = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\PagesNav>|null
     */
    protected ?ObjectStorage $children = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\RootPage|null
     */
    protected ?RootPage $root = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\PagesNav|null
     */
    protected ?PagesNav $first = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\PagesNav|null
     */
    protected ?PagesNav $parent = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intImage1 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intFooterTeaser = null;

    /**
     * intFooterTeaserTitle
     *
     * @var string
     *
     */
    protected string $intFooterTeaserTitle = '';

    /**
     * backendLayout
     *
     * @var string
     *
     */
    protected string $backendLayout = '';

    /**
     * @var bool
     */
    protected bool $intNew = false;

    /**
     * @return int
     */
    public function getUid(): ?int
    {
        return $this->uid;
    }

    /**
     * @param int $uid
     *
     * @return self
     */
    public function setUid(int $uid): self
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getNavTitle(): ?string
    {
        if ($this->navTitle === '') {
            return $this->title;
        }
        return $this->navTitle;
    }

    /**
     * @param string $navTitle
     *
     * @return self
     */
    public function setNavTitle(string $navTitle): self
    {
        $this->navTitle = $navTitle;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getChildren(): ?ObjectStorage
    {
        return $this->children;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $children
     *
     * @return self
     */
    public function setChildren(ObjectStorage $children): self
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\RootPage
     */
    public function getRoot(): ?RootPage
    {
        return GeneralUtility::makeInstance(RootPageRepository::class)->findByUid($GLOBALS['TSFE']->rootLine[0]['uid']);
    }

    /**
     * @param \Int\Intbuilder\Domain\Model\RootPage $root
     *
     * @return self
     */
    public function setRoot(RootPage $root): self
    {
        $this->root = $root;
        return $this;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\RootPage
     */
    public function getFirst(): ?RootPage
    {
        return GeneralUtility::makeInstance(RootPageRepository::class)->findByUid($GLOBALS['TSFE']->rootLine[1]['uid']);
    }

    /**
     * @param \Int\Intbuilder\Domain\Model\PagesNav $first
     *
     * @return self
     */
    public function setFirst(PagesNav $first): self
    {
        $this->first = $first;
        return $this;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\PagesNav
     */
    public function getParent(): ?PagesNav
    {
        return GeneralUtility::makeInstance(PagesNavRepository::class)->findByUid($this->getPid());

    }

    /**
     * @param \Int\Intbuilder\Domain\Model\PagesNav $parent
     *
     * @return self
     */
    public function setParent(PagesNav $parent): self
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackendLayout(): string
    {
        return $this->backendLayout;
    }

    /**
     * @param string $backendLayout
     *
     * @return self
     */
    public function setBackendLayout(string $backendLayout): self
    {
        $this->backendLayout = $backendLayout;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIntNew(): bool
    {
        return $this->intNew;
    }

    /**
     * @param bool $intNew
     *
     * @return self
     */
    public function setIntNew(bool $intNew): self
    {
        $this->intNew = $intNew;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntImage1(): ?ObjectStorage
    {
        return $this->intImage1;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intImage1
     *
     * @return self
     */
    public function setIntImage1(?ObjectStorage $intImage1): self
    {
        $this->intImage1 = $intImage1;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntFooterTeaser(): ?ObjectStorage
    {
        return $this->intFooterTeaser;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intFooterTeaser
     *
     * @return self
     */
    public function setIntFooterTeaser(?ObjectStorage $intFooterTeaser): self
    {
        $this->intFooterTeaser = $intFooterTeaser;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntFooterTeaserTitle(): string
    {
        return $this->intFooterTeaserTitle;
    }

    /**
     * @param string $intFooterTeaserTitle
     *
     * @return self
     */
    public function setIntFooterTeaserTitle(string $intFooterTeaserTitle): self
    {
        $this->intFooterTeaserTitle = $intFooterTeaserTitle;
        return $this;
    }
}

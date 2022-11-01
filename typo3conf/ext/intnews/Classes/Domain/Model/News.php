<?php

declare(strict_types=1);

namespace Int\Intnews\Domain\Model;


use Int\Inthelper\Service\CategoryService;
use Int\Intbuilder\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * This file is part of the "intnews" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 */

/**
 * News
 */
class News extends AbstractEntity
{

    /**
     * oid
     *
     * @var string
     */
    protected string $oid = '';

    /**
     * name
     *
     * @var string
     */
    protected string $name = '';

    /**
     * subheader
     *
     * @var string
     */
    protected string $subheader = '';

    /**
     * eventDuration
     *
     * @var string
     */
    protected string $eventDuration = '';

    /**
     * eventLocation
     *
     * @var string
     */
    protected string $eventLocation = '';

    /**
     * eventLink
     *
     * @var string
     */
    protected string $eventLink = '';

    /**
     * eventHall
     *
     * @var string
     */
    protected string $eventHall = '';

    /**
     * eventBooth
     *
     * @var string
     */
    protected string $eventBooth = '';

    /**
     * eventAddress
     *
     * @var string
     */
    protected string $eventAddress = '';

    /**
     * descriptionShort
     *
     * @var string
     */
    protected string $descriptionShort = '';

    /**
     * description
     *
     * @var string
     */
    protected string $description = '';

    /**
     * newsDate
     *
     * @var \DateTime|null
     */
    protected ?\DateTime $newsDate = null;

    /**
     * hideOriginalLanguage
     *
     * @var bool
     */
    protected bool $hideOriginalLanguage = false;

    /**
     * listImage
     *
     * @var  \Int\Intbuilder\Domain\Model\FileReference|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?FileReference $listImage = null;

    /**
     * headerImage
     *
     * @var  \Int\Intbuilder\Domain\Model\FileReference|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?FileReference $headerImage = null;

    /**
     * categories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Category>|null
     */
    protected ?ObjectStorage $categories = null;

    /**
     * authors
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Author>|null
     */
    protected ?ObjectStorage $authors = null;

    /**
     * contents
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Content>|null
     */
    protected ?ObjectStorage $contents = null;

    /**
     * files
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $files = null;

    /**
     * newsType
     *
     * @var int
     */
    protected int $newsType = 0;

    /**
     * newsDataFilter
     *
     * @var string
     */
    protected string $newsDataFilter = '';

    /**
     * __construct
     */
    public function __construct()
    {
        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->authors    = $this->authors ?: new ObjectStorage();
        $this->contents   = $this->contents ?: new ObjectStorage();
        $this->categories = $this->categories ?: new ObjectStorage();
    }

    /**
     * @return string
     */
    public function getOid(): string
    {
        return $this->oid;
    }

    /**
     * @param string $oid
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setOid(string $oid): self
    {
        $this->oid = $oid;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubheader(): string
    {
        return $this->subheader;
    }

    /**
     * @param string $subheader
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setSubheader(string $subheader): self
    {
        $this->subheader = $subheader;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventDuration(): string
    {
        return $this->eventDuration;
    }

    /**
     * @param string $eventDuration
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setEventDuration(string $eventDuration): self
    {
        $this->eventDuration = $eventDuration;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventLocation(): string
    {
        return $this->eventLocation;
    }

    /**
     * @param string $eventLocation
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setEventLocation(string $eventLocation): self
    {
        $this->eventLocation = $eventLocation;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventLink(): string
    {
        return $this->eventLink;
    }

    /**
     * @param string $eventLink
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setEventLink(string $eventLink): self
    {
        $this->eventLink = $eventLink;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventHall(): string
    {
        return $this->eventHall;
    }

    /**
     * @param string $eventHall
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setEventHall(string $eventHall): self
    {
        $this->eventHall = $eventHall;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventBooth(): string
    {
        return $this->eventBooth;
    }

    /**
     * @param string $eventBooth
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setEventBooth(string $eventBooth): self
    {
        $this->eventBooth = $eventBooth;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventAddress(): string
    {
        return $this->eventAddress;
    }

    /**
     * @param string $eventAddress
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setEventAddress(string $eventAddress): self
    {
        $this->eventAddress = $eventAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionShort(): string
    {
        return $this->descriptionShort;
    }

    /**
     * @param string $descriptionShort
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setDescriptionShort(string $descriptionShort): self
    {
        $this->descriptionShort = $descriptionShort;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return  \Int\Intbuilder\Domain\Model\FileReference
     */
    public function getListImage(): ?FileReference
    {
        return $this->listImage;
    }

    /**
     * @param  \Int\Intbuilder\Domain\Model\FileReference|null $listImage
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setListImage(?FileReference $listImage): self
    {
        $this->listImage = $listImage;
        return $this;
    }

    /**
     * @return  \Int\Intbuilder\Domain\Model\FileReference
     */
    public function getHeaderImage(): ?FileReference
    {
        if ($this->headerImage) {
            return $this->headerImage;
        }
        return $this->listImage;
    }

    /**
     * @param  \Int\Intbuilder\Domain\Model\FileReference|null $headerImage
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setHeaderImage(?FileReference $headerImage): self
    {
        $this->headerImage = $headerImage;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getFiles(): ?ObjectStorage
    {
        return $this->files;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $files
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setFiles(?ObjectStorage $files): self
    {
        $this->files = $files;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getProperties(): ?ObjectStorage
    {
        return $this->properties;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $properties
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setProperties(?ObjectStorage $properties): self
    {
        $this->properties = $properties;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getCategories(): ?ObjectStorage
    {
        return $this->categories;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $categories
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setCategories(?ObjectStorage $categories): self
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getAuthors(): ?ObjectStorage
    {
        return $this->authors;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $authors
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setAuthors(?ObjectStorage $authors): self
    {
        $this->authors = $authors;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getContents(): ?ObjectStorage
    {
        return $this->contents;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $contents
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setContents(?ObjectStorage $contents): self
    {
        $this->contents = $contents;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getNewsDate(): ?\DateTime
    {
        return $this->newsDate;
    }

    /**
     * @param \DateTime|null $newsDate
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setNewsDate(?\DateTime $newsDate): self
    {
        $this->newsDate = $newsDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getNewsType(): int
    {
        return $this->newsType;
    }

    /**
     * @param int $newsType
     */
    public function setNewsType(int $newsType): void
    {
        $this->newsType = $newsType;
    }

    /**
     * @return string
     */
    public function getNewsDataFilter(): string
    {
        return CategoryService::createCategoryContainerTags($this->categories);
    }

    /**
     * @return bool
     */
    public function isHideOriginalLanguage(): bool
    {
        return $this->hideOriginalLanguage;
    }

    /**
     * @param bool $hideOriginalLanguage
     *
     * @return \Int\Intnews\Domain\Model\News
     */
    public function setHideOriginalLanguage(bool $hideOriginalLanguage): self
    {
        $this->hideOriginalLanguage = $hideOriginalLanguage;
        return $this;
    }
}

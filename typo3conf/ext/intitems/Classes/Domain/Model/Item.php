<?php

declare(strict_types=1);

namespace Int\Intitems\Domain\Model;


use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * This file is part of the "intitems" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 */

/**
 * Item
 */
class Item extends AbstractEntity
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
     * listImage
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?FileReference $listImage = null;

    /**
     * headerImage
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?FileReference $headerImage = null;

    /**
     * images
     *
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?ObjectStorage $images = null;

    /**
     * files1
     *
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?ObjectStorage $files1 = null;

    /**
     * files2
     *
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?ObjectStorage $files2 = null;

    /**
     * files3
     *
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?ObjectStorage $files3 = null;

    /**
     * properties
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intitems\Domain\Model\ItemProperty>|null
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ?ObjectStorage $properties = null;

    /**
     * categories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Category>|null
     */
    protected ?ObjectStorage $categories = null;

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
        $this->properties = $this->properties ?: new ObjectStorage();
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
     */
    public function setOid(string $oid): void
    {
        $this->oid = $oid;
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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     */
    public function setDescriptionShort(string $descriptionShort): void
    {
        $this->descriptionShort = $descriptionShort;
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
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getListImage(): ?FileReference
    {
        return $this->listImage;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference|null $listImage
     */
    public function setListImage(?FileReference $listImage): void
    {
        $this->listImage = $listImage;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getHeaderImage(): ?FileReference
    {
        return $this->headerImage;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference|null $headerImage
     */
    public function setHeaderImage(?FileReference $headerImage): void
    {
        $this->headerImage = $headerImage;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getImages(): ?ObjectStorage
    {
        return $this->images;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $images
     */
    public function setImages(?ObjectStorage $images): void
    {
        $this->images = $images;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getFiles1(): ?ObjectStorage
    {
        return $this->files1;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $files1
     */
    public function setFiles1(?ObjectStorage $files1): void
    {
        $this->files1 = $files1;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getFiles2(): ?ObjectStorage
    {
        return $this->files2;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $files2
     */
    public function setFiles2(?ObjectStorage $files2): void
    {
        $this->files2 = $files2;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getFiles3(): ?ObjectStorage
    {
        return $this->files3;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $files3
     */
    public function setFiles3(?ObjectStorage $files3): void
    {
        $this->files3 = $files3;
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
     */
    public function setProperties(?ObjectStorage $properties): void
    {
        $this->properties = $properties;
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
     */
    public function setCategories(?ObjectStorage $categories): void
    {
        $this->categories = $categories;
    }
}

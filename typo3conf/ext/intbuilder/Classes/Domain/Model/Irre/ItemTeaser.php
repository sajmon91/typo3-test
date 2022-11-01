<?php
/**
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

namespace Int\Intbuilder\Domain\Model\Irre;


use Int\Intbuilder\Domain\Model\FileReference;
use Int\Intbuilder\Domain\Model\Irre\Traits\HeaderTrait;
use Int\Intbuilder\Domain\Model\Irre\Traits\LinkTrait;
use Int\Intbuilder\Domain\Model\Irre\Traits\TextTrait;
use Int\Inthelper\Service\CategoryService;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * This model represents a ItemTeaser Irre
 */
class ItemTeaser extends AbstractEntity
{
    use HeaderTrait;
    use TextTrait;
    use LinkTrait;

    /**
     * @var string
     */
    protected string $subheader = '';

    /**
     * @var int
     */
    protected int $itemType = 0;

    /**
     * @var int
     */
    protected int $itemPriority = 0;

    /**
     * @var string
     */
    protected string $backgroundColor = '';

    /**
     * @var \DateTime|null
     */
    protected ?\DateTime $itemDate = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Category>|null
     */
    protected ?ObjectStorage $tags = null;

    /**
     * @var FileReference|null
     */
    protected ?FileReference $image1 = null;

    /**
     * @var FileReference|null
     */
    protected ?FileReference $image2 = null;

    /**
     * @var FileReference|null
     */
    protected ?FileReference $image3 = null;

    /**
     * @var FileReference|null
     */
    protected ?FileReference $logo = null;

    /**
     * @var bool
     */
    protected bool $greyOverlay = false;

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
     * @return self
     */
    public function setSubheader(string $subheader): self
    {
        $this->subheader = $subheader;
        return $this;
    }

    /**
     * @return int
     */
    public function getItemType(): int
    {
        return $this->itemType;
    }

    /**
     * @param int $itemType
     *
     * @return self
     */
    public function setItemType(int $itemType): self
    {
        $this->itemType = $itemType;
        return $this;
    }

    /**
     * @return int
     */
    public function getItemPriority(): int
    {
        return $this->itemPriority;
    }

    /**
     * @param int $itemPriority
     *
     * @return self
     */
    public function setItemPriority(int $itemPriority): self
    {
        $this->itemPriority = $itemPriority;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     *
     * @return self
     */
    public function setBackgroundColor(string $backgroundColor): self
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getItemDate(): \DateTime
    {
        return $this->itemDate;
    }

    /**
     * @param \DateTime $itemDate
     *
     * @return self
     */
    public function setItemDate(\DateTime $itemDate): self
    {
        $this->itemDate = $itemDate;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getTags(): ?ObjectStorage
    {
        return $this->tags;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $tags
     *
     * @return \Int\Intbuilder\Domain\Model\Irre\ItemTeaser
     */
    public function setTags(?ObjectStorage $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference|null
     */
    public function getImage1(): ?FileReference
    {
        return $this->image1;
    }

    /**
     * @param FileReference $image1
     *
     * @return self
     */
    public function setImage1(FileReference $image1): self
    {
        $this->image1 = $image1;
        return $this;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference|null
     */
    public function getImage2(): ?FileReference
    {
        return $this->image2;
    }

    /**
     * @param FileReference $image2
     *
     * @return self
     */
    public function setImage2(FileReference $image2): self
    {
        $this->image2 = $image2;
        return $this;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference|null
     */
    public function getImage3(): ?FileReference
    {
        return $this->image3;
    }

    /**
     * @param FileReference $image3
     *
     * @return self
     */
    public function setImage3(FileReference $image3): self
    {
        $this->image3 = $image3;
        return $this;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference|null
     */
    public function getLogo(): ?FileReference
    {
        return $this->logo;
    }

    /**
     * @param FileReference $logo
     *
     * @return self
     */
    public function setLogo(FileReference $logo): self
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntIrreItemteaserFilterCategories(): string
    {
        return CategoryService::createCategoryContainerTags($this->getTags());
    }

    /**
     * @return bool
     */
    public function isGreyOverlay(): bool
    {
        return $this->greyOverlay;
    }

    /**
     * @param bool $greyOverlay
     */
    public function setGreyOverlay(bool $greyOverlay): self
    {
        $this->greyOverlay = $greyOverlay;
        return $this;
    }


}
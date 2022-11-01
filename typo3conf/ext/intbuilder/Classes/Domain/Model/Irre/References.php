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
 * This model represents a References Irre
 */
class References extends AbstractEntity
{
    use HeaderTrait;
    use TextTrait;
    use LinkTrait;

    /**
     * @var string
     */
    protected string $subheader = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Category>|null
     */
    protected ?ObjectStorage $tags = null;

    /**
     * @var FileReference|null
     */
    protected ?FileReference $image = null;

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
     */
    public function setSubheader(string $subheader): self
    {
        $this->subheader = $subheader;
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
     */
    public function setTags(?ObjectStorage $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference|null
     */
    public function getImage(): ?FileReference
    {
        return $this->image;
    }

    /**
     * @param \Int\Intbuilder\Domain\Model\FileReference|null $image
     */
    public function setImage(?FileReference $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntIrreReferencesFilterCategories(): string
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
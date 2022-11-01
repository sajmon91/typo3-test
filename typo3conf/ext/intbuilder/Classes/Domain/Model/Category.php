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

namespace Int\Intbuilder\Domain\Model;

use Int\Inthelper\Service\CategoryService;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * This model represents a category
 */
class Category extends AbstractEntity
{

    /**
     * @var string
     */
    protected string $oid = '';

    /**
     * @var string
     */
    protected string $name = '';

    /**
     * @var integer
     */
    protected int $type = 0;

    /**
     * @var bool
     */
    protected bool $showInList = false;

    /**
     * @var bool
     */
    protected bool $showInFilter = false;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Category>|null
     */
    protected ?ObjectStorage $childCategories = null;

    /**
     * categoryDataTrigger
     *
     * @var string
     */
    protected string $categoryDataTrigger = '';

    /**
     * @return string
     */
    public function getOid(): ?string
    {
        return $this->oid;
    }

    /**
     * @param string $oid
     *
     * @return self
     */
    public function setOid(string $oid): self
    {
        $this->oid = $oid;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int $type
     *
     * @return self
     */
    public function setType(int $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShowInFilter(): bool
    {
        return $this->showInFilter;
    }

    /**
     * @param bool $showInFilter
     *
     * @return \Int\Intbuilder\Domain\Model\Category
     */
    public function setShowInFilter(bool $showInFilter): self
    {
        $this->showInFilter = $showInFilter;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShowInList(): bool
    {
        return $this->showInList;
    }

    /**
     * @param bool $showInList
     *
     * @return \Int\Intbuilder\Domain\Model\Category
     */
    public function setShowInList(bool $showInList): self
    {
        $this->showInList = $showInList;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getChildCategories(): ?ObjectStorage
    {
        return $this->childCategories;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $childCategories
     *
     * @return self
     */
    public function setChildCategories(ObjectStorage $childCategories): self
    {
        $this->childCategories = $childCategories;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategoryDataTrigger(): string
    {
        return CategoryService::createCategoryTriggerTag($this);
    }

}

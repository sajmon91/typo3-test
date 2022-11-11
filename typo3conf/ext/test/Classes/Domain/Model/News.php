<?php

declare(strict_types=1);

namespace Sajmon\Test\Domain\Model;

use phpDocumentor\Reflection\Types\Integer;

/**
 * This file is part of the "test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * News
 */
class News extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = null;

    /**
     * description
     *
     * @var string
     */
    protected $description = null;

    /**
     * categories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sajmon\Test\Domain\Model\NewsCategory>
     */
    protected $categories = null;

    /**
     * img
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $img = null;

     /**
     * important news
     *
     * @var integer
     */
    protected $important = null;

    /**
     * News date
     *
     * @var \DateTime|null
     */
    protected $newsdate = null;


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
        $this->categories = $this->categories ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Adds a NewsCategory
     *
     * @param \Sajmon\Test\Domain\Model\NewsCategory $category
     * @return void
     */
    public function addCategory(\Sajmon\Test\Domain\Model\NewsCategory $category)
    {
        $this->categories->attach($category);
    }

    /**
     * Removes a NewsCategory
     *
     * @param \Sajmon\Test\Domain\Model\NewsCategory $categoryToRemove The NewsCategory to be removed
     * @return void
     */
    public function removeCategory(\Sajmon\Test\Domain\Model\NewsCategory $categoryToRemove)
    {
        $this->categories->detach($categoryToRemove);
    }

    /**
     * Returns the categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sajmon\Test\Domain\Model\NewsCategory>
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Sets the categories
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sajmon\Test\Domain\Model\NewsCategory> $categories
     * @return void
     */
    public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Returns the img
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Sets the img
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $img
     * @return void
     */
    public function setImg(\TYPO3\CMS\Extbase\Domain\Model\FileReference $img)
    {
        $this->img = $img;
    }

    /**
     * Returns the important news
     *
     * @return integer
     */
    public function getImportant()
    {
        return $this->important;
    }

    /**
     * Sets the important news
     *
     * @param integer $important
     * @return void
     */
    public function setImportant(Integer $important)
    {
        $this->important = $important;
    }

     /**
     * Returns the news date
     *
     * @return \DateTime
     */
    public function getNewsdate()
    {
        return $this->newsdate;
    }

    /**
     * Sets the news date
     *
     * @param \DateTime|null $newsdate
     * @return void
     */
    public function setNewsdate(?\DateTime $newsdate)
    {
        $this->newsdate = $newsdate;
    }

}

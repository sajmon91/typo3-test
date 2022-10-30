<?php

declare(strict_types=1);

namespace Sajmon\Test\Domain\Model;


/**
 * This file is part of the "test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * NewsCategory
 */
class NewsCategory extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = null;

    /**
     * news
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sajmon\Test\Domain\Model\News>
     */
    protected $news = null;

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
        $this->news = $this->news ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Adds a News
     *
     * @param \Sajmon\Test\Domain\Model\News $news
     * @return void
     */
    public function addNews(\Sajmon\Test\Domain\Model\News $news)
    {
        $this->news->attach($news);
    }

    /**
     * Removes a News
     *
     * @param \Sajmon\Test\Domain\Model\News $newsToRemove The News to be removed
     * @return void
     */
    public function removeNews(\Sajmon\Test\Domain\Model\News $newsToRemove)
    {
        $this->news->detach($newsToRemove);
    }

    /**
     * Returns the news
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sajmon\Test\Domain\Model\News>
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Sets the news
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sajmon\Test\Domain\Model\News> $news
     * @return void
     */
    public function setNews(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $news)
    {
        $this->news = $news;
    }
}

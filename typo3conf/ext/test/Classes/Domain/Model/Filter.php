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
 * Filter
 */
class Filter extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
     /**
     * searchWord
     *
     * @var string
     */
    protected $searchWord = '';

   
    /**
     * News date
     *
     * @var string
     */
    protected $fromDate = '';

    /**
     * News to date
     *
     * @var string
     */
    protected  $toDate = '';

    /**
     * important news
     *
     * @var bool
     */
    protected $importantCheck = null;

     /**
     * selectedCategory
     *
     * @var int
     */
    protected $selectedCategory = null;


    /**
     * Returns the searchWord
     *
     * @return string
     */
    public function getSearchWord()
    {
        return $this->searchWord;
    }

    /**
     * Sets the searchWord
     *
     * @param string $searchWord
     * @return void
     */
    public function setSearchWord(string $searchWord)
    {
        $this->searchWord = trim($searchWord);
    }

    /**
     * Get important news
     *
     * @return  bool
     */ 
    public function getImportantCheck()
    {
        return $this->importantCheck;
    }

    /**
     * Set important news
     *
     * @param  bool  $importantCheck  important news
     *
     * @return  void
     */ 
    public function setImportantCheck(bool $importantCheck)
    {
        $this->importantCheck = $importantCheck;
    }


    /**
     * Get selectedCategory
     *
     * @return  int
     */ 
    public function getSelectedCategory()
    {
        return $this->selectedCategory;
    }

    /**
     * Set selectedCategory
     *
     * @param  int  $selectedCategory  selectedCategory
     *
     * @return  self
     */ 
    public function setSelectedCategory(int $selectedCategory)
    {
        $this->selectedCategory = $selectedCategory;

        return $this;
    }

	/**
	 * News date
	 * 
	 * @return string
	 */
	public function getFromDate() 
    {
		return $this->fromDate;
	}
	
	/**
	 * News date
	 * 
	 * @param string $fromDate News date
	 * @return self
	 */
	public function setFromDate(string $fromDate)
    {
		$this->fromDate = trim($fromDate);
		return $this;
	}

	/**
	 * News to date
	 * 
	 * @return string
	 */
	public function getToDate() 
    {
		return $this->toDate;
	}
	
	/**
	 * News to date
	 * 
	 * @param string $toDate News to date
	 * @return self
	 */
	public function setToDate($toDate)
    {
		$this->toDate = trim($toDate);
		return $this;
	}

    public function checkFilter()
    {
        if($this->getSearchWord() || $this->getImportantCheck() || $this->getSelectedCategory() || $this->getFromDate() || $this->getToDate()){
            return true;

        }else{
            return false;
        }
    }
}

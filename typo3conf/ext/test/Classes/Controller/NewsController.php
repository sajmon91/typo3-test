<?php

declare(strict_types=1);

namespace Sajmon\Test\Controller;

use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;


/**
 * This file is part of the "test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * NewsController
 */
class NewsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * newsRepository
     *
     * @var \Sajmon\Test\Domain\Repository\NewsRepository
     */
    protected $newsRepository = null;

    /**
     * categoryRepository
     *
     * @var \Sajmon\Test\Domain\Repository\NewsCategoryRepository
     */
    protected $categoryRepository = null;


    /**
     * @param \Sajmon\Test\Domain\Repository\NewsRepository $newsRepository
     */
    public function injectNewsRepository(\Sajmon\Test\Domain\Repository\NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }


    /**
     * @param \Sajmon\Test\Domain\Repository\NewsCategoryRepository $newsCategoryRepository
     */
    public function injectNewsCategoryRepository(\Sajmon\Test\Domain\Repository\NewsCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }



    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $news = $this->newsRepository->findAll();
        $newsCategories = $this->categoryRepository->findAll();
        // DebuggerUtility::var_dump($newsCategories);


        $this->view->assign('news', $news);
        $this->view->assign('categories', $newsCategories);
        $this->view->assign('filter', GeneralUtility::makeInstance(\Sajmon\Test\Domain\Model\Filter::class));
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Sajmon\Test\Domain\Model\News $news
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Sajmon\Test\Domain\Model\News $news): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('news', $news);
        return $this->htmlResponse();
    }

    /**
     * action search
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function searchAction(?\Sajmon\Test\Domain\Model\Filter $filter)
    {
        // DebuggerUtility::var_dump($filter);

        // $searchValue = trim(GeneralUtility::_POST('searchValue'));
        // $fromDate = trim(GeneralUtility::_POST('fromDate'));
        // $toDate = trim(GeneralUtility::_POST('toDate'));
        // $importantCheck = (int) GeneralUtility::_POST('importantCheck');
        // $selectCategory = (int) GeneralUtility::_POST('selectCategory');

        // if($searchValue || $fromDate || $toDate || $importantCheck || $selectCategory){
        //     $news = $this->newsRepository->findBySearch($searchValue, $fromDate, $toDate, $importantCheck, $selectCategory);

        //     $this->view->assign('news', $news);
        //     return $this->htmlResponse();

        // }else{
        //     // $this->view->assign('news', $news);
        //     return $this->htmlResponse();
        // }
        

        if($filter->checkFilter()){
            $news = $this->newsRepository->findBySearch($filter);

            $this->view->assign('news', $news);
            return $this->htmlResponse();

        }else{
            // $this->view->assign('news', $news);
            return $this->htmlResponse();
        }
        

        // DebuggerUtility::var_dump($data);


        
    }
}

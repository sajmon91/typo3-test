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
     * @param \Sajmon\Test\Domain\Repository\NewsRepository $newsRepository
     */
    public function injectNewsRepository(\Sajmon\Test\Domain\Repository\NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $news = $this->newsRepository->findAll();
        $this->view->assign('news', $news);
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
    public function searchAction(): \Psr\Http\Message\ResponseInterface
    {
        $searchValue = trim(GeneralUtility::_POST('searchValue'));
        $fromDate = trim(GeneralUtility::_POST('fromDate'));
        $toDate = trim(GeneralUtility::_POST('toDate'));
        $importantCheck = (int) GeneralUtility::_POST('importantCheck');
        $selectCategory = (int) GeneralUtility::_POST('selectCategory');
        
        $news = $this->newsRepository->findBySearchWord($searchValue);

        $data = [
            'search' => $searchValue,
            'from' => $fromDate,
            'to' => $toDate,
            'importantCheck' => $importantCheck,
            'selectCategory' => $selectCategory
        ];

        // DebuggerUtility::var_dump(GeneralUtility::_POST());

        DebuggerUtility::var_dump($data);


        $this->view->assign('news', $news);
        return $this->htmlResponse();
    }
}

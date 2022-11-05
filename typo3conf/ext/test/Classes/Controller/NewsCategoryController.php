<?php

declare(strict_types=1);

namespace Sajmon\Test\Controller;

use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * This file is part of the "test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * NewsCategoryController
 */
class NewsCategoryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * newsCategoryRepository
     *
     * @var \Sajmon\Test\Domain\Repository\NewsCategoryRepository
     */
    protected $newsCategoryRepository = null;

    /**
     * @param \Sajmon\Test\Domain\Repository\NewsCategoryRepository $newsCategoryRepository
     */
    public function injectNewsCategoryRepository(\Sajmon\Test\Domain\Repository\NewsCategoryRepository $newsCategoryRepository)
    {
        $this->newsCategoryRepository = $newsCategoryRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $newsCategories = $this->newsCategoryRepository->findAll();
        $this->view->assign('newsCategories', $newsCategories);
        return $this->htmlResponse();
    }

    public function showAction(\Sajmon\Test\Domain\Model\NewsCategory $newsCategory)
    {
        // DebuggerUtility::var_dump($newsCategory);
        // return "hello world";
        $this->view->assign('newsCategory', $newsCategory);
        return $this->htmlResponse();
    }
}

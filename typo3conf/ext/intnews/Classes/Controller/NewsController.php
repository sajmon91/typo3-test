<?php

declare(strict_types=1);

namespace Int\Intnews\Controller;


use Int\Inthelper\Helper\SiteHelper;
use Int\Intnews\Domain\Model\News;
use Int\Intnews\Domain\Repository\NewsRepository;
use TYPO3\CMS\Core\Configuration\SiteConfiguration;
use TYPO3\CMS\Core\Http\ImmediateResponseException;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\Controller\ErrorController;

/**
 * This file is part of the "intnews" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 */

/**
 * NewsController
 */
class NewsController extends ActionController
{

    public const EVENT_CATEGORY = '2';

    /**
     * @var array|QueryResult|null
     */
    protected $newsList = null;

    /**
     * newsRepository
     *
     * @var \Int\Intnews\Domain\Repository\NewsRepository|null
     */
    protected ?NewsRepository $newsRepository = null;

    /**
     * @param \Int\Intnews\Domain\Repository\NewsRepository $newsRepository
     */
    public function injectNewsRepository(NewsRepository $newsRepository): void
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * action list
     *
     * @return void
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException|\TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     */
    public function listAction(): void
    {
        $categoriesArray = explode(',', $this->settings['categories']);
        $sortingOrder    = in_array(
            self::EVENT_CATEGORY,
            $categoriesArray,
            true
        ) ? [ 'news_date' => QueryInterface::ORDER_ASCENDING ] : [ 'news_date' => QueryInterface::ORDER_DESCENDING ];

        if ($this->settings['categories'] && !empty($this->settings['categories'])) {
            $newsList = $this->newsRepository->findByCategoryCsv($this->settings['categories'], true, $sortingOrder);
        } else {
            $newsList = $this->newsRepository->findAllByLanguage(true, $sortingOrder);
        }

        if (SiteHelper::getCurrentSiteLanguageId() === 0) {
            $newsListArray = [];
            /** @var News $singleNews */
            foreach ($newsList as $singleNews) {
                if ($singleNews->isHideOriginalLanguage() === false) {
                    $newsListArray[] = $singleNews;
                }
            }
            $newsList = $newsListArray;
        }
        $this->newsList = $newsList;

        $this->view->assign('newss', $this->newsList);
        $this->view->assign('categoryFilters', $this->getCategories(true));
        $this->view->assign('authorFilters', $this->getAuthors());
    }

    /**
     * action show
     *
     * @param int|null $news
     *
     * @return void
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     * @throws \TYPO3\CMS\Core\Error\Http\PageNotFoundException
     * @throws \TYPO3\CMS\Core\Http\ImmediateResponseException
     */
    public function showAction(?int $news = null): void
    {
        if (!$news) {
            $response = GeneralUtility::makeInstance(ErrorController::class)->pageNotFoundAction(
                $GLOBALS['TYPO3_REQUEST'],
                'Page Not Found'
            );
            throw new ImmediateResponseException($response, 1591428020);
        }
        $newsObject = $this->newsRepository->findByUidAndLanguage($news);
        $this->view->assign('news', $newsObject);
    }

    /**
     * @param bool $hideNonFilter
     *
     * @return array
     */
    private function getCategories(bool $hideNonFilter = false): array
    {
        $categoriesArray = [];
        if (count($this->newsList)) {
            foreach ($this->newsList as $singleNews) {
                if (count($singleNews->getCategories())) {
                    foreach ($singleNews->getCategories() as $singleCategory) {
                        if ($hideNonFilter && $singleCategory->isShowInFilter()) {
                            $categoriesArray[$singleCategory->getUid()] = $singleCategory;
                        }
                    }
                }
            }
        }
        return $categoriesArray;
    }

    /**
     * @return array
     */
    private function getAuthors(): array
    {
        $authorsArray = [];
        if (count($this->newsList)) {
            foreach ($this->newsList as $singleNews) {
                if (count($singleNews->getAuthors())) {
                    foreach ($singleNews->getAuthors() as $singleAuthor) {
                        $authorsArray[$singleAuthor->getUid()] = $singleAuthor;
                    }
                }
            }
        }
        return $authorsArray;
    }
}

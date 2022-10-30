<?php

declare(strict_types=1);

namespace Sajmon\Test\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class NewsControllerTest extends UnitTestCase
{
    /**
     * @var \Sajmon\Test\Controller\NewsController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Sajmon\Test\Controller\NewsController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllNewsFromRepositoryAndAssignsThemToView(): void
    {
        $allNews = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $newsRepository = $this->getMockBuilder(\Sajmon\Test\Domain\Repository\NewsRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $newsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allNews));
        $this->subject->_set('newsRepository', $newsRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('news', $allNews);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenNewsToView(): void
    {
        $news = new \Sajmon\Test\Domain\Model\News();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('news', $news);

        $this->subject->showAction($news);
    }
}

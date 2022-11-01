<?php
declare(strict_types=1);

namespace Int\Intnews\Tests\Unit\Controller;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Saša Stojanović <stojanovic@intention.rs>
 */
class NewsControllerTest extends UnitTestCase
{
    /**
     * @var \Int\Intnews\Controller\NewsController
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Int\Intnews\Controller\NewsController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllNewssFromRepositoryAndAssignsThemToView()
    {
        $allNewss = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $itemRepository = $this->getMockBuilder(\Int\Intnews\Domain\Repository\NewsRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $itemRepository->expects(self::once())->method('findAll')->will(self::returnValue($allNewss));
        $this->inject($this->subject, 'itemRepository', $itemRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('items', $allNewss);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenNewsToView()
    {
        $item = new \Int\Intnews\Domain\Model\News();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('item', $item);

        $this->subject->showAction($item);
    }
}

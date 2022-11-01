<?php
declare(strict_types=1);

namespace Int\Intitems\Tests\Unit\Controller;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Saša Stojanović <stojanovic@intention.rs>
 */
class ItemControllerTest extends UnitTestCase
{
    /**
     * @var \Int\Intitems\Controller\ItemController
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Int\Intitems\Controller\ItemController::class)
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
    public function listActionFetchesAllItemsFromRepositoryAndAssignsThemToView()
    {
        $allItems = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $itemRepository = $this->getMockBuilder(\Int\Intitems\Domain\Repository\ItemRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $itemRepository->expects(self::once())->method('findAll')->will(self::returnValue($allItems));
        $this->inject($this->subject, 'itemRepository', $itemRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('items', $allItems);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenItemToView()
    {
        $item = new \Int\Intitems\Domain\Model\Item();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('item', $item);

        $this->subject->showAction($item);
    }
}

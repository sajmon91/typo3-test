<?php
declare(strict_types=1);

namespace Int\Intticket\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Saša Stojanović <stojanovic@intention.rs>
 */
class TicketControllerTest extends UnitTestCase
{
    /**
     * @var \Int\Intticket\Controller\TicketController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Int\Intticket\Controller\TicketController::class))
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
    public function listActionFetchesAllTicketsFromRepositoryAndAssignsThemToView(): void
    {
        $allTickets = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $ticketRepository = $this->getMockBuilder(\Int\Intticket\Domain\Repository\TicketRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $ticketRepository->expects(self::once())->method('findAll')->will(self::returnValue($allTickets));
        $this->subject->_set('ticketRepository', $ticketRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('tickets', $allTickets);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenTicketToView(): void
    {
        $ticket = new \Int\Intticket\Domain\Model\Ticket();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('ticket', $ticket);

        $this->subject->showAction($ticket);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenTicketToTicketRepository(): void
    {
        $ticket = new \Int\Intticket\Domain\Model\Ticket();

        $ticketRepository = $this->getMockBuilder(\Int\Intticket\Domain\Repository\TicketRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $ticketRepository->expects(self::once())->method('add')->with($ticket);
        $this->subject->_set('ticketRepository', $ticketRepository);

        $this->subject->createAction($ticket);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenTicketToView(): void
    {
        $ticket = new \Int\Intticket\Domain\Model\Ticket();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('ticket', $ticket);

        $this->subject->editAction($ticket);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenTicketInTicketRepository(): void
    {
        $ticket = new \Int\Intticket\Domain\Model\Ticket();

        $ticketRepository = $this->getMockBuilder(\Int\Intticket\Domain\Repository\TicketRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $ticketRepository->expects(self::once())->method('update')->with($ticket);
        $this->subject->_set('ticketRepository', $ticketRepository);

        $this->subject->updateAction($ticket);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenTicketFromTicketRepository(): void
    {
        $ticket = new \Int\Intticket\Domain\Model\Ticket();

        $ticketRepository = $this->getMockBuilder(\Int\Intticket\Domain\Repository\TicketRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $ticketRepository->expects(self::once())->method('remove')->with($ticket);
        $this->subject->_set('ticketRepository', $ticketRepository);

        $this->subject->deleteAction($ticket);
    }
}

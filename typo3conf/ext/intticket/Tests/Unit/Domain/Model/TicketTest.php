<?php
declare(strict_types=1);

namespace Int\Intticket\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Saša Stojanović <stojanovic@intention.rs>
 */
class TicketTest extends UnitTestCase
{
    /**
     * @var \Int\Intticket\Domain\Model\Ticket|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Int\Intticket\Domain\Model\Ticket::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getSubjectReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSubject()
        );
    }

    /**
     * @test
     */
    public function setSubjectForStringSetsSubject(): void
    {
        $this->subject->setSubject('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('subject'));
    }

    /**
     * @test
     */
    public function getBodyReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getBody()
        );
    }

    /**
     * @test
     */
    public function setBodyForStringSetsBody(): void
    {
        $this->subject->setBody('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('body'));
    }

    /**
     * @test
     */
    public function getNotesReturnsInitialValueForNote(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getNotes()
        );
    }

    /**
     * @test
     */
    public function setNotesForObjectStorageContainingNoteSetsNotes(): void
    {
        $note = new \Int\Intticket\Domain\Model\Note();
        $objectStorageHoldingExactlyOneNotes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneNotes->attach($note);
        $this->subject->setNotes($objectStorageHoldingExactlyOneNotes);

        self::assertEquals($objectStorageHoldingExactlyOneNotes, $this->subject->_get('notes'));
    }

    /**
     * @test
     */
    public function addNoteToObjectStorageHoldingNotes(): void
    {
        $note = new \Int\Intticket\Domain\Model\Note();
        $notesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $notesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($note));
        $this->subject->_set('notes', $notesObjectStorageMock);

        $this->subject->addNote($note);
    }

    /**
     * @test
     */
    public function removeNoteFromObjectStorageHoldingNotes(): void
    {
        $note = new \Int\Intticket\Domain\Model\Note();
        $notesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $notesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($note));
        $this->subject->_set('notes', $notesObjectStorageMock);

        $this->subject->removeNote($note);
    }
}

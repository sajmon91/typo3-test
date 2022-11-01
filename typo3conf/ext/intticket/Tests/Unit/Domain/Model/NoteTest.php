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
class NoteTest extends UnitTestCase
{
    /**
     * @var \Int\Intticket\Domain\Model\Note|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Int\Intticket\Domain\Model\Note::class,
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
    public function getSenderReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSender()
        );
    }

    /**
     * @test
     */
    public function setSenderForStringSetsSender(): void
    {
        $this->subject->setSender('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('sender'));
    }

    /**
     * @test
     */
    public function getReceiversReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getReceivers()
        );
    }

    /**
     * @test
     */
    public function setReceiversForStringSetsReceivers(): void
    {
        $this->subject->setReceivers('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('receivers'));
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
}

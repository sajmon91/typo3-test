<?php

declare(strict_types=1);

namespace Sajmon\Test\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class NewsCategoryTest extends UnitTestCase
{
    /**
     * @var \Sajmon\Test\Domain\Model\NewsCategory|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Sajmon\Test\Domain\Model\NewsCategory::class,
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
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
    }

    /**
     * @test
     */
    public function getNewsReturnsInitialValueForNews(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getNews()
        );
    }

    /**
     * @test
     */
    public function setNewsForObjectStorageContainingNewsSetsNews(): void
    {
        $news = new \Sajmon\Test\Domain\Model\News();
        $objectStorageHoldingExactlyOneNews = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneNews->attach($news);
        $this->subject->setNews($objectStorageHoldingExactlyOneNews);

        self::assertEquals($objectStorageHoldingExactlyOneNews, $this->subject->_get('news'));
    }

    /**
     * @test
     */
    public function addNewsToObjectStorageHoldingNews(): void
    {
        $news = new \Sajmon\Test\Domain\Model\News();
        $newsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $newsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($news));
        $this->subject->_set('news', $newsObjectStorageMock);

        $this->subject->addNews($news);
    }

    /**
     * @test
     */
    public function removeNewsFromObjectStorageHoldingNews(): void
    {
        $news = new \Sajmon\Test\Domain\Model\News();
        $newsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $newsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($news));
        $this->subject->_set('news', $newsObjectStorageMock);

        $this->subject->removeNews($news);
    }
}

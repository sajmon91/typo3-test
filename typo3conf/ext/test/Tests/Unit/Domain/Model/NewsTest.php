<?php

declare(strict_types=1);

namespace Sajmon\Test\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class NewsTest extends UnitTestCase
{
    /**
     * @var \Sajmon\Test\Domain\Model\News|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Sajmon\Test\Domain\Model\News::class,
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
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getImgReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getImg()
        );
    }

    /**
     * @test
     */
    public function setImgForFileReferenceSetsImg(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImg($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('img'));
    }

    /**
     * @test
     */
    public function getCategoriesReturnsInitialValueForNewsCategory(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCategories()
        );
    }

    /**
     * @test
     */
    public function setCategoriesForObjectStorageContainingNewsCategorySetsCategories(): void
    {
        $category = new \Sajmon\Test\Domain\Model\NewsCategory();
        $objectStorageHoldingExactlyOneCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCategories->attach($category);
        $this->subject->setCategories($objectStorageHoldingExactlyOneCategories);

        self::assertEquals($objectStorageHoldingExactlyOneCategories, $this->subject->_get('categories'));
    }

    /**
     * @test
     */
    public function addCategoryToObjectStorageHoldingCategories(): void
    {
        $category = new \Sajmon\Test\Domain\Model\NewsCategory();
        $categoriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($category));
        $this->subject->_set('categories', $categoriesObjectStorageMock);

        $this->subject->addCategory($category);
    }

    /**
     * @test
     */
    public function removeCategoryFromObjectStorageHoldingCategories(): void
    {
        $category = new \Sajmon\Test\Domain\Model\NewsCategory();
        $categoriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($category));
        $this->subject->_set('categories', $categoriesObjectStorageMock);

        $this->subject->removeCategory($category);
    }
}

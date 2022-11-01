<?php
declare(strict_types=1);

namespace Int\Intnews\Tests\Unit\Domain\Model;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Saša Stojanović <stojanovic@intention.rs>
 */
class NewsTest extends UnitTestCase
{
    /**
     * @var \Int\Intnews\Domain\Model\News
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Int\Intnews\Domain\Model\News();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getOidReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOid()
        );
    }

    /**
     * @test
     */
    public function setOidForStringSetsOid()
    {
        $this->subject->setOid('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'oid',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionShortReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescriptionShort()
        );
    }

    /**
     * @test
     */
    public function setDescriptionShortForStringSetsDescriptionShort()
    {
        $this->subject->setDescriptionShort('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'descriptionShort',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImagesReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesForFileReferenceSetsImages()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImages($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'images',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFilesReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesForFileReferenceSetsFiles()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setFiles($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'files',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFiles2ReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getFiles2()
        );
    }

    /**
     * @test
     */
    public function setFiles2ForFileReferenceSetsFiles2()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setFiles2($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'files2',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFiles3ReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getFiles3()
        );
    }

    /**
     * @test
     */
    public function setFiles3ForFileReferenceSetsFiles3()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setFiles3($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'files3',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPropertiesReturnsInitialValueForNewsProperty()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getProperties()
        );
    }

    /**
     * @test
     */
    public function setPropertiesForObjectStorageContainingNewsPropertySetsProperties()
    {
        $property = new \Int\Intnews\Domain\Model\NewsProperty();
        $objectStorageHoldingExactlyOneProperties = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneProperties->attach($property);
        $this->subject->setProperties($objectStorageHoldingExactlyOneProperties);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneProperties,
            'properties',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addPropertyToObjectStorageHoldingProperties()
    {
        $property = new \Int\Intnews\Domain\Model\NewsProperty();
        $propertiesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $propertiesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($property));
        $this->inject($this->subject, 'properties', $propertiesObjectStorageMock);

        $this->subject->addProperty($property);
    }

    /**
     * @test
     */
    public function removePropertyFromObjectStorageHoldingProperties()
    {
        $property = new \Int\Intnews\Domain\Model\NewsProperty();
        $propertiesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $propertiesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($property));
        $this->inject($this->subject, 'properties', $propertiesObjectStorageMock);

        $this->subject->removeProperty($property);
    }

    /**
     * @test
     */
    public function getCategoriesReturnsInitialValueForCategory()
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
    public function setCategoriesForObjectStorageContainingCategorySetsCategories()
    {
        $category = new \Int\Intbuilder\Domain\Model\Category();
        $objectStorageHoldingExactlyOneCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCategories->attach($category);
        $this->subject->setCategories($objectStorageHoldingExactlyOneCategories);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneCategories,
            'categories',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addCategoryToObjectStorageHoldingCategories()
    {
        $category = new \Int\Intbuilder\Domain\Model\Category();
        $categoriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($category));
        $this->inject($this->subject, 'categories', $categoriesObjectStorageMock);

        $this->subject->addCategory($category);
    }

    /**
     * @test
     */
    public function removeCategoryFromObjectStorageHoldingCategories()
    {
        $category = new \Int\Intbuilder\Domain\Model\Category();
        $categoriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($category));
        $this->inject($this->subject, 'categories', $categoriesObjectStorageMock);

        $this->subject->removeCategory($category);
    }
}

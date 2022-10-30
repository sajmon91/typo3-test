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
class NewsCategoryControllerTest extends UnitTestCase
{
    /**
     * @var \Sajmon\Test\Controller\NewsCategoryController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Sajmon\Test\Controller\NewsCategoryController::class))
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
    public function listActionFetchesAllNewsCategoriesFromRepositoryAndAssignsThemToView(): void
    {
        $allNewsCategories = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $newsCategoryRepository = $this->getMockBuilder(\Sajmon\Test\Domain\Repository\NewsCategoryRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $newsCategoryRepository->expects(self::once())->method('findAll')->will(self::returnValue($allNewsCategories));
        $this->subject->_set('newsCategoryRepository', $newsCategoryRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('newsCategories', $allNewsCategories);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }
}

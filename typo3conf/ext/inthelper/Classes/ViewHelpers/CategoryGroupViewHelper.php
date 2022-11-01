<?php

namespace Int\Inthelper\ViewHelpers;

use Closure;
use Int\Intbuilder\Domain\Repository\CategoryRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * Returns grouped categories by type
 *
 * @package    TYPO3
 * @subpackage Fluid
 * @version
 */
class CategoryGroupViewHelper extends AbstractViewHelper
{

    /**
     * Initializes arguments
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('categories', 'array', 'Categories', true);
        $this->registerArgument('sortByUid', 'bool', 'Sort by UID (by default sorted by name)', false);
        $this->registerArgument('group', 'bool', 'Group categories by Type', false, true);
    }

    /**
     * @throws \TYPO3\CMS\Core\Context\Exception\AspectNotFoundException
     */
    public static function renderStatic(
        array $arguments,
        Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $categories = $arguments['categories'];
        $sortByUid  = (bool)$arguments['sortByUid'];
        $group      = (bool)$arguments['group'];
        $grouped    = ($categories instanceof ObjectStorage);

        $sortFlag = SORT_NATURAL;
        if (!$sortByUid) {
            $sortFlag = SORT_NATURAL;
        }

        if (!count($categories)) {
            return [];
        }

        $categoriesSorted = [];

        $categoryRepository = GeneralUtility::makeInstance(CategoryRepository::class);

        foreach ($categories as $singleCategoryRaw) {
            $singleCategory = $categoryRepository->findByUidAndLanguage(
                $singleCategoryRaw->getUid()
            );
            if ($singleCategory) {
                $identifier = $sortByUid ? $singleCategory->getUid() : $singleCategory->getName();
                $type       = $singleCategory->getType();
                if ($group) {
                    $categoriesSorted[$type][$identifier] = $singleCategory;
                } else {
                    $categoriesSorted[$identifier] = $singleCategory;
                }
            }
        }

        if (!empty($categoriesSorted)) {
            foreach ($categoriesSorted as $key => $value) {
                if (is_array($value)) {
                    ksort($categoriesSorted[$key], $sortFlag);
                }
            }
        }

        return $categoriesSorted;
    }

}

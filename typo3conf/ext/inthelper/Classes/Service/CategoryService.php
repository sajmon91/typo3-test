<?php

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

declare(strict_types=1);

namespace Int\Inthelper\Service;

use Int\Intbuilder\Domain\Model\Category;
use Int\Intbuilder\Domain\Repository\CategoryRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 *
 */
class CategoryService
{

    /**
     * @param \Int\Intbuilder\Domain\Model\Category $category
     *
     * @return string
     */
    public static function createCategoryTriggerTag(Category $category): string
    {
        if (!$category->isShowInFilter()) {
            return '';
        }
        $returnArray   = [];
        $returnArray[] = 'data-filter-category-trigger=' . $category->getUid();
        $returnArray[] = 'data-filter-categorytype-trigger=' . $category->getType();

        return implode(' ', array_unique($returnArray));
    }

    /**
     * @param ObjectStorage $categories
     *
     * @return string
     */
    public static function createCategoryContainerTags(ObjectStorage $categories): string
    {
        if (!count($categories)) {
            return '';
        }

        $categoryUid        = [];
        $categoryTypeUid    = [];
        $categoryRepository = GeneralUtility::makeInstance(CategoryRepository::class);
        /** @var Category $singleCategory */
        foreach ($categories as $singleCategoryRaw) {
            $singleCategory = $categoryRepository->findByUidAndLanguage(
                $singleCategoryRaw->getUid()
            );
            if (!$singleCategory) {
                $singleCategory = $singleCategoryRaw;
            }
            if ($singleCategoryRaw->isShowInFilter()) {
                $categoryUid[]     = $singleCategory->getUid();
                $categoryTypeUid[] = $singleCategory->getType();
            }
        }

        return 'data-filter-category-container="' . implode(
                ',',
                array_unique($categoryUid)
            ) . '" data-filter-categorytype-container="' . implode(',', array_unique($categoryTypeUid)).'"';
    }
}

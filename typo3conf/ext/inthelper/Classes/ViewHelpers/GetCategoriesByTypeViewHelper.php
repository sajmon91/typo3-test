<?php

namespace Int\Inthelper\ViewHelpers;

use Int\Intbuilder\Domain\Model\Enum\CategoryType;
use Int\Intbuilder\Domain\Repository\CategoryRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Get Categories by type
 *
 * @package    TYPO3
 * @subpackage Fluid
 * @version
 */
class GetCategoriesByTypeViewHelper extends AbstractViewHelper
{


    /**
     * Initialize arguments
     *
     * @return void
     * @api
     *
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('type', 'int', 'Field name', false);
    }

    /**
     * Get page
     *
     * @return array|false|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function render()
    {

        $categoryRepository = GeneralUtility::makeInstance(CategoryRepository::class);
        $categories            = $categoryRepository->findByRootAndType((int)CategoryType::PRODUCT_CATEGORY);
        if (!empty($categories)) {
            return $categories;
        }

        return false;

    }

}
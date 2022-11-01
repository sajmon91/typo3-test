<?php
/**
 *
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

namespace Int\Inthelper\Helper;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use \TYPO3\CMS\Extbase\Mvc\Controller\Exception\RequiredArgumentMissingException;

/**
 *
 *
 * @package inthelper
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class FlexFormsHelper extends ActionController
{

    /**
     * Override category if submitted via FlexForms
     *
     * @return array
     * @throws \TYPO3\CMS\Extbase\Mvc\Controller\Exception\RequiredArgumentMissingException
     */
    public function setCategoryFromFlexForms(): array
    {
        $requestArguments = [];
        if (!empty($this->request)) {
            $requestArguments = $this->request->getArguments();
        }

        if (empty($this->settings['whichCategories']) && empty((int)$requestArguments['category'])) {
            // Throw exception if category not set
            throw new RequiredArgumentMissingException('Category ID missing in flexforms');
        }

        if (!empty($requestArguments['category'])) {
            // use GET param if available
            return [ $requestArguments['category'] ];
        }

        // use FlexForms value as fallback
        return explode(',', $this->settings['whichCategories']);
    }

    /**
     * Override Limit if submitted via FlexForms
     *
     * @param integer|null $limit Limit
     *
     * @return int
     */
    public function setLimitFromFlexForms(int $limit = null): ?int
    {
        // If param empty and plugin flexform limit is set
        if (!$limit && !empty((int)$this->settings['limit'])) {
            $limit = (int)$this->settings['limit'];
        }

        // if empty, get default limit value from constants
        if (!$limit) {
            return (int)$this->settings['defaultLimit'];
        }

        return $limit;
    }

}

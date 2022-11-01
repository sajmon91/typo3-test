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

namespace Int\Intbuilder\Domain\Model;

use Int\Intbuilder\Domain\Model\Traits\PageBaseTrait;
use Int\Intbuilder\Domain\Model\Traits\PagesNavTrait;
use Int\Intbuilder\Domain\Model\Traits\RootPageTrait;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * This model represents a root page
 */
class RootPage extends AbstractEntity
{
    use PageBaseTrait;
    use PagesNavTrait;
    use RootPageTrait;
}

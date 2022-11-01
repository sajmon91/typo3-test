<?php
/**
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

use Int\Intbuilder\Domain\Model\Traits\ContentBaseTrait;
use Int\Intbuilder\Domain\Model\Traits\ContentIntTrait;
use Int\Intbuilder\Domain\Model\Traits\ContentSlugTrait;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

// CE Traits
use Int\Intbuilder\Domain\Model\Traits\ContentIrreTrait;


/**
 * This model represents a content element
 */
class Content extends AbstractEntity
{
    use ContentBaseTrait;
    use ContentIntTrait;
    use ContentSlugTrait;

    // Add Traits from Content Elements here
    // Now this has to be done manually
    use ContentIrreTrait;
}

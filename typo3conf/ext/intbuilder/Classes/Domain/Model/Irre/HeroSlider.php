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

namespace Int\Intbuilder\Domain\Model\Irre;


use Int\Intbuilder\Domain\Model\Irre\Traits\HeaderTrait;
use Int\Intbuilder\Domain\Model\Irre\Traits\ImagesTrait;
use Int\Intbuilder\Domain\Model\Irre\Traits\LinkTrait;
use Int\Intbuilder\Domain\Model\Irre\Traits\TextTrait;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * This model represents a HeroSlider Irre
 */
class HeroSlider extends AbstractEntity
{
    use HeaderTrait;
    use TextTrait;
    use ImagesTrait;
    use LinkTrait;
}
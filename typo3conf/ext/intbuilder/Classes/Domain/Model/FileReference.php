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


/**
 * This model represents a File Reference
 */
class FileReference extends \TYPO3\CMS\Extbase\Domain\Model\FileReference
{

    /**
     *  intLightbox
     *
     * @var bool
     */
    protected bool $intLightbox = false;

    /**
     * @return bool
     */
    public function isIntLightbox(): bool
    {
        return $this->intLightbox;
    }

    /**
     * @param bool $intLightbox
     *
     * @return self
     */
    public function setIntLightbox(bool $intLightbox): self
    {
        $this->intLightbox = $intLightbox;
        return $this;
    }

}

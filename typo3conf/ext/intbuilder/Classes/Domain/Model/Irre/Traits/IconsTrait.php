<?php
/***
 *
 * This file is part of the "intbuilder" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 *
 ***/

namespace Int\Intbuilder\Domain\Model\Irre\Traits;

use Int\Intbuilder\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

trait IconsTrait
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $icons = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $currentIcon = null;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getImage(): ?ObjectStorage
    {
        return $this->icons;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $icons
     */
    public function setImage(?ObjectStorage $icons): void
    {
        $this->icons = $icons;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference|null
     */
    public function getCurrentIcon(): ?FileReference
    {
        if ($this->icons instanceof ObjectStorage && count($this->icons)) {
            $this->icons->rewind();
            return $this->icons->current();
        }
        return null;
    }
}

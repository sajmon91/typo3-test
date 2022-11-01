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
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

trait ImagesTrait
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $images = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $currentImage = null;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getImages(): ?ObjectStorage
    {
        return $this->images;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $images
     */
    public function setImages(?ObjectStorage $images): void
    {
        $this->images = $images;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference|null
     */
    public function getCurrentImage(): ?FileReference
    {
        if ($this->images instanceof ObjectStorage && count($this->images)) {
            $this->images->rewind();
            return $this->images->current();
        }
        return null;
    }
}

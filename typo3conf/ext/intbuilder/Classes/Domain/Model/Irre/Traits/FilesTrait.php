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

trait FilesTrait
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $files = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $currentFile = null;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getFiles(): ?ObjectStorage
    {
        return $this->files;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $files
     */
    public function setFiles(?ObjectStorage $files): void
    {
        $this->files = $files;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference|null
     */
    public function getCurrentFile(): ?FileReference
    {
        if ($this->files instanceof ObjectStorage && count($this->files)) {
            $this->files->rewind();
            return $this->files->current();
        }
        return null;
    }
}

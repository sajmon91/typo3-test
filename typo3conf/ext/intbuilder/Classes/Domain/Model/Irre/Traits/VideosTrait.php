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

trait VideosTrait
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $videos = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $currentVideo = null;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getVideos(): ?ObjectStorage
    {
        return $this->videos;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $videos
     */
    public function setVideos(?ObjectStorage $videos): void
    {
        $this->videos = $videos;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference|null
     */
    public function getCurrentVideo(): ?FileReference
    {
        if ($this->videos instanceof ObjectStorage && count($this->videos)) {
            $this->videos->rewind();
            return $this->videos->current();
        }
        return null;
    }
}

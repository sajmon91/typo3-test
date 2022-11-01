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

trait ContentTypeTrait
{
    /**
     * @var int
     */
    protected int $contentType = 0;

    /**
     * @return int
     */
    public function getContentType(): int
    {
        return $this->contentType;
    }

    /**
     * @param int $contentType
     */
    public function setContentType(int $contentType): void
    {
        $this->contentType = $contentType;
    }
}

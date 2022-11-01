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

trait Text2Trait
{
    /**
     * @var string
     */
    protected string $text2 = '';

    /**
     * @return string|null
     */
    public function getText2(): ?string
    {
        return $this->text2;
    }

    /**
     * @param string $text2
     *
     * @return self
     */
    public function setText2(string $text2): self
    {
        $this->text2 = $text2;
        return $this;
    }
}

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

trait Subheader2Trait
{
    /**
     * @var string
     */
    protected string $subheader2 = '';

    /**
     * @return string|null
     */
    public function getSubheader2(): ?string
    {
        return $this->subheader2;
    }

    /**
     * @param string $subheader2
     *
     * @return self
     */
    public function setSubheader2(string $subheader2): self
    {
        $this->subheader2 = $subheader2;
        return $this;
    }
}

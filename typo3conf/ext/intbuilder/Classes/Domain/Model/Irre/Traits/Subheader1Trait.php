<?php
/***
 *
 * This file is part of the "intbuilder" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 1010 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 *
 ***/

namespace Int\Intbuilder\Domain\Model\Irre\Traits;

trait Subheader1Trait
{
    /**
     * @var string
     */
    protected string $subheader1 = '';

    /**
     * @return string|null
     */
    public function getSubheader1(): ?string
    {
        return $this->subheader1;
    }

    /**
     * @param string $subheader1
     *
     * @return self
     */
    public function setSubheader1(string $subheader1): self
    {
        $this->subheader1 = $subheader1;
        return $this;
    }
}

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

trait SubheaderTrait
{
    /**
     * @var string
     */
    protected string $subheader = '';

    /**
     * @return string|null
     */
    public function getSubheader(): ?string
    {
        return $this->subheader;
    }

    /**
     * @param string $subheader
     *
     * @return self
     */
    public function setSubheader(string $subheader): self
    {
        $this->subheader = $subheader;
        return $this;
    }
}

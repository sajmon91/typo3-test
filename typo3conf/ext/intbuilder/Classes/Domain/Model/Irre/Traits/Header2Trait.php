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

trait Header2Trait
{
    /**
     * @var string
     */
    protected string $header2 = '';

    /**
     * @return string|null
     */
    public function getHeader2(): ?string
    {
        return $this->header2;
    }

    /**
     * @param string $header2
     *
     * @return self
     */
    public function setHeader2(string $header2): self
    {
        $this->header2 = $header2;
        return $this;
    }
}

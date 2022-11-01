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

trait HeaderTrait
{
    /**
     * @var string
     */
    protected string $header = '';

    /**
     * @return string|null
     */
    public function getHeader(): ?string
    {
        return $this->header;
    }

    /**
     * @param string $header
     *
     * @return self
     */
    public function setHeader(string $header): self
    {
        $this->header = $header;
        return $this;
    }
}

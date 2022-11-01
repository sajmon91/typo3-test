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

namespace Int\Intbuilder\Domain\Model\Traits;

trait SystemFieldsTrait
{

    /**
     * hidden
     *
     * @var bool
     */
    protected bool $hidden;

    /**
     * deleted
     *
     * @var bool
     */
    protected bool $deleted;

    /**
     * starttime
     *
     * @var string
     */
    protected string $starttime;

    /**
     * endtime
     *
     * @var string
     */
    protected string $endtime;

    /**
     * tstamp
     *
     * @var int
     */
    protected int $tstamp;

    /**
     * crdate
     *
     * @var int
     */
    protected int $crdate;

    /**
     * @return bool
     */
    public function isHidden(): ?bool
    {
        return $this->hidden;
    }

    /**
     * @param bool $hidden
     *
     * @return self
     */
    public function setHidden(bool $hidden): self
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     *
     * @return self
     */
    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return string
     */
    public function getStarttime(): string
    {
        return $this->starttime;
    }

    /**
     * @param int $starttime
     *
     * @return self
     */
    public function setStarttime(int $starttime): self
    {
        $this->starttime = $starttime;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndtime(): string
    {
        return $this->endtime;
    }

    /**
     * @param int $endtime
     *
     * @return self
     */
    public function setEndtime(int $endtime): self
    {
        $this->endtime = $endtime;
        return $this;
    }

    /**
     * @return int
     */
    public function getTstamp(): ?int
    {
        return $this->tstamp;
    }

    /**
     * @param int $tstamp
     *
     * @return self
     */
    public function setTstamp(int $tstamp): self
    {
        $this->tstamp = $tstamp;
        return $this;
    }

    /**
     * @return int
     */
    public function getCrdate(): ?int
    {
        return $this->crdate;
    }

    /**
     * @param int $crdate
     *
     * @return self
     */
    public function setCrdate(int $crdate): self
    {
        $this->crdate = $crdate;
        return $this;
    }
}

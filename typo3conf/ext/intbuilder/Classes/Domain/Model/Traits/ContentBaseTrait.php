<?php
/**
 *
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

declare(strict_types=1);

namespace Int\Intbuilder\Domain\Model\Traits;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Validation as Extbase;

/**
 * This model represents a content element
 */
trait ContentBaseTrait
{

    /**
     * t3Origuid
     *
     * @var int
     */
    protected int $t3Origuid = 0;

    /**
     * sysLanguageUid
     *
     * @var int
     */
    protected int $sysLanguageUid = 0;

    /**
     * hidden
     *
     * @var bool
     */
    protected bool $hidden = false;

    /**
     * deleted
     *
     * @var bool
     */
    protected bool $deleted = false;

    /**
     * sorting
     *
     * @var int
     */
    protected int $sorting = 0;

    /**
     * tstamp
     *
     * @var int
     */
    protected int $tstamp = 0;

    /**
     * crdate
     *
     * @var int
     */
    protected int $crdate = 0;

    /**
     * date
     *
     * @var int
     */
    protected int $date = 0;

    /**
     * starttime
     *
     * @var int
     */
    protected int $starttime = 0;

    /**
     * endtime
     *
     * @var int
     */
    protected int $endtime = 0;

    /**
     * header
     *
     * @var string
     */
    protected string $header = '';

    /**
     * subheader
     *
     * @var string
     */
    protected string $subheader = '';

    /**
     * headerLink
     *
     * @var string
     */
    protected string $headerLink = '';

    /**
     * headerLayout
     *
     * @var string
     */
    protected string $headerLayout = '';

    /**
     * bodytext
     *
     * @var string
     */
    protected string $bodytext = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $image = null;

    /**
     * imagewidth
     *
     * @var int
     */
    protected int $imagewidth = 0;

    /**
     * imageorient
     *
     * @var int
     */
    protected int $imageorient = 0;

    /**
     * imagecols
     *
     * @var int
     */
    protected int $imagecols = 0;

    /**
     * imageborder
     *
     * @var int
     */
    protected int $imageborder = 0;

    /**
     * imageheight
     *
     * @var int
     */
    protected int $imageheight = 0;

    /**
     * media
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $media = null;

    /**
     * layout
     *
     * @var string
     */
    protected string $layout = '';

    /**
     * ctype
     *
     * @var string
     */
    protected string $ctype = '';

    /**
     * colPos
     *
     * @var int
     */
    protected int $colPos = 0;

    /**
     * l18nDiffsource
     *
     * @var string
     */
    protected string $l18nDiffsource = '';

    /**
     * categories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>|null
     */
    protected ?ObjectStorage $categories = null;

    /**
     * feGroup
     *
     * @var string
     */
    protected string $feGroup = '';

    /**
     * @return int
     */
    public function getUid(): int
    {
        return $this->uid;
    }

    /**
     * @param int $uid
     */
    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return int
     */
    public function getPid(): int
    {
        return $this->pid;
    }

    /**
     * @param int $pid
     */
    public function setPid(int $pid): void
    {
        $this->pid = $pid;
    }

    /**
     * @return int
     */
    public function getT3Origuid(): int
    {
        return $this->t3Origuid;
    }

    /**
     * @param int $t3Origuid
     */
    public function setT3Origuid($t3Origuid)
    {
        $this->t3Origuid = $t3Origuid;
    }

    /**
     * @return int
     */
    public function getSysLanguageUid(): int
    {
        return $this->sysLanguageUid;
    }

    /**
     * @param int $sysLanguageUid
     */
    public function setSysLanguageUid(int $sysLanguageUid)
    {
        $this->sysLanguageUid = $sysLanguageUid;
    }

    /**
     * @return boolean
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * @param boolean $hidden
     */
    public function setHidden(bool $hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * @return boolean
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param boolean $deleted
     */
    public function setDeleted(bool $deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * @return int
     */
    public function getSorting(): int
    {
        return $this->sorting;
    }

    /**
     * @param int $sorting
     */
    public function setSorting(int $sorting)
    {
        $this->sorting = $sorting;
    }

    /**
     * @return int
     */
    public function getTstamp(): int
    {
        return $this->tstamp;
    }

    /**
     * @param int $tstamp
     */
    public function setTstamp(int $tstamp)
    {
        $this->tstamp = $tstamp;
    }

    /**
     * @return int
     */
    public function getCrdate(): int
    {
        return $this->crdate;
    }

    /**
     * @param int $crdate
     */
    public function setCrdate(int $crdate)
    {
        $this->crdate = $crdate;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date)
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getStarttime(): int
    {
        return $this->starttime;
    }

    /**
     * @param int $starttime
     */
    public function setStarttime(int $starttime)
    {
        $this->starttime = $starttime;
    }

    /**
     * @return int
     */
    public function getEndtime(): int
    {
        return $this->endtime;
    }

    /**
     * @param int $endtime
     */
    public function setEndtime(int $endtime)
    {
        $this->endtime = $endtime;
    }

    /**
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
    }

    /**
     * @param string $header
     */
    public function setHeader(string $header)
    {
        $this->header = $header;
    }

    /**
     * @return string
     */
    public function getSubheader(): string
    {
        return $this->subheader;
    }

    /**
     * @param string $subheader
     */
    public function setSubheader(string $subheader)
    {
        $this->subheader = $subheader;
    }

    /**
     * @return string
     */
    public function getHeaderLink(): string
    {
        return $this->headerLink;
    }

    /**
     * @param string $headerLink
     */
    public function setHeaderLink(string $headerLink)
    {
        $this->headerLink = $headerLink;
    }

    /**
     * @return string
     */
    public function getHeaderLayout(): string
    {
        return $this->headerLayout;
    }

    /**
     * @param string $headerLayout
     */
    public function setHeaderLayout(string $headerLayout)
    {
        $this->headerLayout = $headerLayout;
    }

    /**
     * @return string
     */
    public function getBodytext(): string
    {
        return $this->bodytext;
    }

    /**
     * @param string $bodytext
     */
    public function setBodytext(string $bodytext)
    {
        $this->bodytext = $bodytext;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getImage(): ObjectStorage
    {
        return $this->image;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $image
     */
    public function setImage(ObjectStorage $image)
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getImagewidth(): int
    {
        return $this->imagewidth;
    }

    /**
     * @param int $imagewidth
     */
    public function setImagewidth(int $imagewidth)
    {
        $this->imagewidth = $imagewidth;
    }

    /**
     * @return int
     */
    public function getImageorient(): int
    {
        return $this->imageorient;
    }

    /**
     * @param int $imageorient
     */
    public function setImageorient(int $imageorient)
    {
        $this->imageorient = $imageorient;
    }

    /**
     * @return int
     */
    public function getImagecols(): int
    {
        return $this->imagecols;
    }

    /**
     * @param int $imagecols
     */
    public function setImagecols(int $imagecols)
    {
        $this->imagecols = $imagecols;
    }

    /**
     * @return int
     */
    public function getImageborder(): int
    {
        return $this->imageborder;
    }

    /**
     * @param int $imageborder
     */
    public function setImageborder(int $imageborder)
    {
        $this->imageborder = $imageborder;
    }

    /**
     * @return int
     */
    public function getImageheight(): int
    {
        return $this->imageheight;
    }

    /**
     * @param int $imageheight
     */
    public function setImageheight(int $imageheight)
    {
        $this->imageheight = $imageheight;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getMedia(): ObjectStorage
    {
        return $this->media;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $media
     */
    public function setMedia(ObjectStorage $media)
    {
        $this->media = $media;
    }

    /**
     * @return string
     */
    public function getLayout(): string
    {
        return $this->layout;
    }

    /**
     * @param string $layout
     */
    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }

    /**
     * @return string
     */
    public function getCtype(): string
    {
        return strtolower($this->ctype);
    }

    /**
     * @param string $ctype
     */
    public function setCtype(string $ctype)
    {
        $this->ctype = $ctype;
    }

    /**
     * @return int
     */
    public function getColPos(): int
    {
        return $this->colPos;
    }

    /**
     * @param int $colPos
     */
    public function setColPos(int $colPos)
    {
        $this->colPos = $colPos;
    }

    /**
     * @return string
     */
    public function getL18nDiffsource(): string
    {
        return $this->l18nDiffsource;
    }

    /**
     * @param string $l18nDiffsource
     */
    public function setL18nDiffsource(string $l18nDiffsource)
    {
        $this->l18nDiffsource = $l18nDiffsource;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories
     */
    public function setCategories(ObjectStorage $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return string
     */
    public function getFeGroup(): string
    {
        return $this->feGroup;
    }

    /**
     * @param string $feGroup
     */
    public function setFeGroup(string $feGroup)
    {
        $this->feGroup = $feGroup;
    }

}

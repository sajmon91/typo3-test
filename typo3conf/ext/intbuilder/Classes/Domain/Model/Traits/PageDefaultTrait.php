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

use Int\Intbuilder\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Annotation as Extbase;

/**
 * This model represents a Page Default trait, basically inherited from Fluid
 */
trait PageDefaultTrait
{

    /**
     * sorting
     *
     * @var int
     * @Extbase\Validate("NotEmpty")
     */
    protected int $sorting = 0;

    /**
     * subtitle
     *
     * @var string
     *
     */
    protected string $subtitle = '';

    /**
     * doktype
     *
     * @var integer
     *
     */
    protected $doktype = 0;

    /**
     * userid
     *
     * @var integer
     */
    protected $userid = 0;

    /**
     * groupid
     *
     * @var integer
     */
    protected $groupid = 0;

    /**
     * permsuser
     *
     * @var integer
     */
    protected $permsuser = 0;

    /**
     * permsgroup
     *
     * @var integer
     */
    protected $permsgroup = 0;

    /**
     * permseverybody
     *
     * @var integer
     */
    protected $permseverybody = 0;

    /**
     * crdate
     *
     * @var integer
     */
    protected $crdate = 0;

    /**
     * tstamp
     *
     * @var integer
     */
    protected $tstamp = 0;

    /**
     * deleted
     *
     * @var boolean
     */
    protected $deleted = false;

    /**
     * hidden=0
     *
     * @var boolean
     */
    protected $hidden = false;

    /**
     * navHide=0
     *
     * @var boolean
     */
    protected $navHide = false;

    /**
     * starttime
     *
     * @var integer
     */
    protected $starttime = 0;

    /**
     * endtime
     *
     * @var integer
     */
    protected $endtime = 0;

    /**
     * extendToSubpages=0
     *
     * @var boolean
     */
    protected $extendToSubpages = false;

    /**
     * abstract
     *
     * @var string
     *
     */
    protected $abstract;

    /**
     * feLoginMode
     *
     * @var string
     *
     */
    protected $feLoginMode;

    /**
     * keywords
     *
     * @var string
     *
     */
    protected $keywords;

    /**
     * description
     *
     * @var string
     *
     */
    protected $description;

    /**
     * author
     *
     * @var string
     *
     */
    protected $author;

    /**
     * authorEmail
     *
     * @var string
     *
     */
    protected $authorEmail;

    /**
     * lastUpdated
     *
     * @var integer
     */
    protected $lastUpdated = 0;

    /**
     * layout
     *
     * @var string
     */
    protected $layout;

    /**
     * newUntil
     *
     * @var integer
     */
    protected $newUntil = 0;

    /**
     * backendLayoutNextLevel
     *
     * @var string
     *
     */
    protected $backendLayoutNextLevel;

    /**
     * contentFromPid
     *
     * @var string
     *
     */
    protected $contentFromPid;

    /**
     * alias
     *
     * @var string
     *
     */
    protected $alias;

    /**
     * target
     *
     * @var string
     *
     */
    protected $target;

    /**
     * urlScheme
     *
     * @var string
     *
     */
    protected $urlScheme;

    /**
     * cacheTimeout
     *
     * @var string
     *
     */
    protected $cacheTimeout;

    /**
     * cacheTags
     *
     * @var string
     *
     */
    protected $cacheTags;

    /**
     * noCache=0
     *
     * @var boolean
     *
     */
    protected $noCache = false;

    /**
     * isSiteroot=0
     *
     * @var boolean
     *
     */
    protected $isSiteroot = false;

    /**
     * noSearch=0
     *
     * @var boolean
     *
     */
    protected $noSearch = false;

    /**
     * editlock=0
     *
     * @var boolean
     *
     */
    protected $editlock = false;

    /**
     * phpTreeStop=0
     *
     * @var boolean
     *
     */
    protected $phpTreeStop = false;

    /**
     * module
     *
     * @var string
     *
     */
    protected $module;

    /**
     * categories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $categories = null;

    /**
     * media
     *
     * @var \Int\Intbuilder\Domain\Model\FileReference
     */
    protected $media = null;

    /**
     * Returns the sorting
     *
     * @return int $sorting
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * Returns the subtitle
     *
     * @return string $subtitle
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Returns the userid
     *
     * @return integer $userid
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Sets the userid
     *
     * @param integer $userid
     *
     * @return void
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * Returns the doktype
     *
     * @return string $doktype
     */
    public function getDoktype()
    {
        return $this->doktype;
    }

    /**
     * Sets the doktype
     *
     * @param integer $doktype
     *
     * @return void
     */
    public function setDoktype($doktype)
    {
        $this->doktype = $doktype;
    }

    /**
     * Returns the groupid
     *
     * @return integer $groupid
     */
    public function getGroupid()
    {
        return $this->groupid;
    }

    /**
     * Sets the groupid
     *
     * @param integer $groupid
     *
     * @return void
     */
    public function setGroupid($groupid)
    {
        $this->groupid = $groupid;
    }

    /**
     * Returns the permsuser
     *
     * @return integer $permsuser
     */
    public function getPermsuser()
    {
        return $this->permsuser;
    }

    /**
     * Sets the permsuser
     *
     * @param integer $permsuser
     *
     * @return void
     */
    public function setPermsuser($permsuser)
    {
        $this->permsuser = $permsuser;
    }

    /**
     * Returns the permsgroup
     *
     * @return integer $permsgroup
     */
    public function getPermsgroup()
    {
        return $this->permsgroup;
    }

    /**
     * Sets the permsgroup
     *
     * @param integer $permsgroup
     *
     * @return void
     */
    public function setPermsgroup($permsgroup)
    {
        $this->permsgroup = $permsgroup;
    }

    /**
     * Returns the permseverybody
     *
     * @return integer $permseverybody
     */
    public function getPermseverybody()
    {
        return $this->permseverybody;
    }

    /**
     * Sets the permseverybody
     *
     * @param integer $permseverybody
     *
     * @return void
     */
    public function setPermseverybody($permseverybody)
    {
        $this->permseverybody = $permseverybody;
    }

    /**
     * Returns the boolean state of deleted
     *
     * @return boolean
     */
    public function isDeleted()
    {
        return $this->getDeleted();
    }

    /**
     * Returns the deleted
     *
     * @return boolean $deleted
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the deleted
     *
     * @param boolean $deleted
     *
     * @return void
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * Returns the boolean state of hidden
     *
     * @return boolean
     */
    public function isHidden()
    {
        return $this->getHidden();
    }

    /**
     * Returns hidden
     *
     * @return boolean $hidden
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Sets hidden
     *
     * @param boolean $hidden
     *
     * @return void
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * @return boolean
     */
    public function isNavHide()
    {
        return $this->navHide;
    }

    /**
     * @param boolean $navHide
     *
     * @return void
     */
    public function setNavHide($navHide)
    {
        $this->navHide = $navHide;
    }

    /**
     * @return int
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * @param int $starttime
     *
     * @return void
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;
    }

    /**
     * @return int
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * @param int $endtime
     *
     * @return void
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;
    }

    /**
     * @return boolean
     */
    public function isExtendToSubpages()
    {
        return $this->extendToSubpages;
    }

    /**
     * @param boolean $extendToSubpages
     *
     * @return void
     */
    public function setExtendToSubpages($extendToSubpages)
    {
        $this->extendToSubpages = $extendToSubpages;
    }

    /**
     * @return string
     */
    public function getFeLoginMode()
    {
        return $this->feLoginMode;
    }

    /**
     * @param string $feLoginMode
     *
     * @return void
     */
    public function setFeLoginMode($feLoginMode)
    {
        $this->feLoginMode = $feLoginMode;
    }

    /**
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * @param string $abstract
     *
     * @return void
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     *
     * @return void
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     *
     * @return void
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * @param string $authorEmail
     *
     * @return void
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
    }

    /**
     * @return int
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param int $lastUpdated
     *
     * @return void
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
    }

    /**
     * @return string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param string $layout
     *
     * @return void
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @return int
     */
    public function getNewUntil()
    {
        return $this->newUntil;
    }

    /**
     * @param int $newUntil
     *
     * @return void
     */
    public function setNewUntil($newUntil)
    {
        $this->newUntil = $newUntil;
    }

    /**
     * @return string
     */
    public function getBackendLayoutNextLevel()
    {
        return $this->backendLayoutNextLevel;
    }

    /**
     * @param string $backendLayoutNextLevel
     *
     * @return void
     */
    public function setBackendLayoutNextLevel($backendLayoutNextLevel)
    {
        $this->backendLayoutNextLevel = $backendLayoutNextLevel;
    }

    /**
     * Check if the current page has a value in the DB field "backend_layout"
     * if empty, check the root line for "backend_layout_next_level"
     *
     * @return string
     */
    public function getActualBackendLayout()
    {
        return Globals::getTsfe()->cObj->getData('pagelayout');
    }

    /**
     * @return string
     */
    public function getContentFromPid()
    {
        return $this->contentFromPid;
    }

    /**
     * @param string $contentFromPid
     *
     * @return void
     */
    public function setContentFromPid($contentFromPid)
    {
        $this->contentFromPid = $contentFromPid;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     *
     * @return void
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param string $target
     *
     * @return void
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getUrlScheme()
    {
        return $this->urlScheme;
    }

    /**
     * @param string $urlScheme
     *
     * @return void
     */
    public function setUrlScheme($urlScheme)
    {
        $this->urlScheme = $urlScheme;
    }

    /**
     * @return string
     */
    public function getCacheTimeout()
    {
        return $this->cacheTimeout;
    }

    /**
     * @param string $cacheTimeout
     *
     * @return void
     */
    public function setCacheTimeout($cacheTimeout)
    {
        $this->cacheTimeout = $cacheTimeout;
    }

    /**
     * @return string
     */
    public function getCacheTags()
    {
        return $this->cacheTags;
    }

    /**
     * @param string $cacheTags
     *
     * @return void
     */
    public function setCacheTags($cacheTags)
    {
        $this->cacheTags = $cacheTags;
    }

    /**
     * @return boolean
     */
    public function isNoCache()
    {
        return $this->noCache;
    }

    /**
     * @param boolean $noCache
     *
     * @return void
     */
    public function setNoCache($noCache)
    {
        $this->noCache = $noCache;
    }

    /**
     * @return boolean
     */
    public function isIsSiteroot()
    {
        return $this->isSiteroot;
    }

    /**
     * @param boolean $isSiteroot
     *
     * @return void
     */
    public function setIsSiteroot($isSiteroot)
    {
        $this->isSiteroot = $isSiteroot;
    }

    /**
     * @return boolean
     */
    public function isNoSearch()
    {
        return $this->noSearch;
    }

    /**
     * @param boolean $noSearch
     *
     * @return void
     */
    public function setNoSearch($noSearch)
    {
        $this->noSearch = $noSearch;
    }

    /**
     * @return boolean
     */
    public function isEditlock()
    {
        return $this->editlock;
    }

    /**
     * @param boolean $editlock
     *
     * @return void
     */
    public function setEditlock($editlock)
    {
        $this->editlock = $editlock;
    }

    /**
     * @return boolean
     */
    public function isPhpTreeStop()
    {
        return $this->phpTreeStop;
    }

    /**
     * @param boolean $phpTreeStop
     *
     * @return void
     */
    public function setPhpTreeStop($phpTreeStop)
    {
        $this->phpTreeStop = $phpTreeStop;
    }

    /**
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param string $module
     *
     * @return void
     */
    public function setModule($module)
    {
        $this->module = $module;
    }

    /**
     * Returns the media field
     *
     * @return \Int\Intbuilder\Domain\Model\FileReference $functionsLeftImage
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Sets the media field
     *
     * @param \Int\Intbuilder\Domain\Model\FileReference $media
     *
     * @return void
     */
    public function setMedia(FileReference $media)
    {
        $this->media = $media;
    }

    /**
     * @return int
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * @param int $tstamp
     *
     * @return void
     */
    public function setTstamp($tstamp)
    {
        $this->tstamp = $tstamp;
    }

    /**
     * @return int
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * @param int $crdate
     *
     * @return void
     */
    public function setCrdate($crdate)
    {
        $this->crdate = $crdate;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getCategories()
    {
        return $this->categories;
    }

}

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

/**
 * This model represents a Nav Page trait
 */
trait RootPageTrait
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\PagesNav>|null
     */
    protected ?ObjectStorage $intTopPages = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\PagesNav>|null
     */
    protected ?ObjectStorage $intBottomPages1 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\PagesNav>|null
     */
    protected ?ObjectStorage $intBottomPages2 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\PagesNav>|null
     */
    protected ?ObjectStorage $intBottomPages3 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\PagesNav>|null
     */
    protected ?ObjectStorage $intBottomPages4 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intIcons1 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intIcons2 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intIcons3 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intIcons4 = null;

    /**
     * @var string|null
     */
    protected $intHeader1 = '';

    /**
     * @var string|null
     */
    protected $intHeader2 = '';

    /**
     * @var string|null
     */
    protected $intHeader3 = '';

    /**
     * @var string|null
     */
    protected $intHeader4 = '';

    /**
     * @var int
     */
    protected $intHeaderDesktop = 1;

    /**
     * @var int
     */
    protected $intHeaderMobile = 1;

    /**
     * @var int
     */
    protected $intFooterDesktop = 1;

    /**
     * @var int
     */
    protected $intFooterMobile = 1;

    /**
     * @return string|null
     */
    public function getIntTopPages(): ?string
    {
        $uidArray = [];
        foreach ($this->intTopPages as $singlePage) {
            $uidArray[] = $singlePage->getUid();
        }
        return implode(',', $uidArray);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intTopPages
     *
     * @return self
     */
    public function setIntTopPages(?ObjectStorage $intTopPages): self
    {
        $this->intTopPages = $intTopPages;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIntBottomPages1(): ?string
    {
        $uidArray = [];
        foreach ($this->intBottomPages1 as $singlePage) {
            $uidArray[] = $singlePage->getUid();
        }
        return implode(',', $uidArray);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intBottomPages1
     *
     * @return self
     */
    public function setIntBottomPages1(?ObjectStorage $intBottomPages1): self
    {
        $this->intBottomPages1 = $intBottomPages1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIntBottomPages2(): ?string
    {
        $uidArray = [];
        foreach ($this->intBottomPages2 as $singlePage) {
            $uidArray[] = $singlePage->getUid();
        }
        return implode(',', $uidArray);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intBottomPages2
     *
     * @return self
     */
    public function setIntBottomPages2(?ObjectStorage $intBottomPages2): self
    {
        $this->intBottomPages2 = $intBottomPages2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIntBottomPages3(): ?string
    {
        $uidArray = [];
        foreach ($this->intBottomPages3 as $singlePage) {
            $uidArray[] = $singlePage->getUid();
        }
        return implode(',', $uidArray);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intBottomPages3
     *
     * @return self
     */
    public function setIntBottomPages3(?ObjectStorage $intBottomPages3): self
    {
        $this->intBottomPages3 = $intBottomPages3;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIntBottomPages4(): ?string
    {
        $uidArray = [];
        foreach ($this->intBottomPages4 as $singlePage) {
            $uidArray[] = $singlePage->getUid();
        }
        return implode(',', $uidArray);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intBottomPages4
     *
     * @return self
     */
    public function setIntBottomPages4(?ObjectStorage $intBottomPages4): self
    {
        $this->intBottomPages4 = $intBottomPages4;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIcons1(): ?ObjectStorage
    {
        return $this->intIcons1;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIcons1
     */
    public function setIntIcons1(?ObjectStorage $intIcons1): void
    {
        $this->intIcons1 = $intIcons1;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIcons2(): ?ObjectStorage
    {
        return $this->intIcons2;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIcons2
     */
    public function setIntIcons2(?ObjectStorage $intIcons2): void
    {
        $this->intIcons2 = $intIcons2;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIcons3(): ?ObjectStorage
    {
        return $this->intIcons3;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIcons3
     */
    public function setIntIcons3(?ObjectStorage $intIcons3): void
    {
        $this->intIcons3 = $intIcons3;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIcons4(): ?ObjectStorage
    {
        return $this->intIcons4;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIcons4
     */
    public function setIntIcons4(?ObjectStorage $intIcons4): void
    {
        $this->intIcons4 = $intIcons4;
    }

    /**
     * @return string|null
     */
    public function getIntHeader1(): ?string
    {
        return $this->intHeader1;
    }

    /**
     * @param string|null $intHeader1
     */
    public function setIntHeader1(?string $intHeader1): void
    {
        $this->intHeader1 = $intHeader1;
    }

    /**
     * @return string|null
     */
    public function getIntHeader2(): ?string
    {
        return $this->intHeader2;
    }

    /**
     * @param string|null $intHeader2
     */
    public function setIntHeader2(?string $intHeader2): void
    {
        $this->intHeader2 = $intHeader2;
    }

    /**
     * @return string|null
     */
    public function getIntHeader3(): ?string
    {
        return $this->intHeader3;
    }

    /**
     * @param string|null $intHeader3
     */
    public function setIntHeader3(?string $intHeader3): void
    {
        $this->intHeader3 = $intHeader3;
    }

    /**
     * @return string|null
     */
    public function getIntHeader4(): ?string
    {
        return $this->intHeader4;
    }

    /**
     * @param string|null $intHeader4
     */
    public function setIntHeader4(?string $intHeader4): void
    {
        $this->intHeader4 = $intHeader4;
    }

    /**
     * @return int
     */
    public function getIntHeaderDesktop(): int
    {
        if (!$this->intHeaderDesktop) {
            return 1;
        }
        return $this->intHeaderDesktop;
    }

    /**
     * @param int $intHeaderDesktop
     */
    public function setIntHeaderDesktop(int $intHeaderDesktop): void
    {
        $this->intHeaderDesktop = $intHeaderDesktop;
    }

    /**
     * @return int
     */
    public function getIntHeaderMobile(): int
    {
        if (!$this->intHeaderMobile) {
            return 1;
        }
        return $this->intHeaderMobile;
    }

    /**
     * @param int $intHeaderMobile
     */
    public function setIntHeaderMobile(int $intHeaderMobile): void
    {
        $this->intHeaderMobile = $intHeaderMobile;
    }

    /**
     * @return int
     */
    public function getIntFooterDesktop(): int
    {
        if (!$this->intFooterDesktop) {
            return 1;
        }
        return $this->intFooterDesktop;
    }

    /**
     * @param int $intFooterDesktop
     */
    public function setIntFooterDesktop(int $intFooterDesktop): void
    {
        $this->intFooterDesktop = $intFooterDesktop;
    }

    /**
     * @return int
     */
    public function getIntFooterMobile(): int
    {
        if (!$this->intFooterMobile) {
            return 1;
        }
        return $this->intFooterMobile;
    }

    /**
     * @param int $intFooterMobile
     */
    public function setIntFooterMobile(int $intFooterMobile): void
    {
        $this->intFooterMobile = $intFooterMobile;
    }

}

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
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * This model represents a content element
 */
trait ContentIntTrait
{

    /**
     * @var string
     */
    protected string $intWidthContainer = '';

    /**
     * @var string
     */
    protected string $intBackgroundColor = '';

    /**
     * @var string
     */
    protected string $intColumnCount = '';

    /**
     * @var string
     */
    protected string $intImagePosition = '';

    /**
     * @var string
     */
    protected string $intIdentifier = '';

    /**
     * @var string
     */
    protected string $intHeader1 = '';

    /**
     * @var string
     */
    protected string $intHeader2 = '';

    /**
     * @var string
     */
    protected string $intHeader3 = '';

    /**
     * @var string
     */
    protected string $intSubheader1 = '';

    /**
     * @var string
     */
    protected string $intSubheader2 = '';

    /**
     * @var string
     */
    protected string $intSubheader3 = '';

    /**
     * @var string
     */
    protected string $intLead1 = '';

    /**
     * @var string
     */
    protected string $intLead2 = '';

    /**
     * @var string
     */
    protected string $intLead3 = '';

    /**
     * @var string
     */
    protected string $intText1 = '';

    /**
     * @var string
     */
    protected string $intText2 = '';

    /**
     * @var string
     */
    protected string $intText3 = '';

    /**
     * @var string
     */
    protected string $intLinkPhone1 = '';

    /**
     * @var string
     */
    protected string $intLinkPhone2 = '';

    /**
     * @var string
     */
    protected string $intLinkPhone3 = '';

    /**
     * @var string
     */
    protected string $intLinkMail1 = '';

    /**
     * @var string
     */
    protected string $intLinkMail2 = '';

    /**
     * @var string
     */
    protected string $intLinkMail3 = '';

    /**
     * @var string
     */
    protected string $intLinkExternal1 = '';

    /**
     * @var string
     */
    protected string $intLinkExternal2 = '';

    /**
     * @var string
     */
    protected string $intLinkExternal3 = '';

    /**
     * @var string
     */
    protected string $intLinkPage1 = '';

    /**
     * @var string
     */
    protected string $intLinkPage2 = '';

    /**
     * @var string
     */
    protected string $intLinkPage3 = '';

    /**
     * @var string
     */
    protected string $intLinkFile1 = '';

    /**
     * @var string
     */
    protected string $intLinkFile2 = '';

    /**
     * @var string
     */
    protected string $intLinkFile3 = '';

    /**
     * @var string
     */
    protected string $intLink1 = '';

    /**
     * @var string
     */
    protected string $intLink2 = '';

    /**
     * @var string
     */
    protected string $intLink3 = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intImage1 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intImage2 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intImage3 = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $intImage1Current = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $intImage2Current = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $intImage3Current = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intVideo1 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intVideo2 = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\FileReference>|null
     */
    protected ?ObjectStorage $intVideo3 = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $intVideo1Current = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $intVideo2Current = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $intVideo3Current = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $intVideo1Poster = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $intVideo2Poster = null;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     */
    protected ?FileReference $intVideo3Poster = null;

    /**
     * @var int
     */
    protected int $intNumber1 = 0;

    /**
     * @var int
     */
    protected int $intNumber2 = 0;

    /**
     * @var int
     */
    protected int $intNumber3 = 0;

    /**
     * @var float
     */
    protected float $intFloat1 = 0.00;

    /**
     * @var float
     */
    protected float $intFloat2 = 0.00;

    /**
     * @var float
     */
    protected float $intFloat3 = 0.00;

    /**
     * @var string
     */
    protected string $intSelect1 = '';

    /**
     * @var string
     */
    protected string $intSelect2 = '';

    /**
     * @var string
     */
    protected string $intSelect3 = '';

    /**
     * @var bool
     */
    protected bool $intCheckbox1 = false;

    /**
     * @var bool
     */
    protected bool $intCheckbox2 = false;

    /**
     * @var bool
     */
    protected bool $intCheckbox3 = false;

    /**
     * @return string
     */
    public function getIntWidthContainer(): ?string
    {
        return $this->intWidthContainer;
    }

    /**
     * @param string $intWidthContainer
     *
     * @return self
     */
    public function setIntWidthContainer(string $intWidthContainer): self
    {
        $this->intWidthContainer = $intWidthContainer;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntBackgroundColor(): ?string
    {
        return $this->intBackgroundColor;
    }

    /**
     * @param string $intBackgroundColor
     *
     * @return self
     */
    public function setIntBackgroundColor(string $intBackgroundColor): self
    {
        $this->intBackgroundColor = $intBackgroundColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntImagePosition(): string
    {
        return $this->intImagePosition;
    }

    /**
     * @param string $intImagePosition
     */
    public function setIntImagePosition(string $intImagePosition): void
    {
        $this->intImagePosition = $intImagePosition;
    }

    /**
     * @return string
     */
    public function getIntColumnCount(): string
    {
        return $this->intColumnCount;
    }

    /**
     * @param string $intColumnCount
     */
    public function setIntColumnCount(string $intColumnCount): void
    {
        $this->intColumnCount = $intColumnCount;
    }

    /**
     * @return string
     */
    public function getIntIdentifier(): string
    {
        if (!$this->intIdentifier) {
            return $this->intHeader1;
        }
        return $this->intIdentifier;
    }

    /**
     * @param string $intIdentifier
     */
    public function setIntIdentifier(string $intIdentifier): void
    {
        $this->intIdentifier = $intIdentifier;
    }

    /**
     * @return string
     */
    public function getIntHeader1(): ?string
    {
        return $this->intHeader1;
    }

    /**
     * @param string $intHeader1
     *
     * @return self
     */
    public function setIntHeader1(string $intHeader1): self
    {
        $this->intHeader1 = $intHeader1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntHeader2(): ?string
    {
        return $this->intHeader2;
    }

    /**
     * @param string $intHeader2
     *
     * @return self
     */
    public function setIntHeader2(string $intHeader2): self
    {
        $this->intHeader2 = $intHeader2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntHeader3(): ?string
    {
        return $this->intHeader3;
    }

    /**
     * @param string $intHeader3
     *
     * @return self
     */
    public function setIntHeader3(string $intHeader3): self
    {
        $this->intHeader3 = $intHeader3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntSubheader1(): ?string
    {
        return $this->intSubheader1;
    }

    /**
     * @param string $intSubheader1
     *
     * @return self
     */
    public function setIntSubheader1(string $intSubheader1): self
    {
        $this->intSubheader1 = $intSubheader1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntSubheader2(): ?string
    {
        return $this->intSubheader2;
    }

    /**
     * @param string $intSubheader2
     *
     * @return self
     */
    public function setIntSubheader2(string $intSubheader2): self
    {
        $this->intSubheader2 = $intSubheader2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntSubheader3(): ?string
    {
        return $this->intSubheader3;
    }

    /**
     * @param string $intSubheader3
     *
     * @return self
     */
    public function setIntSubheader3(string $intSubheader3): self
    {
        $this->intSubheader3 = $intSubheader3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLead1(): ?string
    {
        return $this->intLead1;
    }

    /**
     * @param string $intLead1
     *
     * @return self
     */
    public function setIntLead1(string $intLead1): self
    {
        $this->intLead1 = $intLead1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLead2(): ?string
    {
        return $this->intLead2;
    }

    /**
     * @param string $intLead2
     *
     * @return self
     */
    public function setIntLead2(string $intLead2): self
    {
        $this->intLead2 = $intLead2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLead3(): ?string
    {
        return $this->intLead3;
    }

    /**
     * @param string $intLead3
     *
     * @return self
     */
    public function setIntLead3(string $intLead3): self
    {
        $this->intLead3 = $intLead3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntText1(): ?string
    {
        return $this->intText1;
    }

    /**
     * @param string $intText1
     *
     * @return self
     */
    public function setIntText1(string $intText1): self
    {
        $this->intText1 = $intText1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntText2(): ?string
    {
        return $this->intText2;
    }

    /**
     * @param string $intText2
     *
     * @return self
     */
    public function setIntText2(string $intText2): self
    {
        $this->intText2 = $intText2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntText3(): ?string
    {
        return $this->intText3;
    }

    /**
     * @param string $intText3
     *
     * @return self
     */
    public function setIntText3(string $intText3): self
    {
        $this->intText3 = $intText3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkPhone1(): ?string
    {
        return $this->intLinkPhone1;
    }

    /**
     * @param string $intLinkPhone1
     *
     * @return self
     */
    public function setIntLinkPhone1(string $intLinkPhone1): self
    {
        $this->intLinkPhone1 = $intLinkPhone1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkPhone2(): ?string
    {
        return $this->intLinkPhone2;
    }

    /**
     * @param string $intLinkPhone2
     *
     * @return self
     */
    public function setIntLinkPhone2(string $intLinkPhone2): self
    {
        $this->intLinkPhone2 = $intLinkPhone2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkPhone3(): ?string
    {
        return $this->intLinkPhone3;
    }

    /**
     * @param string $intLinkPhone3
     *
     * @return self
     */
    public function setIntLinkPhone3(string $intLinkPhone3): self
    {
        $this->intLinkPhone3 = $intLinkPhone3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkMail1(): ?string
    {
        return $this->intLinkMail1;
    }

    /**
     * @param string $intLinkMail1
     *
     * @return self
     */
    public function setIntLinkMail1(string $intLinkMail1): self
    {
        $this->intLinkMail1 = $intLinkMail1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkMail2(): ?string
    {
        return $this->intLinkMail2;
    }

    /**
     * @param string $intLinkMail2
     *
     * @return self
     */
    public function setIntLinkMail2(string $intLinkMail2): self
    {
        $this->intLinkMail2 = $intLinkMail2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkMail3(): ?string
    {
        return $this->intLinkMail3;
    }

    /**
     * @param string $intLinkMail3
     *
     * @return self
     */
    public function setIntLinkMail3(string $intLinkMail3): self
    {
        $this->intLinkMail3 = $intLinkMail3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkExternal1(): ?string
    {
        return $this->intLinkExternal1;
    }

    /**
     * @param string $intLinkExternal1
     *
     * @return self
     */
    public function setIntLinkExternal1(string $intLinkExternal1): self
    {
        $this->intLinkExternal1 = $intLinkExternal1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkExternal2(): ?string
    {
        return $this->intLinkExternal2;
    }

    /**
     * @param string $intLinkExternal2
     *
     * @return self
     */
    public function setIntLinkExternal2(string $intLinkExternal2): self
    {
        $this->intLinkExternal2 = $intLinkExternal2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkExternal3(): ?string
    {
        return $this->intLinkExternal3;
    }

    /**
     * @param string $intLinkExternal3
     *
     * @return self
     */
    public function setIntLinkExternal3(string $intLinkExternal3): self
    {
        $this->intLinkExternal3 = $intLinkExternal3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkPage1(): ?string
    {
        return $this->intLinkPage1;
    }

    /**
     * @param string $intLinkPage1
     *
     * @return self
     */
    public function setIntLinkPage1(string $intLinkPage1): self
    {
        $this->intLinkPage1 = $intLinkPage1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkPage2(): ?string
    {
        return $this->intLinkPage2;
    }

    /**
     * @param string $intLinkPage2
     *
     * @return self
     */
    public function setIntLinkPage2(string $intLinkPage2): self
    {
        $this->intLinkPage2 = $intLinkPage2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkPage3(): ?string
    {
        return $this->intLinkPage3;
    }

    /**
     * @param string $intLinkPage3
     *
     * @return self
     */
    public function setIntLinkPage3(string $intLinkPage3): self
    {
        $this->intLinkPage3 = $intLinkPage3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkFile1(): ?string
    {
        return $this->intLinkFile1;
    }

    /**
     * @param string $intLinkFile1
     *
     * @return self
     */
    public function setIntLinkFile1(string $intLinkFile1): self
    {
        $this->intLinkFile1 = $intLinkFile1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkFile2(): ?string
    {
        return $this->intLinkFile2;
    }

    /**
     * @param string $intLinkFile2
     *
     * @return self
     */
    public function setIntLinkFile2(string $intLinkFile2): self
    {
        $this->intLinkFile2 = $intLinkFile2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLinkFile3(): ?string
    {
        return $this->intLinkFile3;
    }

    /**
     * @param string $intLinkFile3
     *
     * @return self
     */
    public function setIntLinkFile3(string $intLinkFile3): self
    {
        $this->intLinkFile3 = $intLinkFile3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLink1(): ?string
    {
        return $this->intLink1;
    }

    /**
     * @param string $intLink1
     *
     * @return self
     */
    public function setIntLink1(string $intLink1): self
    {
        $this->intLink1 = $intLink1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLink2(): ?string
    {
        return $this->intLink2;
    }

    /**
     * @param string $intLink2
     *
     * @return self
     */
    public function setIntLink2(string $intLink2): self
    {
        $this->intLink2 = $intLink2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntLink3(): ?string
    {
        return $this->intLink3;
    }

    /**
     * @param string $intLink3
     *
     * @return self
     */
    public function setIntLink3(string $intLink3): self
    {
        $this->intLink3 = $intLink3;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getIntImage1(): ?ObjectStorage
    {
        return $this->intImage1;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $intImage1
     *
     * @return self
     */
    public function setIntImage1(ObjectStorage $intImage1): self
    {
        $this->intImage1 = $intImage1;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getIntImage2(): ?ObjectStorage
    {
        return $this->intImage2;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $intImage2
     *
     * @return self
     */
    public function setIntImage2(ObjectStorage $intImage2): self
    {
        $this->intImage2 = $intImage2;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getIntImage3(): ?ObjectStorage
    {
        return $this->intImage3;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $intImage3
     *
     * @return self
     */
    public function setIntImage3(ObjectStorage $intImage3): self
    {
        $this->intImage3 = $intImage3;
        return $this;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference
     */
    public function getIntImage1Current(): ?FileReference
    {
        if ($this->intImage1 instanceof ObjectStorage && count($this->intImage1)) {
            $this->intImage1->rewind();
            return $this->intImage1->current();
        }
        return null;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference
     */
    public function getIntImage2Current(): ?FileReference
    {
        if ($this->intImage2 instanceof ObjectStorage && count($this->intImage2)) {
            $this->intImage2->rewind();
            return $this->intImage2->current();
        }
        return null;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference|null
     */
    public function getIntImage3Current(): ?FileReference
    {
        if ($this->intImage3 instanceof ObjectStorage && count($this->intImage3)) {
            $this->intImage3->rewind();
            return $this->intImage3->current();
        }
        return null;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getIntVideo1(): ?ObjectStorage
    {
        return $this->intVideo1;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $intVideo1
     *
     * @return self
     */
    public function setIntVideo1(ObjectStorage $intVideo1): self
    {
        $this->intVideo1 = $intVideo1;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getIntVideo2(): ?ObjectStorage
    {
        return $this->intVideo2;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $intVideo2
     *
     * @return self
     */
    public function setIntVideo2(ObjectStorage $intVideo2): self
    {
        $this->intVideo2 = $intVideo2;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getIntVideo3(): ?ObjectStorage
    {
        return $this->intVideo3;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $intVideo3
     *
     * @return self
     */
    public function setIntVideo3(ObjectStorage $intVideo3): self
    {
        $this->intVideo3 = $intVideo3;
        return $this;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference
     */
    public function getIntVideo1Current(): ?FileReference
    {
        if ($this->intVideo1 instanceof ObjectStorage && count($this->intVideo1)) {
            $this->intVideo1->rewind();
            return $this->intVideo1->current();
        }
        return null;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference
     */
    public function getIntVideo2Current(): ?FileReference
    {
        if ($this->intVideo2 instanceof ObjectStorage && count($this->intVideo2)) {
            $this->intVideo2->rewind();
            return $this->intVideo2->current();
        }
        return null;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference
     */
    public function getIntVideo3Current(): ?FileReference
    {
        if ($this->intVideo3 instanceof ObjectStorage && count($this->intVideo3)) {
            $this->intVideo3->rewind();
            return $this->intVideo3->current();
        }
        return null;
    }

    /**
     * @return int
     */
    public function getIntNumber1(): ?int
    {
        return $this->intNumber1;
    }

    /**
     * @param int $intNumber1
     *
     * @return self
     */
    public function setIntNumber1(int $intNumber1): self
    {
        $this->intNumber1 = $intNumber1;
        return $this;
    }

    /**
     * @return int
     */
    public function getIntNumber2(): ?int
    {
        return $this->intNumber2;
    }

    /**
     * @param int $intNumber2
     *
     * @return self
     */
    public function setIntNumber2(int $intNumber2): self
    {
        $this->intNumber2 = $intNumber2;
        return $this;
    }

    /**
     * @return int
     */
    public function getIntNumber3(): ?int
    {
        return $this->intNumber3;
    }

    /**
     * @param int $intNumber3
     *
     * @return self
     */
    public function setIntNumber3(int $intNumber3): self
    {
        $this->intNumber3 = $intNumber3;
        return $this;
    }

    /**
     * @return float
     */
    public function getIntFloat1(): ?float
    {
        return $this->intFloat1;
    }

    /**
     * @param float $intFloat1
     *
     * @return self
     */
    public function setIntFloat1(float $intFloat1): self
    {
        $this->intFloat1 = $intFloat1;
        return $this;
    }

    /**
     * @return float
     */
    public function getIntFloat2(): ?float
    {
        return $this->intFloat2;
    }

    /**
     * @param float $intFloat2
     *
     * @return self
     */
    public function setIntFloat2(float $intFloat2): self
    {
        $this->intFloat2 = $intFloat2;
        return $this;
    }

    /**
     * @return float
     */
    public function getIntFloat3(): ?float
    {
        return $this->intFloat3;
    }

    /**
     * @param float $intFloat3
     *
     * @return self
     */
    public function setIntFloat3(float $intFloat3): self
    {
        $this->intFloat3 = $intFloat3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntSelect1(): ?string
    {
        return $this->intSelect1;
    }

    /**
     * @param string $intSelect1
     *
     * @return self
     */
    public function setIntSelect1(string $intSelect1): self
    {
        $this->intSelect1 = $intSelect1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntSelect2(): ?string
    {
        return $this->intSelect2;
    }

    /**
     * @param string $intSelect2
     *
     * @return self
     */
    public function setIntSelect2(string $intSelect2): self
    {
        $this->intSelect2 = $intSelect2;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntSelect3(): ?string
    {
        return $this->intSelect3;
    }

    /**
     * @param string $intSelect3
     *
     * @return self
     */
    public function setIntSelect3(string $intSelect3): self
    {
        $this->intSelect3 = $intSelect3;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIntCheckbox1(): ?bool
    {
        return $this->intCheckbox1;
    }

    /**
     * @param bool $intCheckbox1
     *
     * @return self
     */
    public function setIntCheckbox1(bool $intCheckbox1): self
    {
        $this->intCheckbox1 = $intCheckbox1;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIntCheckbox2(): ?bool
    {
        return $this->intCheckbox2;
    }

    /**
     * @param bool $intCheckbox2
     *
     * @return self
     */
    public function setIntCheckbox2(bool $intCheckbox2): self
    {
        $this->intCheckbox2 = $intCheckbox2;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIntCheckbox3(): ?bool
    {
        return $this->intCheckbox3;
    }

    /**
     * @param bool $intCheckbox3
     *
     * @return self
     */
    public function setIntCheckbox3(bool $intCheckbox3): self
    {
        $this->intCheckbox3 = $intCheckbox3;
        return $this;
    }
}

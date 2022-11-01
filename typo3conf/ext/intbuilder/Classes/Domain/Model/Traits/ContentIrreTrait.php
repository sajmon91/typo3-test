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

use Int\Inthelper\Service\CategoryService;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * This model represents a content element
 */
trait ContentIrreTrait
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\Accordion>|null
     */
    protected ?ObjectStorage $intIrreAccordion = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\HeroSlider>|null
     */
    protected ?ObjectStorage $intIrreHeroslider = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\Tabs>|null
     */
    protected ?ObjectStorage $intIrreTabs = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\TeaserBox>|null
     */
    protected ?ObjectStorage $intIrreTeaserbox = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\TeaserBoxIcon>|null
     */
    protected ?ObjectStorage $intIrreTeaserboxicon = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\TeaserBoxImage>|null
     */
    protected ?ObjectStorage $intIrreTeaserboximage = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\Download>|null
     */
    protected ?ObjectStorage $intIrreDownload = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\Usp>|null
     */
    protected ?ObjectStorage $intIrreUsp = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\BoxTeaser>|null
     */
    protected ?ObjectStorage $intIrreBoxteaser = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\TeaserSliderBox>|null
     */
    protected ?ObjectStorage $intIrreTeasersliderbox = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\TeaserSliderImage>|null
     */
    protected ?ObjectStorage $intIrreTeasersliderimage = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\ItemTeaser>|null
     */
    protected ?ObjectStorage $intIrreItemteaser = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Int\Intbuilder\Domain\Model\Irre\References>|null
     */
    protected ?ObjectStorage $intIrreReferences = null;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreAccordion(): ?ObjectStorage
    {
        return $this->intIrreAccordion;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreAccordion
     */
    public function setIntIrreAccordion(?ObjectStorage $intIrreAccordion): void
    {
        $this->intIrreAccordion = $intIrreAccordion;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreHeroslider(): ?ObjectStorage
    {
        return $this->intIrreHeroslider;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreHeroslider
     */
    public function setIntIrreHeroslider(?ObjectStorage $intIrreHeroslider): void
    {
        $this->intIrreHeroslider = $intIrreHeroslider;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreTabs(): ?ObjectStorage
    {
        return $this->intIrreTabs;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreTabs
     */
    public function setIntIrreTabs(?ObjectStorage $intIrreTabs): void
    {
        $this->intIrreTabs = $intIrreTabs;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreTeaserbox(): ?ObjectStorage
    {
        return $this->intIrreTeaserbox;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreTeaserbox
     */
    public function setIntIrreTeaserbox(?ObjectStorage $intIrreTeaserbox): void
    {
        $this->intIrreTeaserbox = $intIrreTeaserbox;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreTeaserboxicon(): ?ObjectStorage
    {
        return $this->intIrreTeaserboxicon;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreTeaserboxicon
     */
    public function setIntIrreTeaserboxicon(?ObjectStorage $intIrreTeaserboxicon): void
    {
        $this->intIrreTeaserboxicon = $intIrreTeaserboxicon;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreTeaserboximage(): ?ObjectStorage
    {
        return $this->intIrreTeaserboximage;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreTeaserboximage
     */
    public function setIntIrreTeaserboximage(?ObjectStorage $intIrreTeaserboximage): void
    {
        $this->intIrreTeaserboximage = $intIrreTeaserboximage;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreDownload(): ?ObjectStorage
    {
        return $this->intIrreDownload;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreDownload
     */
    public function setIntIrreDownload(?ObjectStorage $intIrreDownload): void
    {
        $this->intIrreDownload = $intIrreDownload;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreUsp(): ?ObjectStorage
    {
        return $this->intIrreUsp;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreUsp
     */
    public function setIntIrreUsp(?ObjectStorage $intIrreUsp): void
    {
        $this->intIrreUsp = $intIrreUsp;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreBoxteaser(): ?ObjectStorage
    {
        return $this->intIrreBoxteaser;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreBoxteaser
     */
    public function setIntIrreBoxteaser(?ObjectStorage $intIrreBoxteaser): void
    {
        $this->intIrreBoxteaser = $intIrreBoxteaser;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreTeasersliderbox(): ?ObjectStorage
    {
        return $this->intIrreTeasersliderbox;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreTeasersliderbox
     */
    public function setIntIrreTeasersliderbox(?ObjectStorage $intIrreTeasersliderbox): void
    {
        $this->intIrreTeasersliderbox = $intIrreTeasersliderbox;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreTeasersliderimage(): ?ObjectStorage
    {
        return $this->intIrreTeasersliderimage;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreTeasersliderimage
     */
    public function setIntIrreTeasersliderimage(?ObjectStorage $intIrreTeasersliderimage): void
    {
        $this->intIrreTeasersliderimage = $intIrreTeasersliderimage;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreItemteaser(): ?ObjectStorage
    {
        return $this->intIrreItemteaser;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreItemteaser
     */
    public function setIntIrreItemteaser(?ObjectStorage $intIrreItemteaser): void
    {
        $this->intIrreItemteaser = $intIrreItemteaser;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreReferences(): ?ObjectStorage
    {
        return $this->intIrreReferences;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $intIrreReferences
     */
    public function setIntIrreReferences(?ObjectStorage $intIrreReferences): void
    {
        $this->intIrreReferences = $intIrreReferences;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreItemteaserCategories(): ?ObjectStorage
    {
        if (!count($this->intIrreItemteaser)) {
            return null;
        }

        $categories = new ObjectStorage();
        /** @var \Int\Intbuilder\Domain\Model\Irre\ItemTeaser $singleTeaser */
        foreach ($this->intIrreItemteaser as $singleTeaser) {
            $tags = $singleTeaser->getTags();
            if ($tags) {
                foreach ($tags as $singleTag) {
                    $categories->attach($singleTag);
                }
            }
        }

        return $categories;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
     */
    public function getIntIrreReferencesCategories(): ?ObjectStorage
    {
        if (!count($this->intIrreReferences)) {
            return null;
        }

        $categories = new ObjectStorage();
        /** @var \Int\Intbuilder\Domain\Model\Irre\References $singleReference */
        foreach ($this->intIrreReferences as $singleReference) {
            $tags = $singleReference->getTags();
            if ($tags) {
                foreach ($tags as $singleTag) {
                    $categories->attach($singleTag);
                }
            }
        }

        return $categories;
    }
}

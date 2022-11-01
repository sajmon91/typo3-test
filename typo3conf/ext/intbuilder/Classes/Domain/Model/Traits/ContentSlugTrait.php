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
trait ContentSlugTrait
{
    /**
     * @var string
     */
    protected string $txContentSlugFragment = '';

    /**
     * @var string
     */
    protected string $anchorIdentifier = '';

    /**
     * @var bool
     */
    protected bool $txContentSlugLink = false;

    /**
     * @return string
     */
    public function getTxContentSlugFragment(): string
    {
        if ($this->txContentSlugFragment) {
            return 'c'.$this->getUid().'-'.$this->txContentSlugFragment;
        }

        return $this->_getProperty('_localizedUid') ? 'c'.$this->_getProperty('_localizedUid') : 'c'.$this->getUid();
    }

    /**
     * @param string $txContentSlugFragment
     */
    public function setTxContentSlugFragment(string $txContentSlugFragment): void
    {
        $this->txContentSlugFragment = $txContentSlugFragment;
    }

    /**
     * @return bool
     */
    public function isTxContentSlugLink(): bool
    {
        return $this->txContentSlugLink;
    }

    /**
     * @param bool $txContentSlugLink
     */
    public function setTxContentSlugLink(bool $txContentSlugLink): void
    {
        $this->txContentSlugLink = $txContentSlugLink;
    }

    /**
     * @return string
     */
    public function getAnchorIdentifier(): string
    {
        if ($this->txContentSlugFragment) {
            return $this->getIntIdentifier();
        }
        return '';
    }
}

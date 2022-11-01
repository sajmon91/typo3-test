<?php
/**
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

namespace Int\Intbuilder\Domain\Model;

use Int\Intbuilder\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * This model represents a author
 */
class Author extends AbstractEntity
{
    /**
     * @var string
     */
    protected string $namePrefix = '';

    /**
     * @var string
     */
    protected string $firstName = '';

    /**
     * @var string
     */
    protected string $lastName = '';

    /**
     * @var string
     */
    protected string $authorPosition = '';

    /**
     * @var string
     */
    protected string $authorCompany = '';

    /**
     * @var string
     */
    protected string $email = '';

    /**
     * @var string
     */
    protected string $phone = '';

    /**
     * @var string
     */
    protected string $website = '';

    /**
     * @var string
     */
    protected string $linkedin = '';

    /**
     * @var string
     */
    protected string $xing = '';

    /**
     * @var int
     */
    protected int $authorType = 0;

    /**
     * @var \Int\Intbuilder\Domain\Model\FileReference|null
     *
     */
    protected ?FileReference $image = null;

    /**
     * @var string
     */
    protected string $fullName;

    /**
     * @return string
     */
    public function getNamePrefix(): string
    {
        return $this->namePrefix;
    }

    /**
     * @param string $namePrefix
     *
     * @return self
     */
    public function setNamePrefix(string $namePrefix): self
    {
        $this->namePrefix = $namePrefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorPosition(): string
    {
        return $this->authorPosition;
    }

    /**
     * @param string $authorPosition
     *
     * @return self
     */
    public function setAuthorPosition(string $authorPosition): self
    {
        $this->authorPosition = $authorPosition;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorCompany(): string
    {
        return $this->authorCompany;
    }

    /**
     * @param string $authorCompany
     *
     * @return \Int\Intbuilder\Domain\Model\Author
     */
    public function setAuthorCompany(string $authorCompany): self
    {
        $this->authorCompany = $authorCompany;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return self
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     *
     * @return self
     */
    public function setWebsite(string $website): self
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkedin(): string
    {
        return $this->linkedin;
    }

    /**
     * @param string $linkedin
     *
     * @return self
     */
    public function setLinkedin(string $linkedin): self
    {
        $this->linkedin = $linkedin;
        return $this;
    }

    /**
     * @return string
     */
    public function getXing(): string
    {
        return $this->xing;
    }

    /**
     * @param string $xing
     *
     * @return self
     */
    public function setXing(string $xing): self
    {
        $this->xing = $xing;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorType(): int
    {
        return $this->authorType;
    }

    /**
     * @param int $authorType
     *
     * @return self
     */
    public function setAuthorType(int $authorType): self
    {
        $this->authorType = $authorType;
        return $this;
    }

    /**
     * @return \Int\Intbuilder\Domain\Model\FileReference
     */
    public function getImage(): ?FileReference
    {
        return $this->image;
    }

    /**
     * @param \Int\Intbuilder\Domain\Model\FileReference $image
     *
     * @return self
     */
    public function setImage(FileReference $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        $nameArray   = [];
        $nameArray[] = $this->namePrefix;
        $nameArray[] = $this->firstName;
        $nameArray[] = $this->lastName;
        return implode(' ', $nameArray);
    }
}
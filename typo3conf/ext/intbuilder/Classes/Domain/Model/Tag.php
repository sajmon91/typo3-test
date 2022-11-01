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

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * This model represents a tag
 */
class Tag extends AbstractEntity
{

    /**
     * @var string
     */
    protected string $oid;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var integer
     */
    protected int $type;

    /**
     * @return string
     */
    public function getOid(): ?string
    {
        return $this->oid;
    }

    /**
     * @param string $oid
     *
     * @return self
     */
    public function setOid(string $oid): self
    {
        $this->oid = $oid;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int $type
     *
     * @return self
     */
    public function setType(int $type): self
    {
        $this->type = $type;
        return $this;
    }

}

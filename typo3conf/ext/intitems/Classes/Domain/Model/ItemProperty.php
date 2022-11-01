<?php

declare(strict_types=1);

namespace Int\Intitems\Domain\Model;


use Int\Inthelper\Domain\Model\Enum\PropertyType;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * This file is part of the "intitems" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Saša Stojanović <stojanovic@intention.rs>, Intention Digital
 */

/**
 * ItemProperty
 */
class ItemProperty extends AbstractEntity
{

    /**
     * valueLabel
     *
     * @var string
     */
    protected string $valueLabel = '';

    /**
     * valueType
     *
     * @var int
     */
    protected int $valueType = 0;

    /**
     * toggleItem
     *
     * @var bool
     */
    protected bool $toggleItem = false;

    /**
     * valueInt
     *
     * @var int
     */
    protected int $valueInt = 0;

    /**
     * valueFloat
     *
     * @var float
     */
    protected float $valueFloat = 0.0;

    /**
     * valueInput
     *
     * @var string
     */
    protected string $valueInput = '';

    /**
     * valueBool
     *
     * @var bool
     */
    protected bool $valueBool = false;

    /**
     * valueText
     *
     * @var string
     */
    protected string $valueText = '';

    /**
     * @return string
     */
    public function getValueLabel(): string
    {
        return $this->valueLabel;
    }

    /**
     * @param string $valueLabel
     */
    public function setValueLabel(string $valueLabel): void
    {
        $this->valueLabel = $valueLabel;
    }

    /**
     * @return int
     */
    public function getValueType(): int
    {
        return $this->valueType;
    }

    /**
     * @param int $valueType
     */
    public function setValueType(int $valueType): void
    {
        $this->valueType = $valueType;
    }

    /**
     * @return bool
     */
    public function isToggleItem(): bool
    {
        return $this->toggleItem;
    }

    /**
     * @param bool $toggleItem
     */
    public function setToggleItem(bool $toggleItem): void
    {
        $this->toggleItem = $toggleItem;
    }

    /**
     * @return int
     */
    public function getValueInt(): int
    {
        return $this->valueInt;
    }

    /**
     * @param int $valueInt
     */
    public function setValueInt(int $valueInt): void
    {
        $this->valueInt = $valueInt;
    }

    /**
     * @return float
     */
    public function getValueFloat(): float
    {
        return $this->valueFloat;
    }

    /**
     * @param float $valueFloat
     */
    public function setValueFloat(float $valueFloat): void
    {
        $this->valueFloat = $valueFloat;
    }

    /**
     * @return string
     */
    public function getValueInput(): string
    {
        return $this->valueInput;
    }

    /**
     * @param string $valueInput
     */
    public function setValueInput(string $valueInput): void
    {
        $this->valueInput = $valueInput;
    }

    /**
     * @return bool
     */
    public function isValueBool(): bool
    {
        return $this->valueBool;
    }

    /**
     * @param bool $valueBool
     */
    public function setValueBool(bool $valueBool): void
    {
        $this->valueBool = $valueBool;
    }

    /**
     * @return string
     */
    public function getValueText(): string
    {
        return $this->valueText;
    }

    /**
     * @param string $valueText
     */
    public function setValueText(string $valueText): void
    {
        $this->valueText = $valueText;
    }

    public function getValue()
    {
        switch ($this->valueType) {
            case PropertyType::NONE:
                return '';
            case PropertyType::STRING:
                return $this->valueInput;
            case PropertyType::NUMBER:
                return $this->valueInt;
            case PropertyType::TEXT:
                return $this->valueText;
            case PropertyType::BOOL:
                return $this->valueBool;
            case PropertyType::FILE:
                // @TODO
                return '';
        }
        return '';
    }
}

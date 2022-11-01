<?php
declare(strict_types=1);

namespace Int\Intitems\Tests\Unit\Domain\Model;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Saša Stojanović <stojanovic@intention.rs>
 */
class ItemPropertyTest extends UnitTestCase
{
    /**
     * @var \Int\Intitems\Domain\Model\ItemProperty
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Int\Intitems\Domain\Model\ItemProperty();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getValueLabelReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getValueLabel()
        );
    }

    /**
     * @test
     */
    public function setValueLabelForStringSetsValueLabel()
    {
        $this->subject->setValueLabel('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'valueLabel',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getValueTypeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getValueType()
        );
    }

    /**
     * @test
     */
    public function setValueTypeForIntSetsValueType()
    {
        $this->subject->setValueType(12);

        self::assertAttributeEquals(
            12,
            'valueType',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getValueIntReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getValueInt()
        );
    }

    /**
     * @test
     */
    public function setValueIntForIntSetsValueInt()
    {
        $this->subject->setValueInt(12);

        self::assertAttributeEquals(
            12,
            'valueInt',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getValueFloatReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getValueFloat()
        );
    }

    /**
     * @test
     */
    public function setValueFloatForFloatSetsValueFloat()
    {
        $this->subject->setValueFloat(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'valueFloat',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getValueInputReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getValueInput()
        );
    }

    /**
     * @test
     */
    public function setValueInputForStringSetsValueInput()
    {
        $this->subject->setValueInput('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'valueInput',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getValueBoolReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getValueBool()
        );
    }

    /**
     * @test
     */
    public function setValueBoolForBoolSetsValueBool()
    {
        $this->subject->setValueBool(true);

        self::assertAttributeEquals(
            true,
            'valueBool',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getValueTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getValueText()
        );
    }

    /**
     * @test
     */
    public function setValueTextForStringSetsValueText()
    {
        $this->subject->setValueText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'valueText',
            $this->subject
        );
    }
}

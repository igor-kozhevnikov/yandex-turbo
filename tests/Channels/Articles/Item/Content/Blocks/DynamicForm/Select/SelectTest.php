<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Select;

use ArrayIterator;
use Exception;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Select" item of the "DynamicForm" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Select
 */
class SelectTest extends TestCase
{
    /**
     * The name.
     *
     * @var string|null
     */
    private $name;

    /**
     * The label.
     *
     * @var string|null
     */
    private $label;

    /**
     * The value.
     *
     * @var string|null
     */
    private $value;

    /**
     * The list of options.
     *
     * @var Option[]
     */
    private $options = [];

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->name = 'name';
        $this->label = 'label';
        $this->value = 'value';
        $this->options = [new Option('text', 'value')];
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $select = new Select();
        $this->assertNull($select->getName());
        $this->assertFalse($select->hasName());
        $this->assertNull($select->getLabel());
        $this->assertFalse($select->hasLabel());
        $this->assertNull($select->getValue());
        $this->assertFalse($select->hasValue());
        $this->assertEmpty($select->getOptions());
        $this->assertFalse($select->hasOptions());

        $select = new Select($this->name, $this->label, $this->value, $this->options);
        $this->assertSame($this->name, $select->getName());
        $this->assertTrue($select->hasName());
        $this->assertSame($this->label, $select->getLabel());
        $this->assertTrue($select->hasLabel());
        $this->assertSame($this->value, $select->getValue());
        $this->assertTrue($select->hasValue());
        $this->assertEquals($this->options, $select->getOptions());
        $this->assertTrue($select->hasOptions());
    }

    /**
     * Testing of the "name" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::setName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::hasName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::getName
     *
     * @return void
     */
    public function testName(): void
    {
        $select = new Select();
        $select->setName($this->name);
        $this->assertSame($this->name, $select->getName());
        $this->assertTrue($select->hasName());

        $select = new Select();
        $select->setName('');
        $this->assertNull($select->getName());
        $this->assertFalse($select->hasName());

        $select = new Select();
        $select->setName(null);
        $this->assertNull($select->getName());
        $this->assertFalse($select->hasName());
    }

    /**
     * Testing of the "label" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::setLabel
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::hasLabel
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::getLabel
     *
     * @return void
     */
    public function testLabel(): void
    {
        $select = new Select();
        $select->setLabel($this->label);
        $this->assertSame($this->label, $select->getLabel());
        $this->assertTrue($select->hasLabel());

        $select = new Select();
        $select->setLabel('');
        $this->assertNull($select->getLabel());
        $this->assertFalse($select->hasLabel());

        $select = new Select();
        $select->setLabel(null);
        $this->assertNull($select->getLabel());
        $this->assertFalse($select->hasLabel());
    }

    /**
     * Testing of the "value" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::setValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::hasValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::getValue
     *
     * @return void
     */
    public function testValue(): void
    {
        $select = new Select();
        $select->setValue($this->value);
        $this->assertSame($this->value, $select->getValue());
        $this->assertTrue($select->hasValue());

        $select = new Select();
        $select->setValue('');
        $this->assertNull($select->getValue());
        $this->assertFalse($select->hasValue());

        $select = new Select();
        $select->setValue(null);
        $this->assertNull($select->getValue());
        $this->assertFalse($select->hasValue());

        $select = new Select();
        $select->setOptions($this->options);
        $this->assertSame($this->options[0]->getValue(), $select->getValue());
        $this->assertTrue($select->hasValue());
    }

    /**
     * Testing of the "options" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::setOptions
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::addOption
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::hasOptions
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::getOptions
     *
     * @return void
     */
    public function testOptions(): void
    {
        $select = new Select();
        $select->setOptions($this->options);
        $this->assertNotEmpty($select->getOptions());
        $this->assertTrue($select->hasOptions());

        $select = new Select();
        $select->setOptions([]);
        $this->assertEmpty($select->getOptions());
        $this->assertFalse($select->hasOptions());

        $select = new Select();
        $select->setOptions(null);
        $this->assertEmpty($select->getOptions());
        $this->assertFalse($select->hasOptions());

        $select = new Select();
        $select->addOption(new Option());
        $this->assertNotEmpty($select->getOptions());
        $this->assertTrue($select->hasOptions());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $select = new Select();
        $this->assertFalse($select->isValid());

        $select = new Select();
        $select->setName($this->name);
        $select->setLabel($this->label);
        $select->setValue($this->value);
        $select->setOptions($this->options);
        $this->assertTrue($select->isValid());
    }

    /**
     * Testing of the "IteratorAggregate' interface.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::getIterator
     *
     * @throws Exception
     *
     * @return void
     */
    public function testGetIterator(): void
    {
        $select = new Select();
        $select->setOptions($this->options);
        $this->assertNotEmpty($select);
        $this->assertIsIterable($select);
        $this->assertInstanceOf(ArrayIterator::class, $select->getIterator());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $select = Select::create();
        $this->assertInstanceOf(Select::class, $select);
        $this->assertNull($select->getName());
        $this->assertNull($select->getLabel());
        $this->assertNull($select->getValue());
        $this->assertEmpty($select->getOptions());

        $select = Select::create($this->name, $this->label, $this->value, $this->options);
        $this->assertInstanceOf(Select::class, $select);
        $this->assertSame($this->name, $select->getName());
        $this->assertSame($this->label, $select->getLabel());
        $this->assertSame($this->value, $select->getValue());
        $this->assertEquals($this->options, $select->getOptions());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $select = (new Select())->name($this->name);
        $this->assertInstanceOf(Select::class, $select);
        $this->assertSame($this->name, $select->getName());

        $select = (new Select())->label($this->label);
        $this->assertInstanceOf(Select::class, $select);
        $this->assertSame($this->label, $select->getLabel());

        $select = (new Select())->value($this->value);
        $this->assertInstanceOf(Select::class, $select);
        $this->assertSame($this->value, $select->getValue());

        $select = (new Select())->options($this->options);
        $this->assertInstanceOf(Select::class, $select);
        $this->assertEquals($this->options, $select->getOptions());

        $select = (new Select())->option($this->options[0]);
        $this->assertInstanceOf(Select::class, $select);
        $this->assertNotEmpty($select->getOptions());
    }
}

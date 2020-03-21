<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio;

use ArrayIterator;
use Exception;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Radio" item of the "DynamicForm" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio
 */
class RadioTest extends TestCase
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
        $this->options = [new Option()];
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $radio = new Radio();
        $this->assertNull($radio->getName());
        $this->assertFalse($radio->hasName());
        $this->assertNull($radio->getLabel());
        $this->assertFalse($radio->hasLabel());
        $this->assertEmpty($radio->getOptions());
        $this->assertFalse($radio->hasOptions());

        $radio = new Radio($this->name, $this->label, $this->options);
        $this->assertSame($this->name, $radio->getName());
        $this->assertTrue($radio->hasName());
        $this->assertSame($this->label, $radio->getLabel());
        $this->assertTrue($radio->hasLabel());
        $this->assertEquals($this->options, $radio->getOptions());
        $this->assertTrue($radio->hasOptions());
    }

    /**
     * Testing of the "name" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::setName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::hasName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::getName
     *
     * @return void
     */
    public function testName(): void
    {
        $radio = new Radio();
        $radio->setName($this->name);
        $this->assertSame($this->name, $radio->getName());
        $this->assertTrue($radio->hasName());

        $radio = new Radio();
        $radio->setName('');
        $this->assertNull($radio->getName());
        $this->assertFalse($radio->hasName());

        $radio = new Radio();
        $radio->setName(null);
        $this->assertNull($radio->getName());
        $this->assertFalse($radio->hasName());
    }

    /**
     * Testing of the "label" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::setLabel
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::hasLabel
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::getLabel
     *
     * @return void
     */
    public function testLabel(): void
    {
        $radio = new Radio();
        $radio->setLabel($this->label);
        $this->assertSame($this->label, $radio->getLabel());
        $this->assertTrue($radio->hasLabel());

        $radio = new Radio();
        $radio->setLabel('');
        $this->assertNull($radio->getLabel());
        $this->assertFalse($radio->hasLabel());

        $radio = new Radio();
        $radio->setLabel(null);
        $this->assertNull($radio->getLabel());
        $this->assertFalse($radio->hasLabel());
    }

    /**
     * Testing of the "options" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::setOptions
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::addOption
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::hasOptions
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::getOptions
     *
     * @return void
     */
    public function testOptions(): void
    {
        $radio = new Radio();
        $radio->setOptions($this->options);
        $this->assertNotEmpty($radio->getOptions());
        $this->assertTrue($radio->hasOptions());

        $radio = new Radio();
        $radio->setOptions([]);
        $this->assertEmpty($radio->getOptions());
        $this->assertFalse($radio->hasOptions());

        $radio = new Radio();
        $radio->setOptions(null);
        $this->assertEmpty($radio->getOptions());
        $this->assertFalse($radio->hasOptions());

        $radio = new Radio();
        $radio->addOption(new Option());
        $this->assertNotEmpty($radio->getOptions());
        $this->assertTrue($radio->hasOptions());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $Radio = new Radio();
        $this->assertFalse($Radio->isValid());

        $Radio = new Radio();
        $Radio->setName($this->name);
        $Radio->setLabel($this->label);
        $Radio->setOptions($this->options);
        $this->assertTrue($Radio->isValid());
    }

    /**
     * Testing of the "IteratorAggregate' interface.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::getIterator
     *
     * @throws Exception
     *
     * @return void
     */
    public function testGetIterator(): void
    {
        $radio = new Radio();
        $radio->setOptions($this->options);
        $this->assertNotEmpty($radio);
        $this->assertIsIterable($radio);
        $this->assertInstanceOf(ArrayIterator::class, $radio->getIterator());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $radio = Radio::create();
        $this->assertInstanceOf(Radio::class, $radio);
        $this->assertNull($radio->getName());
        $this->assertNull($radio->getLabel());
        $this->assertEmpty($radio->getOptions());

        $radio = Radio::create($this->name, $this->label, $this->options);
        $this->assertInstanceOf(Radio::class, $radio);
        $this->assertSame($this->name, $radio->getName());
        $this->assertSame($this->label, $radio->getLabel());
        $this->assertEquals($this->options, $radio->getOptions());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $radio = (new Radio())->name($this->name);
        $this->assertInstanceOf(Radio::class, $radio);
        $this->assertSame($this->name, $radio->getName());

        $radio = (new Radio())->label($this->label);
        $this->assertInstanceOf(Radio::class, $radio);
        $this->assertSame($this->label, $radio->getLabel());

        $radio = (new Radio())->options($this->options);
        $this->assertInstanceOf(Radio::class, $radio);
        $this->assertEquals($this->options, $radio->getOptions());

        $radio = (new Radio())->option($this->options[0]);
        $this->assertInstanceOf(Radio::class, $radio);
        $this->assertNotEmpty($radio->getOptions());
    }
}

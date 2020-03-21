<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Select;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Radio" option of the "DynamicForm" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Select
 */
class OptionTest extends TestCase
{
    /**
     * The text.
     *
     * @var string|null
     */
    private $text;

    /**
     * The value.
     *
     * @var string|null
     */
    private $value;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->text = 'text';
        $this->value = 'value';
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $option = new Option();
        $this->assertNull($option->getText());
        $this->assertFalse($option->hasText());
        $this->assertNull($option->getValue());
        $this->assertFalse($option->hasValue());

        $option = new Option($this->text, $this->value);
        $this->assertSame($this->text, $option->getText());
        $this->assertTrue($option->hasText());
        $this->assertSame($this->value, $option->getValue());
        $this->assertTrue($option->hasValue());
    }

    /**
     * Testing of the "text" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option::setText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option::hasText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option::getText
     *
     * @return void
     */
    public function testText(): void
    {
        $option = new Option();
        $option->setText($this->text);
        $this->assertSame($this->text, $option->getText());
        $this->assertTrue($option->hasText());

        $option = new Option();
        $option->setText('');
        $this->assertNull($option->getText());
        $this->assertFalse($option->hasText());

        $option = new Option();
        $option->setText(null);
        $this->assertNull($option->getText());
        $this->assertFalse($option->hasText());
    }

    /**
     * Testing of the "value" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option::setValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option::hasValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option::getValue
     *
     * @return void
     */
    public function testValue(): void
    {
        $option = new Option();
        $option->setValue($this->value);
        $this->assertSame($this->value, $option->getValue());
        $this->assertTrue($option->hasValue());

        $option = new Option();
        $option->setValue('');
        $this->assertNull($option->getValue());
        $this->assertFalse($option->hasValue());

        $option = new Option();
        $option->setValue(null);
        $this->assertNull($option->getValue());
        $this->assertFalse($option->hasValue());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $option = new Option();
        $this->assertFalse($option->isValid());

        $option = new Option();
        $option->setText($this->text);
        $option->setValue($this->value);
        $this->assertTrue($option->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $select = new Select();
        $this->assertEmpty($select->getOptions());

        $option = new Option();
        $option->appendTo($select);

        $this->assertNotEmpty($select->getOptions());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $option = Option::create();
        $this->assertInstanceOf(Option::class, $option);
        $this->assertNull($option->getText());
        $this->assertNull($option->getValue());

        $option = Option::create($this->text, $this->value);
        $this->assertInstanceOf(Option::class, $option);
        $this->assertSame($this->text, $option->getText());
        $this->assertSame($this->value, $option->getValue());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $option = (new Option())->text($this->text);
        $this->assertInstanceOf(Option::class, $option);
        $this->assertSame($this->text, $option->getText());

        $option = (new Option())->value($this->value);
        $this->assertInstanceOf(Option::class, $option);
        $this->assertSame($this->value, $option->getValue());
    }
}

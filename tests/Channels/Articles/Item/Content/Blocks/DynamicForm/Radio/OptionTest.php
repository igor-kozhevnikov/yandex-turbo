<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Radio" option of the "DynamicForm" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio
 */
class OptionTest extends TestCase
{
    /**
     * The value.
     *
     * @var string|null
     */
    private $value;

    /**
     * The label.
     *
     * @var string|null
     */
    private $label;

    /**
     * The meta.
     *
     * @var string|null
     */
    private $meta;

    /**
     * The checked.
     *
     * @var bool
     */
    private $checked = false;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->value = 'value';
        $this->label = 'label';
        $this->meta = 'meta';
        $this->checked = (bool) rand(0, 1);
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $option = new Option();
        $this->assertNull($option->getValue());
        $this->assertFalse($option->hasValue());
        $this->assertNull($option->getLabel());
        $this->assertFalse($option->hasLabel());
        $this->assertNull($option->getMeta());
        $this->assertFalse($option->hasMeta());
        $this->assertSame('false', $option->getChecked());
        $this->assertFalse($option->isChecked());

        $option = new Option($this->value, $this->label, $this->meta);
        $this->assertSame($this->value, $option->getValue());
        $this->assertTrue($option->hasValue());
        $this->assertSame($this->label, $option->getLabel());
        $this->assertTrue($option->hasLabel());
        $this->assertSame($this->meta, $option->getMeta());
        $this->assertTrue($option->hasMeta());
    }

    /**
     * Testing of the "value" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::setValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::hasValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::getValue
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
     * Testing of the "label" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::setLabel
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::hasLabel
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::getLabel
     *
     * @return void
     */
    public function testLabel(): void
    {
        $option = new Option();
        $option->setLabel($this->label);
        $this->assertSame($this->label, $option->getLabel());
        $this->assertTrue($option->hasLabel());

        $option = new Option();
        $option->setLabel('');
        $this->assertNull($option->getLabel());
        $this->assertFalse($option->hasLabel());

        $option = new Option();
        $option->setLabel(null);
        $this->assertNull($option->getLabel());
        $this->assertFalse($option->hasLabel());
    }

    /**
     * Testing of the "meta" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::setMeta
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::hasMeta
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::getMeta
     *
     * @return void
     */
    public function testMeta(): void
    {
        $option = new Option();
        $option->setMeta($this->meta);
        $this->assertSame($this->meta, $option->getMeta());
        $this->assertTrue($option->hasMeta());

        $option = new Option();
        $option->setMeta('');
        $this->assertNull($option->getMeta());
        $this->assertFalse($option->hasMeta());

        $option = new Option();
        $option->setMeta(null);
        $this->assertNull($option->getMeta());
        $this->assertFalse($option->hasMeta());
    }

    /**
     * Testing of the "checked" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::setChecked
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::isChecked
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::getChecked
     *
     * @return void
     */
    public function testChecked(): void
    {
        $option = new Option();
        $option->setChecked(true);
        $this->assertSame('true', $option->getChecked());
        $this->assertTrue($option->isChecked());

        $option = new Option();
        $option->setChecked(false);
        $this->assertSame('false', $option->getChecked());
        $this->assertFalse($option->isChecked());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $option = new Option();
        $this->assertFalse($option->isValid());

        $option = new Option();
        $option->setValue($this->value);
        $option->setLabel($this->label);
        $option->setMeta($this->meta);
        $this->assertTrue($option->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $radio = new Radio();
        $this->assertEmpty($radio->getOptions());

        $option = new Option();
        $option->appendTo($radio);

        $this->assertNotEmpty($radio->getOptions());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $option = Option::create();
        $this->assertInstanceOf(Option::class, $option);
        $this->assertNull($option->getValue());
        $this->assertNull($option->getLabel());
        $this->assertNull($option->getMeta());
        $this->assertSame('false', $option->getChecked());

        $option = Option::create($this->value, $this->label, $this->meta, $this->checked);
        $this->assertInstanceOf(Option::class, $option);
        $this->assertSame($this->value, $option->getValue());
        $this->assertSame($this->label, $option->getLabel());
        $this->assertSame($this->meta, $option->getMeta());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $option = (new Option())->value($this->value);
        $this->assertInstanceOf(Option::class, $option);
        $this->assertSame($this->value, $option->getValue());

        $option = (new Option())->label($this->label);
        $this->assertInstanceOf(Option::class, $option);
        $this->assertSame($this->label, $option->getLabel());

        $option = (new Option())->meta($this->meta);
        $this->assertInstanceOf(Option::class, $option);
        $this->assertSame($this->meta, $option->getMeta());

        $option = (new Option())->checked($this->checked);
        $this->assertInstanceOf(Option::class, $option);
        $this->assertSame($this->checked ? 'true' : 'false', $option->getChecked());
    }
}

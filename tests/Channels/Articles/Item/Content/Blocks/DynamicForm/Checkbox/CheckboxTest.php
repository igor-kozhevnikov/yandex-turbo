<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Checkbox" item of the "DynamicForm" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox
 */
class CheckboxTest extends TestCase
{
    /**
     * The name.
     *
     * @var string|null
     */
    private $name;

    /**
     * The content.
     *
     * @var string|null
     */
    private $content;

    /**
     * The value.
     *
     * @var string|null
     */
    public $value;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->name = 'name';
        $this->content = 'content';
        $this->value = 'value';
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $checkbox = new Checkbox();
        $this->assertNull($checkbox->getName());
        $this->assertFalse($checkbox->hasName());
        $this->assertNull($checkbox->getValue());
        $this->assertFalse($checkbox->hasValue());
        $this->assertNull($checkbox->getContent());
        $this->assertFalse($checkbox->hasContent());

        $checkbox = new Checkbox($this->name, $this->value);
        $this->assertSame($this->name, $checkbox->getName());
        $this->assertTrue($checkbox->hasName());
        $this->assertSame($this->value, $checkbox->getValue());
        $this->assertTrue($checkbox->hasValue());
    }

    /**
     * Testing of the "name" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::setName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::hasName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::getName
     *
     * @return void
     */
    public function testName(): void
    {
        $checkbox = new Checkbox();
        $checkbox->setName($this->name);
        $this->assertSame($this->name, $checkbox->getName());
        $this->assertTrue($checkbox->hasName());

        $checkbox = new Checkbox();
        $checkbox->setName('');
        $this->assertNull($checkbox->getName());
        $this->assertFalse($checkbox->hasName());

        $checkbox = new Checkbox();
        $checkbox->setName(null);
        $this->assertNull($checkbox->getName());
        $this->assertFalse($checkbox->hasName());
    }

    /**
     * Testing of the "value" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::setValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::hasValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::getValue
     *
     * @return void
     */
    public function testValue(): void
    {
        $checkbox = new Checkbox();
        $checkbox->setValue($this->value);
        $this->assertSame($this->value, $checkbox->getValue());
        $this->assertTrue($checkbox->hasValue());

        $checkbox = new Checkbox();
        $checkbox->setValue('');
        $this->assertNull($checkbox->getValue());
        $this->assertFalse($checkbox->hasValue());

        $checkbox = new Checkbox();
        $checkbox->setValue(null);
        $this->assertNull($checkbox->getValue());
        $this->assertFalse($checkbox->hasValue());
    }

    /**
     * Testing of the "content" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::setContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::hasContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::getContent
     *
     * @return void
     */
    public function testContent(): void
    {
        $checkbox = new Checkbox();
        $checkbox->setContent($this->content);
        $this->assertSame($this->content, $checkbox->getContent());
        $this->assertTrue($checkbox->hasContent());

        $checkbox = new Checkbox();
        $checkbox->setContent('');
        $this->assertNull($checkbox->getContent());
        $this->assertFalse($checkbox->hasContent());

        $checkbox = new Checkbox();
        $checkbox->setContent(null);
        $this->assertNull($checkbox->getContent());
        $this->assertFalse($checkbox->hasContent());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $checkbox = new Checkbox();
        $this->assertFalse($checkbox->isValid());

        $checkbox = new Checkbox();
        $checkbox->setName($this->name);
        $checkbox->setValue($this->value);
        $this->assertTrue($checkbox->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $checkbox = Checkbox::create();
        $this->assertInstanceOf(Checkbox::class, $checkbox);
        $this->assertNull($checkbox->getName());
        $this->assertNull($checkbox->getValue());
        $this->assertNull($checkbox->getContent());

        $checkbox = Checkbox::create($this->name, $this->value);
        $this->assertSame($this->name, $checkbox->getName());
        $this->assertSame($this->value, $checkbox->getValue());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $checkbox = (new Checkbox())->name($this->name);
        $this->assertInstanceOf(Checkbox::class, $checkbox);
        $this->assertSame($this->name, $checkbox->getName());

        $checkbox = (new Checkbox())->value($this->value);
        $this->assertInstanceOf(Checkbox::class, $checkbox);
        $this->assertSame($this->value, $checkbox->getValue());

        $checkbox = (new Checkbox())->content($this->content);
        $this->assertInstanceOf(Checkbox::class, $checkbox);
        $this->assertSame($this->content, $checkbox->getContent());
    }
}

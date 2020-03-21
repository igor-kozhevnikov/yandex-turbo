<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Textarea" item of the "DynamicForm" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea
 */
class TextareaTest extends TestCase
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
     * The placeholder.
     *
     * @var string|null
     */
    private $placeholder;

    /**
     * Indicates if an textarea is required.
     *
     * @var bool
     */
    public $required = true;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->name = 'name';
        $this->label = 'label';
        $this->placeholder = 'placeholder';
        $this->required = (bool) rand(0, 1);
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $textarea = new Textarea();
        $this->assertNull($textarea->getName());
        $this->assertFalse($textarea->hasName());
        $this->assertNull($textarea->getLabel());
        $this->assertFalse($textarea->hasLabel());
        $this->assertNull($textarea->getPlaceholder());
        $this->assertFalse($textarea->hasPlaceholder());
        $this->assertTrue($textarea->isRequired());

        $textarea = new Textarea($this->name, $this->label);
        $this->assertSame($this->name, $textarea->getName());
        $this->assertTrue($textarea->hasName());
        $this->assertSame($this->label, $textarea->getLabel());
        $this->assertTrue($textarea->hasLabel());
    }

    /**
     * Testing of the "name" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::setName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::hasName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::getName
     *
     * @return void
     */
    public function testName(): void
    {
        $textarea = new Textarea();
        $textarea->setName($this->name);
        $this->assertSame($this->name, $textarea->getName());
        $this->assertTrue($textarea->hasName());

        $textarea = new Textarea();
        $textarea->setName('');
        $this->assertNull($textarea->getName());
        $this->assertFalse($textarea->hasName());

        $textarea = new Textarea();
        $textarea->setName(null);
        $this->assertNull($textarea->getName());
        $this->assertFalse($textarea->hasName());
    }

    /**
     * Testing of the "label" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::setLabel
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::hasLabel
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::getLabel
     *
     * @return void
     */
    public function testLabel(): void
    {
        $textarea = new Textarea();
        $textarea->setLabel($this->label);
        $this->assertSame($this->label, $textarea->getLabel());
        $this->assertTrue($textarea->hasLabel());

        $textarea = new Textarea();
        $textarea->setLabel('');
        $this->assertNull($textarea->getLabel());
        $this->assertFalse($textarea->hasLabel());

        $textarea = new Textarea();
        $textarea->setLabel(null);
        $this->assertNull($textarea->getLabel());
        $this->assertFalse($textarea->hasLabel());
    }

    /**
     * Testing of the "placeholder" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::setPlaceholder
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::hasPlaceholder
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::getPlaceholder
     *
     * @return void
     */
    public function testPlaceholder(): void
    {
        $textarea = new Textarea();
        $textarea->setPlaceholder($this->placeholder);
        $this->assertSame($this->placeholder, $textarea->getPlaceholder());
        $this->assertTrue($textarea->hasPlaceholder());

        $textarea = new Textarea();
        $textarea->setPlaceholder('');
        $this->assertNull($textarea->getPlaceholder());
        $this->assertFalse($textarea->hasPlaceholder());

        $textarea = new Textarea();
        $textarea->setPlaceholder(null);
        $this->assertNull($textarea->getPlaceholder());
        $this->assertFalse($textarea->hasPlaceholder());
    }

    /**
     * Testing of the "required" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::setRequired
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::isRequired
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::getRequired
     *
     * @return void
     */
    public function testRequired(): void
    {
        $textarea = new Textarea();
        $textarea->setRequired(true);
        $this->assertSame('true', $textarea->getRequired());
        $this->assertTrue($textarea->isRequired());

        $textarea = new Textarea();
        $textarea->setRequired(false);
        $this->assertSame('false', $textarea->getRequired());
        $this->assertFalse($textarea->isRequired());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $textarea = new Textarea();
        $this->assertFalse($textarea->isValid());

        $textarea = new Textarea();
        $textarea->setName($this->name);
        $textarea->setLabel($this->label);
        $this->assertTrue($textarea->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $textarea = Textarea::create();
        $this->assertInstanceOf(Textarea::class, $textarea);
        $this->assertNull($textarea->getName());
        $this->assertNull($textarea->getLabel());
        $this->assertTrue($textarea->isRequired());

        $textarea = Textarea::create($this->name, $this->label, $this->placeholder, $this->required);
        $this->assertInstanceOf(Textarea::class, $textarea);
        $this->assertSame($this->name, $textarea->getName());
        $this->assertSame($this->label, $textarea->getLabel());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $textarea = (new Textarea())->name($this->name);
        $this->assertInstanceOf(Textarea::class, $textarea);
        $this->assertSame($this->name, $textarea->getName());

        $textarea = (new Textarea())->label($this->label);
        $this->assertInstanceOf(Textarea::class, $textarea);
        $this->assertSame($this->label, $textarea->getLabel());

        $textarea = (new Textarea())->placeholder($this->placeholder);
        $this->assertInstanceOf(Textarea::class, $textarea);
        $this->assertSame($this->placeholder, $textarea->getPlaceholder());

        $textarea = (new Textarea())->required($this->required);
        $this->assertInstanceOf(Textarea::class, $textarea);
        $this->assertSame($this->required, $textarea->isRequired());
    }
}

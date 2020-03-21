<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Input;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Input" item of the "DynamicForm" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm\Input
 */
class InputTest extends TestCase
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
     * The input type.
     *
     * Options:
     *   - text (default)
     *   - date
     *   - number
     *
     * @var string|null
     */
    private $type;

    /**
     * The placeholder.
     *
     * @var string|null
     */
    private $placeholder;

    /**
     * Indicates if an input is required.
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
        $this->type = Input::TYPE_TEXT;
        $this->placeholder = 'placeholder';
        $this->required = (bool) rand(0, 1);
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $input = new Input();
        $this->assertNull($input->getName());
        $this->assertFalse($input->hasName());
        $this->assertNull($input->getLabel());
        $this->assertFalse($input->hasLabel());
        $this->assertSame(Input::TYPE_TEXT, $input->getType());
        $this->assertTrue($input->hasType());
        $this->assertNull($input->getPlaceholder());
        $this->assertFalse($input->hasPlaceholder());
        $this->assertTrue($input->isRequired());

        $input = new Input($this->type, $this->name, $this->label);
        $this->assertSame($this->name, $input->getName());
        $this->assertTrue($input->hasName());
        $this->assertSame($this->label, $input->getLabel());
        $this->assertTrue($input->hasLabel());
        $this->assertSame($this->type, $input->getType());
        $this->assertTrue($input->hasType());
    }

    /**
     * Testing of the "name" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::setName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::hasName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::getName
     *
     * @return void
     */
    public function testName(): void
    {
        $input = new Input();
        $input->setName($this->name);
        $this->assertSame($this->name, $input->getName());
        $this->assertTrue($input->hasName());

        $input = new Input();
        $input->setName('');
        $this->assertNull($input->getName());
        $this->assertFalse($input->hasName());

        $input = new Input();
        $input->setName(null);
        $this->assertNull($input->getName());
        $this->assertFalse($input->hasName());
    }

    /**
     * Testing of the "label" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::setLabel
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::hasLabel
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::getLabel
     *
     * @return void
     */
    public function testLabel(): void
    {
        $input = new Input();
        $input->setLabel($this->label);
        $this->assertSame($this->label, $input->getLabel());
        $this->assertTrue($input->hasLabel());

        $input = new Input();
        $input->setLabel('');
        $this->assertNull($input->getLabel());
        $this->assertFalse($input->hasLabel());

        $input = new Input();
        $input->setLabel(null);
        $this->assertNull($input->getLabel());
        $this->assertFalse($input->hasLabel());
    }

    /**
     * Testing of the "type" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::setType
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::hasType
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::getType
     *
     * @return void
     */
    public function testType(): void
    {
        $input = new Input();
        $input->setType($this->type);
        $this->assertSame($this->type, $input->getType());
        $this->assertTrue($input->hasType());

        $input = new Input();
        $input->setLabel('');
        $this->assertSame(Input::TYPE_TEXT, $input->getType());
        $this->assertTrue($input->hasType());

        $input = new Input();
        $input->setLabel(null);
        $this->assertSame(Input::TYPE_TEXT, $input->getType());
        $this->assertTrue($input->hasType());

        $input = new Input();
        $input->setLabel('type');
        $this->assertSame(Input::TYPE_TEXT, $input->getType());
        $this->assertTrue($input->hasType());
    }

    /**
     * Testing of the "placeholder" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::setPlaceholder
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::hasPlaceholder
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::getPlaceholder
     *
     * @return void
     */
    public function testPlaceholder(): void
    {
        $input = new Input();
        $input->setPlaceholder($this->placeholder);
        $this->assertSame($this->placeholder, $input->getPlaceholder());
        $this->assertTrue($input->hasPlaceholder());

        $input = new Input();
        $input->setPlaceholder('');
        $this->assertNull($input->getPlaceholder());
        $this->assertFalse($input->hasPlaceholder());

        $input = new Input();
        $input->setPlaceholder(null);
        $this->assertNull($input->getPlaceholder());
        $this->assertFalse($input->hasPlaceholder());
    }

    /**
     * Testing of the "required" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::setRequired
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::isRequired
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::getRequired
     *
     * @return void
     */
    public function testRequired(): void
    {
        $input = new Input();
        $input->setRequired(true);
        $this->assertSame('true', $input->getRequired());
        $this->assertTrue($input->isRequired());

        $input = new Input();
        $input->setRequired(false);
        $this->assertSame('false', $input->getRequired());
        $this->assertFalse($input->isRequired());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $input = new Input();
        $this->assertFalse($input->isValid());

        $input = new Input();
        $input->setName($this->name);
        $input->setLabel($this->label);
        $input->setType($this->type);
        $this->assertTrue($input->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $input = Input::create();
        $this->assertInstanceOf(Input::class, $input);
        $this->assertNull($input->getName());
        $this->assertNull($input->getLabel());
        $this->assertSame(Input::TYPE_TEXT, $input->getType());

        $input = Input::create($this->type, $this->name, $this->label);
        $this->assertInstanceOf(Input::class, $input);
        $this->assertSame($this->name, $input->getName());
        $this->assertSame($this->label, $input->getLabel());
        $this->assertSame($this->type, $input->getType());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $input = (new Input())->name($this->name);
        $this->assertInstanceOf(Input::class, $input);
        $this->assertSame($this->name, $input->getName());

        $input = (new Input())->label($this->label);
        $this->assertInstanceOf(Input::class, $input);
        $this->assertSame($this->label, $input->getLabel());

        $input = (new Input())->type($this->type);
        $this->assertInstanceOf(Input::class, $input);
        $this->assertSame($this->type, $input->getType());

        $input = (new Input())->placeholder($this->placeholder);
        $this->assertInstanceOf(Input::class, $input);
        $this->assertSame($this->placeholder, $input->getPlaceholder());

        $input = (new Input())->required($this->required);
        $this->assertInstanceOf(Input::class, $input);
        $this->assertSame($this->required, $input->isRequired());
    }
}

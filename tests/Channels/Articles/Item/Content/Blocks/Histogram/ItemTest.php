<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Histogram;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the item of the "Histogram" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Histogram
 */
class ItemTest extends TestCase
{
    /**
     * The title.
     *
     * @var string|null
     */
    private $title;

    /**
     * The value.
     *
     * @var string|null
     */
    private $value;

    /**
     * The height.
     *
     * @var int|null
     */
    private $height;

    /**
     * The color.
     *
     * @var string|null
     */
    private $color;

    /**
     * The icon.
     *
     * @var string|null
     */
    private $icon;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->title = 'title';
        $this->value = 'value';
        $this->height = 50;
        $this->color = '#000000';
        $this->icon = 'http://example.com';
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $item = new Item();
        $this->assertNull($item->getTitle());
        $this->assertFalse($item->hasTitle());
        $this->assertNull($item->getValue());
        $this->assertFalse($item->hasValue());
        $this->assertNull($item->getHeight());
        $this->assertFalse($item->hasHeight());
        $this->assertNull($item->getColor());
        $this->assertFalse($item->hasColor());
        $this->assertNull($item->getIcon());
        $this->assertFalse($item->hasIcon());

        $item = new Item($this->title, $this->value, $this->height, $this->icon);
        $this->assertSame($this->title, $item->getTitle());
        $this->assertTrue($item->hasTitle());
        $this->assertSame($this->value, $item->getValue());
        $this->assertTrue($item->hasValue());
        $this->assertSame($this->height, $item->getHeight());
        $this->assertTrue($item->hasHeight());
        $this->assertSame($this->icon, $item->getIcon());
        $this->assertTrue($item->hasIcon());
    }

    /**
     * Testing of the "title" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::setTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::hasTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::getTitle
     *
     * @return void
     */
    public function testTitle(): void
    {
        $item = new Item();
        $item->setTitle($this->title);
        $this->assertSame($this->title, $item->getTitle());
        $this->assertTrue($item->hasTitle());

        $item = new Item();
        $item->setTitle('');
        $this->assertNull($item->getTitle());
        $this->assertFalse($item->hasTitle());

        $item = new Item();
        $item->setTitle(null);
        $this->assertNull($item->getTitle());
        $this->assertFalse($item->hasTitle());
    }

    /**
     * Testing of the "value" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::setValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::hasValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::getValue
     *
     * @return void
     */
    public function testValue(): void
    {
        $item = new Item();
        $item->setValue($this->value);
        $this->assertSame($this->value, $item->getValue());
        $this->assertTrue($item->hasValue());

        $item = new Item();
        $item->setValue('');
        $this->assertNull($item->getValue());
        $this->assertFalse($item->hasValue());

        $item = new Item();
        $item->setValue(null);
        $this->assertNull($item->getValue());
        $this->assertFalse($item->hasValue());
    }

    /**
     * Testing of the "height" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::setHeight
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::hasHeight
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::getHeight
     *
     * @return void
     */
    public function testHeight(): void
    {
        $item = new Item();
        $item->setHeight($this->height);
        $this->assertSame($this->height, $item->getHeight());
        $this->assertTrue($item->hasHeight());

        $item = new Item();
        $item->setHeight(0);
        $this->assertSame(0, $item->getHeight());
        $this->assertTrue($item->hasHeight());

        $item = new Item();
        $item->setHeight('10');
        $this->assertSame(10, $item->getHeight());
        $this->assertTrue($item->hasHeight());

        $item = new Item();
        $item->setHeight(-10);
        $this->assertNull($item->getHeight());
        $this->assertFalse($item->hasHeight());

        $item = new Item();
        $item->setHeight(null);
        $this->assertNull($item->getHeight());
        $this->assertFalse($item->hasHeight());

        $item = new Item();
        $item->setHeight('');
        $this->assertNull($item->getHeight());
        $this->assertFalse($item->hasHeight());

        $item = new Item();
        $item->setHeight('height');
        $this->assertNull($item->getHeight());
        $this->assertFalse($item->hasHeight());
    }

    /**
     * Testing of the "color" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::setColor
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::hasColor
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::getColor
     *
     * @return void
     */
    public function testColor(): void
    {
        $item = new Item();
        $item->setColor($this->color);
        $this->assertSame($this->color, $item->getColor());
        $this->assertTrue($item->hasColor());

        $item = new Item();
        $item->setColor('');
        $this->assertNull($item->getColor());
        $this->assertFalse($item->hasColor());

        $item = new Item();
        $item->setColor(null);
        $this->assertNull($item->getColor());
        $this->assertFalse($item->hasColor());
    }

    /**
     * Testing of the "icon" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::setIcon
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::hasIcon
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::getIcon
     *
     * @return void
     */
    public function testIcon(): void
    {
        $item = new Item();
        $item->setIcon($this->icon);
        $this->assertSame($this->icon, $item->getIcon());
        $this->assertTrue($item->hasIcon());

        $item = new Item();
        $item->setIcon('');
        $this->assertNull($item->getIcon());
        $this->assertFalse($item->hasIcon());

        $item = new Item();
        $item->setIcon(null);
        $this->assertNull($item->getIcon());
        $this->assertFalse($item->hasIcon());

        $item = new Item();
        $item->setIcon('icon');
        $this->assertNull($item->getIcon());
        $this->assertFalse($item->hasIcon());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $item = new Item();
        $this->assertFalse($item->isValid());

        $item = new Item();
        $item->setTitle($this->title);
        $item->setValue($this->value);
        $item->setHeight($this->height);
        $item->setIcon($this->icon);
        $this->assertTrue($item->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $item = Item::create();
        $this->assertInstanceOf(Item::class, $item);
        $this->assertNull($item->getTitle());
        $this->assertNull($item->getValue());
        $this->assertNull($item->getHeight());
        $this->assertNull($item->getColor());

        $item = Item::create($this->title, $this->value, $this->height, $this->icon);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->title, $item->getTitle());
        $this->assertSame($this->value, $item->getValue());
        $this->assertSame($this->height, $item->getHeight());
        $this->assertSame($this->icon, $item->getIcon());
    }

    /**
     * Testing of the fluent interface
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $item = (new Item())->title($this->title);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->title, $item->getTitle());

        $item = (new Item())->value($this->value);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->value, $item->getValue());

        $item = (new Item())->height($this->height);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->height, $item->getHeight());

        $item = (new Item())->color($this->color);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->color, $item->getColor());

        $item = (new Item())->icon($this->icon);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->icon, $item->getIcon());
    }
}

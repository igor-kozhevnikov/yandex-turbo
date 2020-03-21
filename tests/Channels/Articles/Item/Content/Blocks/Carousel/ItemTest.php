<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Carousel;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item;
use PHPUnit\Framework\TestCase;

/**
 * Testing of an item of the "Carousel" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Carousel
 */
class ItemTest extends TestCase
{
    /**
     * The title.
     *
     * @var string|null;
     */
    private $title;

    /**
     * The image URL.
     *
     * @var string|null;
     */
    private $image;

    /**
     * The URL.
     *
     * @var string|null;
     */
    private $url;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->title = 'title';
        $this->image = 'http://example.com';
        $this->url = 'http://example.com';
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $item = new Item();
        $this->assertNull($item->getTitle());
        $this->assertNull($item->getImage());
        $this->assertNull($item->getUrl());

        $item = new Item($this->title, $this->image, $this->url);
        $this->assertSame($this->title, $item->getTitle());
        $this->assertSame($this->image, $item->getImage());
        $this->assertSame($this->url, $item->getUrl());
    }

    /**
     * Testing of the "title" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::setTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::hasTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::getTitle
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
     * Testing of the "image" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::setImage
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::hasImage
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::getImage
     *
     * @return void
     */
    public function testImage(): void
    {
        $item = new Item();
        $item->setImage($this->image);
        $this->assertSame($this->image, $item->getImage());
        $this->assertTrue($item->hasImage());

        $item = new Item();
        $item->setImage('');
        $this->assertNull($item->getImage());
        $this->assertFalse($item->hasImage());

        $item = new Item();
        $item->setImage(null);
        $this->assertNull($item->getImage());
        $this->assertFalse($item->hasImage());

        $item = new Item();
        $item->setImage('image');
        $this->assertNull($item->getImage());
        $this->assertFalse($item->hasImage());
    }

    /**
     * Testing of the "url" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::setUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::hasUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::getUrl
     *
     * @return void
     */
    public function testUrl(): void
    {
        $item = new Item();
        $item->setUrl($this->url);
        $this->assertSame($this->url, $item->getUrl());
        $this->assertTrue($item->hasUrl());

        $item = new Item();
        $item->setUrl('');
        $this->assertNull($item->getUrl());
        $this->assertFalse($item->hasUrl());

        $item = new Item();
        $item->setUrl(null);
        $this->assertNull($item->getUrl());
        $this->assertFalse($item->hasUrl());

        $item = new Item();
        $item->setUrl('image');
        $this->assertNull($item->getUrl());
        $this->assertFalse($item->hasUrl());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $item = new Item();
        $this->assertFalse($item->isValid());

        $item = new Item();
        $item->setTitle($this->title);
        $item->setImage($this->image);
        $item->setUrl($this->url);
        $this->assertTrue($item->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $item = Item::create();
        $this->assertInstanceOf(Item::class, $item);
        $this->assertNull($item->getTitle());
        $this->assertNull($item->getImage());
        $this->assertNull($item->getUrl());

        $item = Item::create($this->title, $this->image, $this->url);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->title, $item->getTitle());
        $this->assertSame($this->image, $item->getImage());
        $this->assertSame($this->url, $item->getUrl());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $item = (new Item())->title($this->title);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->title, $item->getTitle());

        $item = (new Item())->image($this->image);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->image, $item->getImage());

        $item = (new Item())->url($this->url);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->url, $item->getUrl());
    }
}

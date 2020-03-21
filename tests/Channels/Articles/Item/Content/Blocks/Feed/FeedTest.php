<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Feed;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Feed;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Feed" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Feed
 */
class FeedTest extends TestCase
{
    /**
     * The layout.
     *
     * @var string|null
     */
    private ?string $layout = null;

    /**
     * The title.
     *
     * @var string|null
     */
    private ?string $title = null;

    /**
     * The list of items.
     *
     * @var array|null
     */
    private ?array $items = null;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->layout = Feed::LAYOUT_HORIZONTAL;
        $this->title = 'title';
        $this->items = [new Item()];
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Feed::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $feed = new Feed();
        $this->assertSame(Feed::LAYOUT_VERTICAL, $feed->getLayout());
        $this->assertNull($feed->getTitle());
        $this->assertEmpty($feed->getItems());

        $feed = new Feed($this->items);
        $this->assertEquals($this->items, $feed->getItems());
    }

    /**
     * Testing of the "layout" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Feed::setLayout
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Feed::hasLayout
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Feed::getLayout
     *
     * @return void
     */
    public function testLayout(): void
    {
        $feed = new Feed();
        $feed->setLayout($this->layout);
        $this->assertSame($this->layout, $feed->getLayout());
        $this->assertTrue($feed->hasLayout());

        $feed = new Feed();
        $feed->setLayout('');
        $this->assertSame(Feed::LAYOUT_VERTICAL, $feed->getLayout());
        $this->assertTrue($feed->hasLayout());

        $feed = new Feed();
        $feed->setLayout(null);
        $this->assertSame(Feed::LAYOUT_VERTICAL, $feed->getLayout());
        $this->assertTrue($feed->hasLayout());

        $feed = new Feed();
        $feed->setLayout('layout');
        $this->assertSame(Feed::LAYOUT_VERTICAL, $feed->getLayout());
        $this->assertTrue($feed->hasLayout());
    }

    /**
     * Testing of the "title" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Feed::setTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Feed::hasTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Feed::getTitle
     *
     * @return void
     */
    public function testTitle(): void
    {
        $feed = new Feed();
        $feed->setTitle($this->title);
        $this->assertSame($this->title, $feed->getTitle());
        $this->assertTrue($feed->hasTitle());

        $feed = new Feed();
        $feed->setTitle('');
        $this->assertNull($feed->getTitle());
        $this->assertFalse($feed->hasTitle());

        $feed = new Feed();
        $feed->setTitle(null);
        $this->assertNull($feed->getTitle());
        $this->assertFalse($feed->hasTitle());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Feed::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $feed = Feed::create();
        $this->assertInstanceOf(Feed::class, $feed);
        $this->assertEmpty($feed->getItems());

        $feed = Feed::create($this->items);
        $this->assertEquals($this->items, $feed->getItems());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $feed = (new Feed())->layout($this->layout);
        $this->assertInstanceOf(Feed::class, $feed);
        $this->assertSame($this->layout, $feed->getLayout());

        $feed = (new Feed())->title($this->title);
        $this->assertInstanceOf(Feed::class, $feed);
        $this->assertSame($this->title, $feed->getTitle());
    }
}

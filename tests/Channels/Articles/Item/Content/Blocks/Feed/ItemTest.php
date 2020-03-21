<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Feed;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item;
use PHPUnit\Framework\TestCase;

/**
 * Testing of an item of the "Feed" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Feed
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
     * The description.
     *
     * @var string|null
     */
    private $description;

    /**
     * The page URL.
     *
     * @var string|null
     */
    private $href;

    /**
     * The thumb URL.
     *
     * @var string|null
     */
    private $thumb;

    /**
     * The thumb position.
     *
     * @var string|null
     */
    private $thumbPosition;

    /**
     * The thumb ratio.
     *
     * @var string|null
     */
    private $thumbRatio;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->title = 'title';
        $this->description = 'desc';
        $this->href = 'http://example.com';
        $this->thumb = 'http://example.com';
        $this->thumbPosition = Item::POSITION_RIGHT;
        $this->thumbRatio = Item::RATIO_2x3;
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $item = new Item();
        $this->assertNull($item->getTitle());
        $this->assertNull($item->getDescription());
        $this->assertNull($item->getHref());
        $this->assertNull($item->getThumb());
        $this->assertSame(Item::POSITION_LEFT, $item->getThumbPosition());
        $this->assertSame(Item::RATIO_1x1, $item->getThumbRatio());

        $item = new Item($this->title, $this->href);
        $this->assertSame($this->title, $item->getTitle());
        $this->assertSame($this->href, $item->getHref());
    }

    /**
     * Testing of the "title" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::setTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::hasTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::getTitle
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
     * Testing of the "description" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::setDescription
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::hasDescription
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::getDescription
     *
     * @return void
     */
    public function testDescription(): void
    {
        $item = new Item();
        $item->setDescription($this->description);
        $this->assertSame($this->description, $item->getDescription());
        $this->assertTrue($item->hasDescription());

        $item = new Item();
        $item->setDescription('');
        $this->assertNull($item->getDescription());
        $this->assertFalse($item->hasDescription());

        $item = new Item();
        $item->setDescription(null);
        $this->assertNull($item->getDescription());
        $this->assertFalse($item->hasDescription());
    }

    /**
     * Testing of the "href" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::setHref
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::hasHref
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::getHref
     *
     * @return void
     */
    public function testHref(): void
    {
        $item = new Item();
        $item->setHref($this->href);
        $this->assertSame($this->href, $item->getHref());
        $this->assertTrue($item->hasHref());

        $item = new Item();
        $item->setHref('');
        $this->assertNull($item->getHref());
        $this->assertFalse($item->hasHref());

        $item = new Item();
        $item->setHref(null);
        $this->assertNull($item->getHref());
        $this->assertFalse($item->hasHref());

        $item = new Item();
        $item->setHref('href');
        $this->assertNull($item->getHref());
        $this->assertFalse($item->hasHref());
    }

    /**
     * Testing of the "thumb" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::setThumb
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::hasThumb
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::getThumb
     *
     * @return void
     */
    public function testThumb(): void
    {
        $item = new Item();
        $item->setThumb($this->thumb);
        $this->assertSame($this->thumb, $item->getThumb());
        $this->assertTrue($item->hasThumb());

        $item = new Item();
        $item->setThumb('');
        $this->assertNull($item->getThumb());
        $this->assertFalse($item->hasThumb());

        $item = new Item();
        $item->setThumb(null);
        $this->assertNull($item->getThumb());
        $this->assertFalse($item->hasThumb());

        $item = new Item();
        $item->setThumb('thumb');
        $this->assertNull($item->getThumb());
        $this->assertFalse($item->hasThumb());
    }

    /**
     * Testing of the "thumbPosition" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::setThumbPosition
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::hasThumbPosition
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::getThumbPosition
     *
     * @return void
     */
    public function testThumbPosition(): void
    {
        $item = new Item();
        $item->setThumbPosition($this->thumbPosition);
        $this->assertSame($this->thumbPosition, $item->getThumbPosition());
        $this->assertTrue($item->hasThumbPosition());

        $item = new Item();
        $item->setThumbPosition('');
        $this->assertSame(Item::POSITION_LEFT, $item->getThumbPosition());
        $this->assertTrue($item->hasThumbPosition());

        $item = new Item();
        $item->setThumbPosition(null);
        $this->assertSame(Item::POSITION_LEFT, $item->getThumbPosition());
        $this->assertTrue($item->hasThumbPosition());

        $item = new Item();
        $item->setThumbPosition('position');
        $this->assertSame(Item::POSITION_LEFT, $item->getThumbPosition());
        $this->assertTrue($item->hasThumbPosition());
    }

    /**
     * Testing of the "thumbRatio" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::setThumbRatio
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::hasThumbRatio
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::getThumbRatio
     *
     * @return void
     */
    public function testThumbRatio(): void
    {
        $item = new Item();
        $item->setThumbRatio($this->thumbRatio);
        $this->assertSame($this->thumbRatio, $item->getThumbRatio());
        $this->assertTrue($item->hasThumbRatio());

        $item = new Item();
        $item->setThumbRatio('');
        $this->assertSame(Item::RATIO_1x1, $item->getThumbRatio());
        $this->assertTrue($item->hasThumbRatio());

        $item = new Item();
        $item->setThumbPosition(null);
        $this->assertSame(Item::RATIO_1x1, $item->getThumbRatio());
        $this->assertTrue($item->hasThumbRatio());

        $item = new Item();
        $item->setThumbPosition('ratio');
        $this->assertSame(Item::RATIO_1x1, $item->getThumbRatio());
        $this->assertTrue($item->hasThumbRatio());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $item = new Item();
        $this->assertFalse($item->isValid());

        $item = new Item();
        $item->setTitle($this->title);
        $item->setHref($this->href);
        $this->assertTrue($item->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $item = Item::create();
        $this->assertInstanceOf(Item::class, $item);
        $this->assertNull($item->getTitle());
        $this->assertNull($item->getHref());

        $item = Item::create($this->title, $this->href);
        $this->assertSame($this->title, $item->getTitle());
        $this->assertSame($this->href, $item->getHref());
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

        $item = (new Item())->description($this->description);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->description, $item->getDescription());

        $item = (new Item())->href($this->href);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->href, $item->getHref());

        $item = (new Item())->thumb($this->thumb);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->thumb, $item->getThumb());

        $item = (new Item())->thumbPosition($this->thumbPosition);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->thumbPosition, $item->getThumbPosition());

        $item = (new Item())->thumbRatio($this->thumbRatio);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->thumbRatio, $item->getThumbRatio());
    }
}

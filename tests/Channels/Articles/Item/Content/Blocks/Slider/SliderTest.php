<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Slider;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad\Ad;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Slider;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Slider" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Slider
 */
class SliderTest extends TestCase
{
    /**
     * The orientation of a slider.
     *
     * @var string|null
     */
    private $orientation;

    /**
     * The header.
     *
     * @var string|null
     */
    private $header;

    /**
     * The list of items.
     *
     * @var BlockIterableItem[]|null
     */
    private $items;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->orientation = Slider::VIEW_LANDSCAPE;
        $this->header = 'header';
        $this->items = [new Ad(), new Image(), new Video()];
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Slider::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $slider = new Slider();
        $this->assertNull($slider->getHeader());
        $this->assertFalse($slider->hasHeader());
        $this->assertSame(Slider::VIEW_LANDSCAPE, $slider->getView());
        $this->assertTrue($slider->hasView());
        $this->assertEmpty($slider->getItems());
        $this->assertFalse($slider->hasItems());

        $slider = new Slider($this->items);
        $this->assertTrue($slider->hasItems());
    }

    /**
     * Testing of the "header" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Slider::setHeader
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Slider::hasHeader
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Slider::getHeader
     *
     * @return void
     */
    public function testHeader(): void
    {
        $slider = new Slider();
        $slider->setHeader($this->header);
        $this->assertSame($this->header, $slider->getHeader());
        $this->assertTrue($slider->hasHeader());

        $slider = new Slider();
        $slider->setHeader('');
        $this->assertNull($slider->getHeader());
        $this->assertFalse($slider->hasHeader());

        $slider = new Slider();
        $slider->setHeader(null);
        $this->assertNull($slider->getHeader());
        $this->assertFalse($slider->hasHeader());
    }

    /**
     * Testing of the "orientation" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Slider::setView
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Slider::hasView
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Slider::getView
     *
     * @return void
     */
    public function testOrientation(): void
    {
        $slider = new Slider();
        $slider->setView($this->orientation);
        $this->assertSame($this->orientation, $slider->getView());
        $this->assertTrue($slider->hasView());

        $slider = new Slider();
        $slider->setView('');
        $this->assertSame(Slider::VIEW_LANDSCAPE, $slider->getView());
        $this->assertTrue($slider->hasView());

        $slider = new Slider();
        $slider->setView(null);
        $this->assertSame(Slider::VIEW_LANDSCAPE, $slider->getView());
        $this->assertTrue($slider->hasView());

        $slider = new Slider();
        $slider->setView('orientation');
        $this->assertSame(Slider::VIEW_LANDSCAPE, $slider->getView());
        $this->assertTrue($slider->hasView());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Slider::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $slider = Slider::create();
        $this->assertInstanceOf(Slider::class, $slider);
        $this->assertEmpty($slider->getItems());

        $slider = Slider::create($this->items);
        $this->assertEquals($this->items, $slider->getItems());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $slider = (new Slider())->header($this->header);
        $this->assertInstanceOf(Slider::class, $slider);
        $this->assertSame($this->header, $slider->getHeader());

        $slider = (new Slider())->view($this->orientation);
        $this->assertInstanceOf(Slider::class, $slider);
        $this->assertSame( $this->orientation, $slider->getView());
    }
}

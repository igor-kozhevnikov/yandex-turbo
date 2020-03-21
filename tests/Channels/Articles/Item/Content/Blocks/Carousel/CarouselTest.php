<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Carousel;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Carousel;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Carousel" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Carousel
 */
class CarouselTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Carousel::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $carousel = new Carousel();
        $this->assertEmpty($carousel->getItems());
        $this->assertFalse($carousel->hasItems());
        $this->assertNull($carousel->getHeader());
        $this->assertFalse($carousel->hasHeader());

        $carousel = new Carousel([new Item()]);
        $this->assertNotEmpty($carousel->getItems());
        $this->assertTrue($carousel->hasItems());
    }

    /**
     * Testing of the "header" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Carousel::setHeader
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Carousel::hasHeader
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Carousel::getHeader
     *
     * @return void
     */
    public function testHeader(): void
    {
        $carousel = new Carousel();
        $carousel->setHeader('header');
        $this->assertSame('header', $carousel->getHeader());
        $this->assertTrue($carousel->hasHeader());

        $carousel = new Carousel();
        $carousel->setHeader('');
        $this->assertNull($carousel->getHeader());
        $this->assertFalse($carousel->hasHeader());

        $carousel = new Carousel();
        $carousel->setHeader(null);
        $this->assertNull($carousel->getHeader());
        $this->assertFalse($carousel->hasHeader());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Carousel::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $carousel = Carousel::create([new Item()]);
        $this->assertInstanceOf(Carousel::class, $carousel);
        $this->assertNotEmpty($carousel->getItems());
        $this->assertTrue($carousel->hasItems());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $carousel = (new Carousel())->header('header');
        $this->assertInstanceOf(Carousel::class, $carousel);
        $this->assertSame('header', $carousel->getHeader());
        $this->assertTrue($carousel->hasHeader());
    }
}

<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Slider;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Image" item of the "Slider" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Slider
 */
class ImageTest extends TestCase
{
    /**
     * The image URL.
     *
     * @var string|null
     */
    private $image;

    /**
     * The caption.
     *
     * @var string|null
     */
    private $caption;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->image = 'http://example.com';
        $this->caption = 'caption';
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $image = new Image();
        $this->assertNull($image->getImage());
        $this->assertFalse($image->hasImage());
        $this->assertNull($image->getCaption());
        $this->assertFalse($image->hasCaption());

        $image = new Image($this->image);
        $this->assertSame($this->image, $image->getImage());
        $this->assertTrue($image->hasImage());
    }

    /**
     * Testing of the "image" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image::setImage
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image::hasImage
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image::getImage
     *
     * @return void
     */
    public function testImage(): void
    {
        $image = new Image();
        $image->setImage($this->image);
        $this->assertSame($this->image, $image->getImage());
        $this->assertTrue($image->hasImage());

        $image = new Image();
        $image->setImage('');
        $this->assertNull($image->getImage());
        $this->assertFalse($image->hasImage());

        $image = new Image();
        $image->setImage(null);
        $this->assertNull($image->getImage());
        $this->assertFalse($image->hasImage());

        $image = new Image();
        $image->setImage('image');
        $this->assertNull($image->getImage());
        $this->assertFalse($image->hasImage());
    }

    /**
     * Testing of the "caption" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image::setCaption
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image::hasCaption
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image::getCaption
     *
     * @return void
     */
    public function testCaption(): void
    {
        $image = new Image();
        $image->setCaption($this->caption);
        $this->assertSame($this->caption, $image->getCaption());
        $this->assertTrue($image->hasCaption());

        $image = new Image();
        $image->setCaption('');
        $this->assertNull($image->getCaption());
        $this->assertFalse($image->hasCaption());

        $image = new Image();
        $image->setCaption(null);
        $this->assertNull($image->getCaption());
        $this->assertFalse($image->hasCaption());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $image = new Image();
        $this->assertFalse($image->isValid());

        $image = new Image();
        $image->setImage($this->image);
        $this->assertTrue($image->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $image = Image::create();
        $this->assertInstanceOf(Image::class, $image);
        $this->assertNull($image->getImage());
        $this->assertNull($image->getCaption());

        $image = Image::create($this->image, $this->caption);
        $this->assertInstanceOf(Image::class, $image);
        $this->assertSame($this->image, $image->getImage());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $image = (new Image())->image($this->image);
        $this->assertInstanceOf(Image::class, $image);
        $this->assertSame($this->image, $image->getImage());

        $image = (new Image())->caption($this->caption);
        $this->assertInstanceOf(Image::class, $image);
        $this->assertSame($this->caption, $image->getCaption());
    }
}

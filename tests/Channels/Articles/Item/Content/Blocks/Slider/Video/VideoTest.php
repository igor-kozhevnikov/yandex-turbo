<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Slider;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Video" item of the "Slider" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Slider
 */
class VideoTest extends TestCase
{
    /**
     * The video frame width.
     *
     * @var int|null
     */
    private $width;

    /**
     * The video frame height.
     *
     * @var int|null
     */
    private $height;

    /**
     * The video source URL.
     *
     * @var string|null
     */
    private $source;

    /**
     * The video type.
     *
     * @var string|null
     */
    private $type;

    /**
     * The video duration.
     *
     * @var int|null
     */
    private $duration;

    /**
     * The title.
     *
     * @var string|null
     */
    private $title;

    /**
     * The preview image URL.
     *
     * @var string|null
     */
    private $preview;

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
        $this->width = 100;
        $this->height = 200;
        $this->source = 'http://example.com';
        $this->type = 'type';
        $this->duration = 60;
        $this->title = 'title';
        $this->preview = 'http://example.com';
        $this->caption = 'caption';
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $video = new Video();
        $this->assertNull($video->getWidth());
        $this->assertFalse($video->hasWidth());
        $this->assertNull($video->getHeight());
        $this->assertFalse($video->hasHeight());
        $this->assertNull($video->getSource());
        $this->assertFalse($video->hasSource());
        $this->assertNull($video->getType());
        $this->assertFalse($video->hasType());
        $this->assertNull($video->getDuration());
        $this->assertFalse($video->hasDuration());
        $this->assertNull($video->getTitle());
        $this->assertFalse($video->hasTitle());
        $this->assertNull($video->getPreview());
        $this->assertFalse($video->hasPreview());
        $this->assertNull($video->getCaption());
        $this->assertFalse($video->hasCaption());

        $video = new Video($this->width, $this->height, $this->source, $this->type, $this->duration);
        $this->assertSame($this->width, $video->getWidth());
        $this->assertTrue($video->hasWidth());
        $this->assertSame($this->height, $video->getHeight());
        $this->assertTrue($video->hasHeight());
        $this->assertSame($this->source, $video->getSource());
        $this->assertTrue($video->hasSource());
        $this->assertSame($this->type, $video->getType());
        $this->assertTrue($video->hasType());
        $this->assertSame($this->duration, $video->getDuration());
        $this->assertTrue($video->hasDuration());
    }

    /**
     * Testing of the "width" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::setWidth
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::hasWidth
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::getWidth
     *
     * @return void
     */
    public function testWidth(): void
    {
        $video = new Video();
        $video->setWidth($this->width);
        $this->assertSame($this->width, $video->getWidth());
        $this->assertTrue($video->hasWidth());

        $video = new Video();
        $video->setWidth("$this->width");
        $this->assertSame($this->width, $video->getWidth());
        $this->assertTrue($video->hasWidth());

        $video = new Video();
        $video->setWidth('');
        $this->assertNull($video->getWidth());
        $this->assertFalse($video->hasWidth());

        $video = new Video();
        $video->setWidth(null);
        $this->assertNull($video->getWidth());
        $this->assertFalse($video->hasWidth());

        $video = new Video();
        $video->setWidth(-10);
        $this->assertNull($video->getWidth());
        $this->assertFalse($video->hasWidth());

        $video = new Video();
        $video->setWidth('width');
        $this->assertNull($video->getWidth());
        $this->assertFalse($video->hasWidth());
    }

    /**
     * Testing of the "height" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::setHeight
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::hasHeight
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::getHeight
     *
     * @return void
     */
    public function testHeight(): void
    {
        $video = new Video();
        $video->setHeight($this->height);
        $this->assertSame($this->height, $video->getHeight());
        $this->assertTrue($video->hasHeight());

        $video = new Video();
        $video->setHeight("$this->height");
        $this->assertSame($this->height, $video->getHeight());
        $this->assertTrue($video->hasHeight());

        $video = new Video();
        $video->setHeight('');
        $this->assertNull($video->getHeight());
        $this->assertFalse($video->hasHeight());

        $video = new Video();
        $video->setHeight(null);
        $this->assertNull($video->getHeight());
        $this->assertFalse($video->hasHeight());

        $video = new Video();
        $video->setHeight(-10);
        $this->assertNull($video->getHeight());
        $this->assertFalse($video->hasHeight());

        $video = new Video();
        $video->setHeight('width');
        $this->assertNull($video->getHeight());
        $this->assertFalse($video->hasHeight());
    }

    /**
     * Testing of the "source" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::setSource
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::hasSource
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::getSource
     *
     * @return void
     */
    public function testSource(): void
    {
        $video = new Video();
        $video->setSource($this->source);
        $this->assertSame($this->source, $video->getSource());
        $this->assertTrue($video->hasSource());

        $video = new Video();
        $video->setSource('');
        $this->assertNull($video->getSource());
        $this->assertFalse($video->hasSource());

        $video = new Video();
        $video->setSource(null);
        $this->assertNull($video->getSource());
        $this->assertFalse($video->hasSource());

        $video = new Video();
        $video->setSource('source');
        $this->assertNull($video->getSource());
        $this->assertFalse($video->hasSource());
    }

    /**
     * Testing of the "type" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::setType
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::hasType
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::getType
     *
     * @return void
     */
    public function testType(): void
    {
        $video = new Video();
        $video->setType($this->type);
        $this->assertSame($this->type, $video->getType());
        $this->assertTrue($video->hasType());

        $video = new Video();
        $video->setType('');
        $this->assertNull($video->getType());
        $this->assertFalse($video->hasType());

        $video = new Video();
        $video->setType(null);
        $this->assertNull($video->getType());
        $this->assertFalse($video->hasType());
    }

    /**
     * Testing of the "duration" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::setDuration
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::hasDuration
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::getDuration
     *
     * @return void
     */
    public function testDuration(): void
    {
        $video = new Video();
        $video->setDuration($this->duration);
        $this->assertSame($this->duration, $video->getDuration());
        $this->assertTrue($video->hasDuration());

        $video = new Video();
        $video->setDuration("$this->duration");
        $this->assertSame($this->duration, $video->getDuration());
        $this->assertTrue($video->hasDuration());

        $video = new Video();
        $video->setDuration('');
        $this->assertNull($video->getDuration());
        $this->assertFalse($video->hasDuration());

        $video = new Video();
        $video->setDuration(null);
        $this->assertNull($video->getDuration());
        $this->assertFalse($video->hasDuration());

        $video = new Video();
        $video->setDuration(-10);
        $this->assertNull($video->getDuration());
        $this->assertFalse($video->hasDuration());

        $video = new Video();
        $video->setDuration('width');
        $this->assertNull($video->getDuration());
        $this->assertFalse($video->hasDuration());
    }

    /**
     * Testing of the "title" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::setTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::hasTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::getTitle
     *
     * @return void
     */
    public function testTitle(): void
    {
        $video = new Video();
        $video->setTitle($this->title);
        $this->assertSame($this->title, $video->getTitle());
        $this->assertTrue($video->hasTitle());

        $video = new Video();
        $video->setTitle('');
        $this->assertNull($video->getTitle());
        $this->assertFalse($video->hasTitle());

        $video = new Video();
        $video->setTitle(null);
        $this->assertNull($video->getTitle());
        $this->assertFalse($video->hasTitle());
    }

    /**
     * Testing of the "preview" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::setPreview
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::hasPreview
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::getPreview
     *
     * @return void
     */
    public function testPreview(): void
    {
        $video = new Video();
        $video->setPreview($this->preview);
        $this->assertSame($this->preview, $video->getPreview());
        $this->assertTrue($video->hasPreview());

        $video = new Video();
        $video->setPreview('');
        $this->assertNull($video->getPreview());
        $this->assertFalse($video->hasPreview());

        $video = new Video();
        $video->setPreview(null);
        $this->assertNull($video->getPreview());
        $this->assertFalse($video->hasPreview());

        $video = new Video();
        $video->setPreview('preview');
        $this->assertNull($video->getPreview());
        $this->assertFalse($video->hasPreview());
    }

    /**
     * Testing of the "caption" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::setCaption
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::hasCaption
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::getCaption
     *
     * @return void
     */
    public function testCaption(): void
    {
        $video = new Video();
        $video->setCaption($this->caption);
        $this->assertSame($this->caption, $video->getCaption());
        $this->assertTrue($video->hasCaption());

        $video = new Video();
        $video->setCaption('');
        $this->assertNull($video->getCaption());
        $this->assertFalse($video->hasCaption());

        $video = new Video();
        $video->setCaption(null);
        $this->assertNull($video->getCaption());
        $this->assertFalse($video->hasCaption());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $video = new Video();
        $this->assertFalse($video->isValid());

        $video = new Video();
        $video->setWidth($this->width);
        $video->setHeight($this->height);
        $video->setSource($this->source);
        $video->setType($this->title);
        $video->setDuration($this->duration);
        $this->assertTrue($video->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $video = Video::create();
        $this->assertInstanceOf(Video::class, $video);
        $this->assertNull($video->getWidth());
        $this->assertNull($video->getHeight());
        $this->assertNull($video->getSource());
        $this->assertNull($video->getType());
        $this->assertNull($video->getDuration());
        $this->assertNull($video->getTitle());
        $this->assertNull($video->getPreview());
        $this->assertNull($video->getCaption());

        $video = Video::create($this->width, $this->height, $this->source, $this->type, $this->duration);
        $this->assertInstanceOf(Video::class, $video);
        $this->assertSame($this->width, $video->getWidth());
        $this->assertSame($this->height, $video->getHeight());
        $this->assertSame($this->source, $video->getSource());
        $this->assertSame($this->type, $video->getType());
        $this->assertSame($this->duration, $video->getDuration());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $video = (new Video())->width($this->width);
        $this->assertInstanceOf(Video::class, $video);
        $this->assertSame($this->width, $video->getWidth());

        $video = (new Video())->height($this->height);
        $this->assertInstanceOf(Video::class, $video);
        $this->assertSame($this->height, $video->getHeight());

        $video = (new Video())->source($this->source);
        $this->assertInstanceOf(Video::class, $video);
        $this->assertSame($this->source, $video->getSource());

        $video = (new Video())->type($this->type);
        $this->assertInstanceOf(Video::class, $video);
        $this->assertSame($this->type, $video->getType());

        $video = (new Video())->duration($this->duration);
        $this->assertInstanceOf(Video::class, $video);
        $this->assertSame($this->duration, $video->getDuration());

        $video = (new Video())->title($this->title);
        $this->assertInstanceOf(Video::class, $video);
        $this->assertSame($this->title, $video->getTitle());

        $video = (new Video())->preview($this->preview);
        $this->assertInstanceOf(Video::class, $video);
        $this->assertSame($this->preview, $video->getPreview());

        $video = (new Video())->caption($this->caption);
        $this->assertInstanceOf(Video::class, $video);
        $this->assertSame($this->caption, $video->getCaption());
    }
}

<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Button;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio\Audio;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio\AudioRender;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Audio" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Audio
 */
class AudioTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio\Audio::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $audio = new Audio();
        $this->assertFalse($audio->hasSrc());
        $this->assertNull($audio->getSrc());
        $this->assertTrue($audio->hasRenderer());
        $this->assertInstanceOf(AudioRender::class, $audio->getRenderer());

        $audio = new Audio('http://example.com');
        $this->assertTrue($audio->hasSrc());
        $this->assertSame('http://example.com', $audio->getSrc());
    }

    /**
     * Testing of the "src" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio\Audio::setSrc
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio\Audio::getSrc
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio\Audio::hasSrc
     *
     * @return void
     */
    public function testSrc(): void
    {
        $audio = new Audio();
        $this->assertFalse($audio->hasSrc());
        $this->assertNull($audio->getSrc());

        $audio = new Audio();
        $audio->setSrc('http://example.com');
        $this->assertTrue($audio->hasSrc());
        $this->assertSame('http://example.com', $audio->getSrc());

        $audio = new Audio();
        $audio->setSrc('http://example.com');
        $audio->setSrc(null);
        $this->assertFalse($audio->hasSrc());
        $this->assertNull($audio->getSrc());

        $audio = new Audio();
        $audio->setSrc('invalid url');
        $this->assertFalse($audio->hasSrc());
        $this->assertNull($audio->getSrc());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio\Audio::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $audio = new Audio();
        $this->assertFalse($audio->isValid());

        $audio = new Audio();
        $audio->setSrc('http://example.com');
        $this->assertTrue($audio->isValid());
    }

    /**
     * Testing of the creating methods.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio\Audio::create
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio\Audio::createFromArray
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio\Audio::createFromClosure
     *
     * @return void
     */
    public function testCreatingMethods(): void
    {
        $audio = Audio::create('http://example.com');
        $this->assertInstanceOf(Audio::class, $audio);
        $this->assertSame('http://example.com', $audio->getSrc());

        $audio = Audio::createFromArray(['src' => 'http://example.com']);
        $this->assertInstanceOf(Audio::class, $audio);
        $this->assertSame('http://example.com', $audio->getSrc());

        $audio = Audio::createFromClosure(function (Audio $audio) { $audio->setSrc('http://example.com'); });
        $this->assertInstanceOf(Audio::class, $audio);
        $this->assertSame('http://example.com', $audio->getSrc());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $audio = (new Audio())->src('http://example.com');
        $this->assertInstanceOf(Audio::class, $audio);
        $this->assertSame('http://example.com', $audio->getSrc());
    }
}

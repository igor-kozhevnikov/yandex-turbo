<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\RelatedLinks\External;

use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the external related link.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\RelatedLinks\External
 */
class LinkTest extends TestCase
{
    /**
     * The URL provider.
     *
     * @return array
     */
    public function urlProvider(): array
    {
        return [
            'Nullable' => [
                null, null, false,
            ],
            'Empty' => [
                '', null, false,
            ],
            'Whitespace' => [
                ' ', null, false,
            ],
            'Invalid' => [
                'example.com', null, false,
            ],
            'Valid' => [
                'http://example.com', 'http://example.com', true,
            ],
        ];
    }

    /**
     * The text provider.
     *
     * @return array
     */
    public function textProvider(): array
    {
        return [
            'Nullable' => [
                null, null, false,
            ],
            'Empty' => [
                '', null, false,
            ],
            'Whitespace' => [
                ' ', null, false,
            ],
            'Valid' => [
                'text', 'text', true,
            ],
            'Valid with tags and whitespaces' => [
                ' <h1> text </h1> ', 'text', true,
            ],
            'Special characters' => [
                '& " \' > < ', '&amp; &quot; &#039; &gt; &lt;', true,
            ],
        ];
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $text = 'text';
        $url = 'http://example.com';

        $link = new Link($text, $url);
        $this->assertSame($text, $link->getText());
        $this->assertTrue($link->hasText());
        $this->assertSame($url, $link->getUrl());
        $this->assertTrue($link->hasUrl());

        $link = new Link(null, null);
        $this->assertNull($link->getText());
        $this->assertFalse($link->hasText());
        $this->assertNull($link->getUrl());
        $this->assertFalse($link->hasUrl());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $text = 'text';
        $url = 'http://example.com';

        $link = Link::create($text, $url);
        $this->assertInstanceOf(Link::class, $link);
        $this->assertSame($text, $link->getText());
        $this->assertTrue($link->hasText());
        $this->assertSame($url, $link->getUrl());
        $this->assertTrue($link->hasUrl());
    }

    /**
     * Testing of the "text" variable.
     *
     * @param string|null $passed
     *   A passed value.
     * @param string|null $expected
     *   An expected value.
     * @param bool $has
     *   Indicate if is set a variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::setText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::hasText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::getText
     *
     * @dataProvider textProvider
     *
     * @return void
     */
    public function testText(?string $passed, ?string $expected, bool $has): void
    {
        $link = new Link();
        $link->setText($passed);

        $this->assertSame($expected, $link->getText());
        $this->assertSame($has, $link->hasText());
    }

    /**
     * Testing of the "url" variable.
     *
     * @param string|null $passed
     *   A passed value.
     * @param string|null $expected
     *   An expected value.
     * @param bool $has
     *   Indicate if is set a variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::setUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::hasUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::getUrl
     *
     * @dataProvider urlProvider
     *
     * @return void
     */
    public function testUrl(?string $passed, ?string $expected, bool $has): void
    {
        $link = new Link();
        $link->setUrl($passed);

        $this->assertSame($expected, $link->getUrl());
        $this->assertSame($has, $link->hasUrl());
    }

    /**
     * Testing of the "image" variable.
     *
     * @param string|null $passed
     *   A passed value.
     * @param string|null $expected
     *   An expected value.
     * @param bool $has
     *   Indicate if is set a variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::setImage
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::hasImage
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::getImage
     *
     * @dataProvider urlProvider
     *
     * @return void
     */
    public function testImage(?string $passed, ?string $expected, bool $has): void
    {
        $link = new Link();
        $link->setImage($passed);

        $this->assertSame($expected, $link->getImage());
        $this->assertSame($has, $link->hasImage());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $text = 'text';
        $url = 'http://example.com';
        $image = 'http://example.com';

        $link = new Link();

        // Text.
        $link = $link->text($text);
        $this->assertInstanceOf(Link::class, $link);
        $this->assertSame($text, $link->getText());
        $this->assertTrue($link->hasText());

        // URL.
        $link = $link->url($url);
        $this->assertInstanceOf(Link::class, $link);
        $this->assertSame($url, $link->getUrl());
        $this->assertTrue($link->hasUrl());

        // Image.
        $link = $link->image($image);
        $this->assertInstanceOf(Link::class, $link);
        $this->assertSame($image, $link->getImage());
        $this->assertTrue($link->hasImage());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        // Invalid.
        $link = new Link();
        $this->assertFalse($link->isValid());

        // Valid.
        $link = new Link();
        $link->setText('text');
        $link->setUrl('http://example.com');
        $this->assertTrue($link->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $links = new RelatedLinks();
        $this->assertFalse($links->hasExternals());
        $this->assertSame(0, count($links->getExternals()));

        $link = new Link();
        $link->appendTo($links);

        $this->assertTrue($links->hasExternals());
        $this->assertSame(1, count($links->getExternals()));
    }
}

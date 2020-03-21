<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\RelatedLinks\Infinity;

use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the infinity related link.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\RelatedLinks\Infinity
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
     * Testing of the "__construct" method.
     *
     * @param string|null $passed
     *   A passed value.
     * @param string|null $expected
     *   An expected value.
     * @param bool $has
     *   Indicate if is set a variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link::__construct
     *
     * @dataProvider urlProvider
     *
     * @return void
     */
    public function testConstruct(?string $passed, ?string $expected, bool $has): void
    {
        $link = new Link($passed);
        $this->assertSame($expected, $link->getUrl());
        $this->assertSame($has, $link->hasUrl());
    }

    /**
     * Testing of the "create" method.
     *
     * @param string|null $passed
     *   A passed value.
     * @param string|null $expected
     *   An expected value.
     * @param bool $has
     *   Indicate if is set a variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link::create
     *
     * @dataProvider urlProvider
     *
     * @return void
     */
    public function testCreate(?string $passed, ?string $expected, bool $has): void
    {
        $link = Link::create($passed);
        $this->assertSame($expected, $link->getUrl());
        $this->assertSame($has, $link->hasUrl());
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
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link::setUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link::hasUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link::getUrl
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
     * Testing of the fluent interface.
     *
     * @param string|null $passed
     *   A passed value.
     * @param string|null $expected
     *   An expected value.
     * @param bool $has
     *   Indicate if is set a variable.
     *
     * @dataProvider urlProvider
     *
     * @return void
     */
    public function testFluentInterface(?string $passed, ?string $expected, bool $has): void
    {
        $link = new Link();

        $link = $link->url($passed);
        $this->assertInstanceOf(Link::class, $link);
        $this->assertSame($expected, $link->getUrl());
        $this->assertSame($has, $link->hasUrl());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link::isValid
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
        $link->setUrl('https://example.com');
        $this->assertTrue($link->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $links = new RelatedLinks();
        $this->assertFalse($links->hasInfinities());
        $this->assertSame(0, count($links->getInfinities()));

        $link = new Link();
        $link->appendTo($links);

        $this->assertTrue($links->hasInfinities());
        $this->assertSame(1, count($links->getInfinities()));
    }
}

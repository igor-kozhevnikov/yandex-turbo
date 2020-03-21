<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link;
use PHPUnit\Framework\TestCase;

/**
 * Testing breadcrumb link from the "Header" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs
 */
class LinkText extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $link = new Link();
        $this->assertNull($link->getText());
        $this->assertFalse($link->hasText());
        $this->assertNull($link->getUrl());
        $this->assertFalse($link->hasUrl());

        $link = new Link('text', 'http://example.com');
        $this->assertSame('text', $link->getText());
        $this->assertSame('http://example.com', $link->getUrl());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Link::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $link = Link::create();
        $this->assertNull($link->getText());
        $this->assertFalse($link->hasText());
        $this->assertNull($link->getUrl());
        $this->assertFalse($link->hasUrl());

        $link = Link::create('text', 'http://example.com');
        $this->assertSame('text', $link->getText());
        $this->assertSame('http://example.com', $link->getUrl());
    }

    /**
     * Testing of the "text" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link::setText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link::hasText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link::getText
     *
     * @return void
     */
    public function testText(): void
    {
        // Init.
        $link = new Link();
        $this->assertNull($link->getText());
        $this->assertFalse($link->hasText());

        // Null.
        $link = new Link();
        $link->setText(null);
        $this->assertNull($link->getText());
        $this->assertFalse($link->hasText());

        // Empty.
        $link = new Link();
        $link->setText('');
        $this->assertNull($link->getText());
        $this->assertFalse($link->hasText());

        // String.
        $link = new Link();
        $link->setText('text');
        $this->assertSame('text', $link->getText());
        $this->assertTrue($link->hasText());
    }

    /**
     * Testing of the "url" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link::setUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link::hasUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link::getUrl
     *
     * @return void
     */
    public function testUrl(): void
    {
        // Init.
        $link = new Link();
        $this->assertNull($link->getUrl());
        $this->assertFalse($link->hasUrl());

        // Null.
        $link = new Link();
        $link->setUrl(null);
        $this->assertNull($link->getText());
        $this->assertFalse($link->hasText());

        // Invalid.
        $link = new Link();
        $link->setUrl('example.com');
        $this->assertNull($link->getUrl());
        $this->assertFalse($link->hasUrl());

        // Valid.
        $link = new Link();
        $link->setUrl('http://example.com');
        $this->assertSame('http://example.com', $link->getUrl());
        $this->assertTrue($link->hasUrl());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $link = new Link();
        $this->assertFalse($link->isValid());

        $link = new Link('text', 'http://example.com');
        $this->assertTrue($link->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $breadcrumbs = new Breadcrumbs();
        $this->assertFalse($breadcrumbs->isNotEmpty());

        $link = new Link('text', 'http://example.com');
        $link->appendTo($breadcrumbs);

        $this->assertTrue($breadcrumbs->isNotEmpty());
        $this->assertSame(1, count($breadcrumbs->getLinks()));
    }
}

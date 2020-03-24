<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Metrics\Yandex;

use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb;
use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex;
use PHPUnit\Framework\TestCase;

/**
 * Testing a breadcrumb of the "Yandex" metric.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Metrics\Yandex
 */
class BreadcrumbTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $breadcrumb = new Breadcrumb();
        $this->assertFalse($breadcrumb->hasText());
        $this->assertNull($breadcrumb->getText());
        $this->assertFalse($breadcrumb->hasUrl());
        $this->assertNull($breadcrumb->getUrl());

        $breadcrumb = new Breadcrumb('text', 'http://example.com');
        $this->assertTrue($breadcrumb->hasText());
        $this->assertSame('text', $breadcrumb->getText());
        $this->assertTrue($breadcrumb->hasUrl());
        $this->assertSame('http://example.com', $breadcrumb->getUrl());
    }

    /**
     * Testing of the "text" property.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb::setText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb::getText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb::hasText
     *
     * @return void
     */
    public function testText(): void
    {
        $breadcrumb = new Breadcrumb();
        $this->assertFalse($breadcrumb->hasText());
        $this->assertNull($breadcrumb->getText());

        $breadcrumb = new Breadcrumb();
        $breadcrumb->setText('text');
        $this->assertTrue($breadcrumb->hasText());
        $this->assertSame('text', $breadcrumb->getText());

        $breadcrumb = new Breadcrumb();
        $breadcrumb->setText('text');
        $breadcrumb->setText(null);
        $this->assertFalse($breadcrumb->hasText());
        $this->assertNull($breadcrumb->getText());

        $breadcrumb = new Breadcrumb();
        $breadcrumb->setText('');
        $this->assertFalse($breadcrumb->hasText());
        $this->assertNull($breadcrumb->getText());
    }

    /**
     * Testing of the "url" property.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb::setUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb::getUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb::hasUrl
     *
     * @return void
     */
    public function testUrl(): void
    {
        $breadcrumb = new Breadcrumb();
        $this->assertFalse($breadcrumb->hasUrl());
        $this->assertNull($breadcrumb->getUrl());

        $breadcrumb = new Breadcrumb();
        $breadcrumb->setUrl('http://example.com');
        $this->assertTrue($breadcrumb->hasUrl());
        $this->assertSame('http://example.com', $breadcrumb->getUrl());

        $breadcrumb = new Breadcrumb();
        $breadcrumb->setUrl('http://example.com');
        $breadcrumb->setUrl(null);
        $this->assertFalse($breadcrumb->hasUrl());
        $this->assertNull($breadcrumb->getUrl());

        $breadcrumb = new Breadcrumb();
        $breadcrumb->setUrl('url');
        $this->assertFalse($breadcrumb->hasUrl());
        $this->assertNull($breadcrumb->getUrl());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $breadcrumb = new Breadcrumb();
        $this->assertFalse($breadcrumb->isValid());

        $breadcrumb = new Breadcrumb('text', 'http://example.com');
        $this->assertTrue($breadcrumb->isValid());
    }

    /**
     * Testing of the creating methods.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb::create
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb::createFromArray
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb::createFromClosure
     *
     * @return void
     */
    public function testCreatingMethods(): void
    {
        $breadcrumb = Breadcrumb::create('text', 'http://example.com');
        $this->assertInstanceOf(Breadcrumb::class, $breadcrumb);
        $this->assertSame('text', $breadcrumb->getText());
        $this->assertSame('http://example.com', $breadcrumb->getUrl());

        $breadcrumb = Breadcrumb::createFromArray([
            'text' => 'text',
            'url' => 'http://example.com',
        ]);
        $this->assertInstanceOf(Breadcrumb::class, $breadcrumb);
        $this->assertSame('text', $breadcrumb->getText());
        $this->assertSame('http://example.com', $breadcrumb->getUrl());

        $breadcrumb = Breadcrumb::createFromClosure(function (Breadcrumb $breadcrumb) {
            $breadcrumb->setText('text');
            $breadcrumb->setUrl('http://example.com');
        });
        $this->assertInstanceOf(Breadcrumb::class, $breadcrumb);
        $this->assertSame('text', $breadcrumb->getText());
        $this->assertSame('http://example.com', $breadcrumb->getUrl());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $breadcrumb = (new Breadcrumb())->text('text');
        $this->assertInstanceOf(Breadcrumb::class, $breadcrumb);
        $this->assertSame('text', $breadcrumb->getText());

        $breadcrumb = (new Breadcrumb())->url('http://example.com');
        $this->assertInstanceOf(Breadcrumb::class, $breadcrumb);
        $this->assertSame('http://example.com', $breadcrumb->getUrl());
    }
}

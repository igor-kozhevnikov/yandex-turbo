<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\Custom;

use Mireon\YandexTurbo\Channels\Articles\Analytic\Custom\Custom;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Custom" analytic.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\Custom
 */
class CustomTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Custom\Custom::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $custom = new Custom();
        $this->assertSame('custom', $custom->getType());
        $this->assertTrue($custom->hasType());
        $this->assertNull($custom->getUrl());
        $this->assertFalse($custom->hasUrl());

        $custom = new Custom(null);
        $this->assertNull($custom->getUrl());
        $this->assertFalse($custom->hasUrl());

        $custom = new Custom('http://example.com');
        $this->assertSame('http://example.com', $custom->getUrl());
        $this->assertTrue($custom->hasUrl());
    }

    /**
     * Testing of the "url" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Custom\Custom::setUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Custom\Custom::hasUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Custom\Custom::getUrl
     *
     * @return void
     */
    public function testUrl(): void
    {
        $custom = new Custom();
        $custom->setUrl(null);
        $this->assertNull($custom->getUrl());
        $this->assertFalse($custom->hasUrl());

        $custom = new Custom();
        $custom->setUrl('');
        $this->assertNull($custom->getUrl());
        $this->assertFalse($custom->hasUrl());

        $custom = new Custom();
        $custom->setUrl('link');
        $this->assertNull($custom->getUrl());
        $this->assertFalse($custom->hasUrl());

        $custom = new Custom();
        $custom->setUrl('http://example.com');
        $this->assertSame('http://example.com', $custom->getUrl());
        $this->assertTrue($custom->hasUrl());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $custom = new Custom();
        $custom = $custom->url('http://example.com');
        $this->assertInstanceOf(Custom::class, $custom);
        $this->assertSame('http://example.com', $custom->getUrl());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Custom\Custom::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $custom = Custom::create();
        $this->assertInstanceOf(Custom::class, $custom);
        $this->assertNull($custom->getUrl());

        $custom = Custom::create('http://example.com');
        $this->assertInstanceOf(Custom::class, $custom);
        $this->assertSame('http://example.com', $custom->getUrl());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Custom\Custom::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $custom = new Custom();
        $this->assertFalse($custom->isValid());

        $custom = new Custom();
        $custom->setUrl('http://example.com');
        $this->assertTrue($custom->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Custom\Custom::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $analytics = new Analytics();
        $this->assertFalse($analytics->isNotEmpty());

        $custom = new Custom();
        $custom->appendTo($analytics);
        $this->assertTrue($analytics->isNotEmpty());
    }
}

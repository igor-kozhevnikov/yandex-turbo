<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\LiveInternet;

use Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet\LiveInternet;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "LiveInternet" analytic.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\LiveInternet
 */
class LiveInternetTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet\LiveInternet::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $live = new LiveInternet();
        $this->assertTrue($live->hasType());
        $this->assertSame('LiveInternet', $live->getType());
        $this->assertNull($live->getParams());
        $this->assertFalse($live->hasParams());

        $live = new LiveInternet(null);
        $this->assertNull($live->getParams());
        $this->assertFalse($live->hasParams());

        $live = new LiveInternet('123456789');
        $this->assertSame('123456789', $live->getParams());
        $this->assertTrue($live->hasParams());
    }

    /**
     * Testing of the "params" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet\LiveInternet::setParams
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet\LiveInternet::hasParams
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet\LiveInternet::getParams
     *
     * @return void
     */
    public function testParams(): void
    {
        $live = new LiveInternet();
        $live->setParams(null);
        $this->assertNull($live->getParams());
        $this->assertFalse($live->hasParams());

        $live = new LiveInternet();
        $live->setParams('');
        $this->assertNull($live->getParams());
        $this->assertFalse($live->hasParams());

        $live = new LiveInternet();
        $live->setParams('123456789');
        $this->assertSame('123456789', $live->getParams());
        $this->assertTrue($live->hasParams());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $live = new LiveInternet();
        $live = $live->params('123456789');
        $this->assertInstanceOf(LiveInternet::class, $live);
        $this->assertSame('123456789', $live->getParams());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet\LiveInternet::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $live = LiveInternet::create();
        $this->assertInstanceOf(LiveInternet::class, $live);
        $this->assertNull($live->getParams());

        $live = LiveInternet::create('123456789');
        $this->assertInstanceOf(LiveInternet::class, $live);
        $this->assertSame('123456789', $live->getParams());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet\LiveInternet::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $live = new LiveInternet();
        $this->assertTrue($live->isValid());

        $live = new LiveInternet();
        $live->setParams('123456789');
        $this->assertTrue($live->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet\LiveInternet::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $analytics = new Analytics();
        $this->assertFalse($analytics->isNotEmpty());

        $live = new LiveInternet();
        $live->appendTo($analytics);
        $this->assertTrue($analytics->isNotEmpty());
    }
}

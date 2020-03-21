<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\Yandex;

use Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Yandex" analytic.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\Yandex
 */
class YandexTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $yandex = new Yandex();
        $this->assertTrue($yandex->hasType());
        $this->assertSame('Yandex', $yandex->getType());
        $this->assertNull($yandex->getId());
        $this->assertFalse($yandex->hasId());
        $this->assertNull($yandex->getParams());
        $this->assertFalse($yandex->hasParams());

        $yandex = new Yandex('123456789', '123456789');
        $this->assertSame('123456789', $yandex->getId());
        $this->assertTrue($yandex->hasId());
        $this->assertSame('123456789', $yandex->getParams());
        $this->assertTrue($yandex->hasParams());
    }

    /**
     * Testing of the "id" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex::setId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex::hasId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex::getId
     *
     * @return void
     */
    public function testId(): void
    {
        $yandex = new Yandex();
        $yandex->setId(null);
        $this->assertNull($yandex->getId());
        $this->assertFalse($yandex->hasId());

        $yandex = new Yandex();
        $yandex->setId('');
        $this->assertNull($yandex->getId());
        $this->assertFalse($yandex->hasId());

        $yandex = new Yandex();
        $yandex->setId('123456789');
        $this->assertSame('123456789', $yandex->getId());
        $this->assertTrue($yandex->hasId());
    }

    /**
     * Testing of the "params" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex::setParams
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex::hasParams
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex::getParams
     *
     * @return void
     */
    public function testParams(): void
    {
        $yandex = new Yandex();
        $yandex->setParams(null);
        $this->assertNull($yandex->getParams());
        $this->assertFalse($yandex->hasParams());

        $yandex = new Yandex();
        $yandex->setParams('');
        $this->assertNull($yandex->getParams());
        $this->assertFalse($yandex->hasParams());

        $yandex = new Yandex();
        $yandex->setParams('123456789');
        $this->assertSame('123456789', $yandex->getParams());
        $this->assertTrue($yandex->hasParams());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $yandex = new Yandex();
        $yandex = $yandex->id('123456789');
        $this->assertInstanceOf(Yandex::class, $yandex);
        $this->assertSame('123456789', $yandex->getId());

        $yandex = new Yandex();
        $yandex = $yandex->params('123456789');
        $this->assertInstanceOf(Yandex::class, $yandex);
        $this->assertSame('123456789', $yandex->getParams());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $yandex = Yandex::create();
        $this->assertInstanceOf(Yandex::class, $yandex);
        $this->assertNull($yandex->getId());
        $this->assertNull($yandex->getParams());

        $yandex = Yandex::create('123456789', '123456789');
        $this->assertInstanceOf(Yandex::class, $yandex);
        $this->assertSame('123456789', $yandex->getId());
        $this->assertSame('123456789', $yandex->getParams());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $yandex = new Yandex();
        $this->assertFalse($yandex->isValid());

        $yandex = new Yandex();
        $yandex->setId('123456789');
        $this->assertTrue($yandex->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $analytics = new Analytics();
        $this->assertFalse($analytics->isNotEmpty());

        $yandex = new Yandex();
        $yandex->appendTo($analytics);
        $this->assertTrue($analytics->isNotEmpty());
    }
}

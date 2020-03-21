<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Ad\YandexAdNetwork;

use Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork;
use Mireon\YandexTurbo\Channels\Articles\Ad\Ads;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "YandexAdNetwork" ad.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Ad\YandexAdNetwork
 */
class YandexAdNetworkTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $ad = new YandexAdNetwork();
        $this->assertTrue($ad->hasType());
        $this->assertSame('Yandex', $ad->getType());
        $this->assertNull($ad->getTurboAdId());
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertNull($ad->getId());
        $this->assertFalse($ad->hasId());

        $ad = new YandexAdNetwork('', '');
        $this->assertNull($ad->getTurboAdId());
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertNull($ad->getId());
        $this->assertFalse($ad->hasId());

        $ad = new YandexAdNetwork('123456789', '123456789');
        $this->assertSame('123456789', $ad->getTurboAdId());
        $this->assertTrue($ad->hasTurboAdId());
        $this->assertSame('123456789', $ad->getId());
        $this->assertTrue($ad->hasId());
    }

    /**
     * Testing of the "turboAdId" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork::setTurboAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork::getTurboAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork::hasTurboAdId
     *
     * @return void
     */
    public function testTurboAdId(): void
    {
        $ad = new YandexAdNetwork();
        $ad->setTurboAdId(null);
        $this->assertNull($ad->getTurboAdId());
        $this->assertFalse($ad->hasTurboAdId());

        $ad = new YandexAdNetwork();
        $ad->setTurboAdId('');
        $this->assertNull($ad->getTurboAdId());
        $this->assertFalse($ad->hasTurboAdId());

        $ad = new YandexAdNetwork();
        $ad->setTurboAdId('123456789');
        $this->assertSame('123456789', $ad->getTurboAdId());
        $this->assertTrue($ad->hasTurboAdId());
    }

    /**
     * Testing of the "id" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork::setId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork::getId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork::hasId
     *
     * @return void
     */
    public function testMethods(): void
    {
        $ad = new YandexAdNetwork();
        $ad->setId(null);
        $this->assertNull($ad->getId());
        $this->assertFalse($ad->hasId());

        $ad = new YandexAdNetwork();
        $ad->setId('');
        $this->assertNull($ad->getId());
        $this->assertFalse($ad->hasId());

        $ad = new YandexAdNetwork();
        $ad->setId('123456789');
        $this->assertSame('123456789', $ad->getId());
        $this->assertTrue($ad->hasId());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $ad = new YandexAdNetwork();
        $ad = $ad->turboAdId('123456789');
        $this->assertInstanceOf(YandexAdNetwork::class, $ad);
        $this->assertSame('123456789', $ad->getTurboAdId());

        $ad = new YandexAdNetwork();
        $ad = $ad->id('123456789');
        $this->assertInstanceOf(YandexAdNetwork::class, $ad);
        $this->assertSame('123456789', $ad->getId());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $ad = YandexAdNetwork::create();
        $this->assertInstanceOf(YandexAdNetwork::class, $ad);
        $this->assertNull($ad->getTurboAdId());
        $this->assertNull($ad->getId());

        $ad = YandexAdNetwork::create('123456789', '123456789');
        $this->assertInstanceOf(YandexAdNetwork::class, $ad);
        $this->assertSame('123456789', $ad->getTurboAdId());
        $this->assertSame('123456789', $ad->getId());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $ad = new YandexAdNetwork();
        $this->assertFalse($ad->isValid());

        $ad = new YandexAdNetwork();
        $ad->setTurboAdId('123456789');
        $ad->setId('123456789');
        $this->assertTrue($ad->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $ads = new Ads();
        $this->assertFalse($ads->isNotEmpty());
        $this->assertSame(0, count($ads->getAds()));

        $ad = new YandexAdNetwork();
        $ad->appendTo($ads);
        $this->assertTrue($ads->isNotEmpty());
        $this->assertSame(1, count($ads->getAds()));
    }
}

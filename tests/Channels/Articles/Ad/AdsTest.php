<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Ad;

use ArrayIterator;
use Exception;
use Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox;
use Mireon\YandexTurbo\Channels\Articles\Ad\Ads;
use Mireon\YandexTurbo\Channels\Articles\Articles;
use PHPUnit\Framework\TestCase;

/**
 * Testing of ads.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Ad
 */
class AdsTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::__construct
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::setAds
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::isNotEmpty
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::getAds
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $ads = new Ads();
        $this->assertFalse($ads->isNotEmpty());
        $this->assertSame(0, count($ads->getAds()));

        $ads = new Ads([ new AdFox() ]);
        $this->assertTrue($ads->isNotEmpty());
        $this->assertSame(1, count($ads->getAds()));
    }

    /**
     * Testing of the "set" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::setAds
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::isNotEmpty
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::getAds
     *
     * @return void
     */
    public function testSet(): void
    {
        $ads = new Ads();
        $this->assertFalse($ads->isNotEmpty());
        $this->assertSame(0, count($ads->getAds()));

        $ads->setAds([ new AdFox() ]);
        $this->assertTrue($ads->isNotEmpty());
        $this->assertSame(1, count($ads->getAds()));

        $ads->setAds([]);
        $this->assertFalse($ads->isNotEmpty());
        $this->assertSame(0, count($ads->getAds()));
    }

    /**
     * Testing of the "add" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::addAd
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::isNotEmpty
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::getAds
     *
     * @return void
     */
    public function testAdd(): void
    {
        $ads = new Ads();
        $this->assertFalse($ads->isNotEmpty());
        $this->assertSame(0, count($ads->getAds()));

        $ads->addAd(new AdFox());
        $this->assertTrue($ads->isNotEmpty());
        $this->assertSame(1, count($ads->getAds()));

        $ads->addAd(new AdFox());
        $this->assertTrue($ads->isNotEmpty());
        $this->assertSame(2, count($ads->getAds()));
    }

    /**
     * Testing of the "get" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::setAds
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::getAds
     *
     * @return void
     */
    public function testGet(): void
    {
        $ads = new Ads([new AdFox()]);
        $this->assertSame(1, count($ads->getAds()));
        $this->assertIsArray($ads->getAds());
    }

    /**
     * Testing of the "IteratorAggregate' interface.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::setAds
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::getAds
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::getIterator
     *
     * @throws Exception
     *
     * @return void
     */
    public function testGetIterator(): void
    {
        $ads = new Ads([new AdFox()]);
        $this->assertSame(1, count($ads->getAds()));
        $this->assertIsIterable($ads);
        $this->assertInstanceOf(ArrayIterator::class, $ads->getIterator());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $ads = Ads::create();
        $this->assertFalse($ads->isNotEmpty());
        $this->assertSame(0, count($ads->getAds()));

        $ads = Ads::create([ new AdFox() ]);
        $this->assertTrue($ads->isNotEmpty());
        $this->assertSame(1, count($ads->getAds()));
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ads::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void {
        $channel = new Articles();
        $this->assertFalse($channel->hasAds());

        $ads = new Ads([new AdFox()]);
        $ads->appendTo($channel);
        $this->assertTrue($channel->hasAds());
    }
}

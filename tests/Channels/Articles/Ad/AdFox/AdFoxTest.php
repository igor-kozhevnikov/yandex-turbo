<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Ad\AdFox;

use Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox;
use Mireon\YandexTurbo\Channels\Articles\Ad\Ads;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "AdFox" ad.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Ad\AdFox
 */
class AdFoxTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $ad = new AdFox();
        $this->assertSame('AdFox', $ad->getType());
        $this->assertTrue($ad->hasType());
        $this->assertNull($ad->getTurboAdId());
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertNull($ad->getContent());
        $this->assertFalse($ad->hasContent());

        $ad = new AdFox('', '');
        $this->assertNull($ad->getTurboAdId());
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertNull($ad->getContent());
        $this->assertFalse($ad->hasContent());

        $ad = new AdFox('123456789', '123456789');
        $this->assertSame('123456789', $ad->getTurboAdId());
        $this->assertTrue($ad->hasTurboAdId());
        $this->assertSame('123456789', $ad->getContent());
        $this->assertTrue($ad->hasContent());
    }

    /**
     * Testing of the "turboAdId" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox::setTurboAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox::getTurboAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox::hasTurboAdId
     *
     * @return void
     */
    public function testTurboAdId(): void
    {
        $ad = new AdFox();
        $ad->setTurboAdId(null);
        $this->assertNull($ad->getTurboAdId());
        $this->assertFalse($ad->hasTurboAdId());

        $ad = new AdFox();
        $ad->setTurboAdId('');
        $this->assertNull($ad->getTurboAdId());
        $this->assertFalse($ad->hasTurboAdId());

        $ad = new AdFox();
        $ad->setTurboAdId('123456789');
        $this->assertSame('123456789', $ad->getTurboAdId());
        $this->assertTrue($ad->hasTurboAdId());
    }

    /**
     * Testing of the "content" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox::setContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox::getContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox::hasContent
     *
     * @return void
     */
    public function testContent(): void
    {
        $ad = new AdFox();
        $ad->setContent(null);
        $this->assertNull($ad->getContent());
        $this->assertFalse($ad->hasContent());

        $ad = new AdFox();
        $ad->setContent('');
        $this->assertNull($ad->getContent());
        $this->assertFalse($ad->hasContent());

        $ad = new AdFox();
        $ad->setContent('123456789');
        $this->assertSame('123456789', $ad->getContent());
        $this->assertTrue($ad->hasContent());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $ad = new AdFox();
        $ad = $ad->turboAdId('123456789');
        $this->assertInstanceOf(AdFox::class, $ad);
        $this->assertSame('123456789', $ad->getTurboAdId());

        $ad = new AdFox();
        $ad = $ad->content('123456789');
        $this->assertInstanceOf(AdFox::class, $ad);
        $this->assertSame('123456789', $ad->getContent());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $ad = AdFox::create();
        $this->assertInstanceOf(AdFox::class, $ad);
        $this->assertNull($ad->getTurboAdId());
        $this->assertNull($ad->getContent());

        $ad = AdFox::create('123456789', '123456789');
        $this->assertInstanceOf(AdFox::class, $ad);
        $this->assertSame('123456789', $ad->getTurboAdId());
        $this->assertSame('123456789', $ad->getContent());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $ad = new AdFox();
        $this->assertFalse($ad->isValid());

        $ad = new AdFox();
        $ad->setTurboAdId('123456789');
        $ad->setContent('123456789');
        $this->assertTrue($ad->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $ads = new Ads();
        $this->assertFalse($ads->isNotEmpty());
        $this->assertSame(0, count($ads->getAds()));

        $ad = new AdFox();
        $ad->appendTo($ads);
        $this->assertTrue($ads->isNotEmpty());
        $this->assertSame(1, count($ads->getAds()));
    }
}

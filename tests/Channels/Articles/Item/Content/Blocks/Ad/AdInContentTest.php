<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Ad;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "AdInContent" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Ad
 */
class AdInContentTest extends TestCase
{
    /**
     * Testing the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::__construct
     */
    public function testConstruct(): void
    {
        $ad = new AdInContent();
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertTrue($ad->isMobile());
        $this->assertFalse($ad->isDesktop());

        $ad = new AdInContent('123456');
        $this->assertSame('123456', $ad->getTurboAdId());
        $this->assertTrue($ad->isMobile());
        $this->assertFalse($ad->isDesktop());
    }

    /**
     * Testing the "turboAdId" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::setTurboAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::hasTurboAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::getTurboAdId
     *
     * @return void
     */
    public function testTurboAdId(): void
    {
        $ad = new AdInContent();

        $ad->setTurboAdId('123456');
        $this->assertTrue($ad->hasTurboAdId());
        $this->assertSame('123456', $ad->getTurboAdId());

        $ad->setTurboAdId('');
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertNull($ad->getTurboAdId());

        $ad->setTurboAdId(null);
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertNull($ad->getTurboAdId());
    }

    /**
     * Testing the "mobile" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::setMobile
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::isMobile
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::getMobile
     *
     * @return void
     */
    public function testMobile(): void
    {
        $ad = new AdInContent();

        $ad->setMobile(true);
        $this->assertTrue($ad->isMobile());
        $this->assertSame('true', $ad->getMobile());

        $ad->setMobile(false);
        $this->assertFalse($ad->isMobile());
        $this->assertSame('false', $ad->getMobile());
    }

    /**
     * Testing the "desktop" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::setDesktop
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::isDesktop
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::getDesktop
     *
     * @return void
     */
    public function testDesktop(): void
    {
        $ad = new AdInContent();

        $ad->setDesktop(true);
        $this->assertTrue($ad->isDesktop());
        $this->assertSame('true', $ad->getDesktop());

        $ad->setDesktop(false);
        $this->assertFalse($ad->isDesktop());
        $this->assertSame('false', $ad->getDesktop());
    }

    /**
     * Testing the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::isValid
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::isDesktop
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::getDesktop
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $ad = new AdInContent();
        $this->assertFalse($ad->isValid());

        $ad->setTurboAdId('123456');
        $this->assertTrue($ad->isValid());
    }

    /**
     * Testing the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $ad = AdInContent::create();
        $this->assertInstanceOf(AdInContent::class, $ad);
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertTrue($ad->isMobile());
        $this->assertFalse($ad->isDesktop());

        $ad = AdInContent::create('123456');
        $this->assertSame('123456', $ad->getTurboAdId());
    }

    /**
     * Testing the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $ad = new AdInContent();
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertTrue($ad->isMobile());
        $this->assertFalse($ad->isDesktop());

        $ad = $ad->turboAdId('123456');
        $this->assertInstanceOf(AdInContent::class, $ad);
        $this->assertSame('123456', $ad->getTurboAdId());

        $ad = $ad->mobile(false);
        $this->assertInstanceOf(AdInContent::class, $ad);
        $this->assertSame('false', $ad->getMobile());

        $ad = $ad->desktop(true);
        $this->assertInstanceOf(AdInContent::class, $ad);
        $this->assertSame('true', $ad->getDesktop());
    }
}












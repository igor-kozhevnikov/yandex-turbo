<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Ad;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInPage;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "AdInPage" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Ad
 */
class AdInPageTest extends TestCase
{
    /**
     * Testing the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInPage::__construct
     */
    public function testConstruct(): void
    {
        $ad = new AdInPage();
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertFalse($ad->hasTurboInPageAdId());

        $ad = new AdInPage('a123456', 'c123456');
        $this->assertSame('a123456', $ad->getTurboAdId());
        $this->assertSame('c123456', $ad->getTurboInPageAdId());
    }

    /**
     * Testing the "turboAdId" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInPage::setTurboAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInPage::hasTurboAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInPage::getTurboAdId
     *
     * @return void
     */
    public function testTurboAdId(): void
    {
        $ad = new AdInPage();

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
     * Testing the "turboInPageAdId" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInPage::setTurboInPageAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInPage::hasTurboInPageAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInPage::getTurboInPageAdId
     *
     * @return void
     */
    public function testTurboInPageAdId(): void
    {
        $ad = new AdInPage();

        $ad->setTurboInPageAdId('123456');
        $this->assertTrue($ad->hasTurboInPageAdId());
        $this->assertSame('123456', $ad->getTurboInPageAdId());

        $ad->setTurboInPageAdId('');
        $this->assertFalse($ad->hasTurboInPageAdId());
        $this->assertNull($ad->getTurboInPageAdId());

        $ad->setTurboInPageAdId(null);
        $this->assertFalse($ad->hasTurboInPageAdId());
        $this->assertNull($ad->getTurboInPageAdId());
    }

    /**
     * Testing the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInPage::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $ad = new AdInPage();
        $this->assertFalse($ad->isValid());

        $ad->setTurboAdId('a123456');
        $ad->setTurboInPageAdId('c123456');
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
        $ad = AdInPage::create();
        $this->assertInstanceOf(AdInPage::class, $ad);
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertFalse($ad->hasTurboInPageAdId());

        $ad = AdInPage::create('a123456','c123456');
        $this->assertSame('a123456', $ad->getTurboAdId());
        $this->assertSame('c123456', $ad->getTurboInPageAdId());
    }

    /**
     * Testing the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $ad = new AdInPage();
        $this->assertFalse($ad->hasTurboAdId());
        $this->assertFalse($ad->hasTurboInPageAdId());

        $ad = $ad->turboAdId('a123456');
        $this->assertInstanceOf(AdInPage::class, $ad);
        $this->assertSame('a123456', $ad->getTurboAdId());

        $ad = $ad->turboInPageAdId('c123456');
        $this->assertInstanceOf(AdInPage::class, $ad);
        $this->assertSame('c123456', $ad->getTurboInPageAdId());
    }
}












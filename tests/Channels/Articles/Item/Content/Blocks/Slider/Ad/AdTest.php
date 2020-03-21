<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Slider;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad\Ad;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Ad" item of the "Slider" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Slider
 */
class AdTest extends TestCase
{
    /**
     * The turbo ad ID.
     *
     * @var string
     */
    private $turboAdId = '123456789';

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad\Ad::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $ad = new Ad();
        $this->assertNull($ad->getTurboAdId());
        $this->assertFalse($ad->hasTurboAdId());

        $ad = new Ad($this->turboAdId);
        $this->assertSame($this->turboAdId, $ad->getTurboAdId());
        $this->assertTrue($ad->hasTurboAdId());
    }

    /**
     * Testing of the "turboAdId" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad\Ad::setTurboAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad\Ad::hasTurboAdId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad\Ad::getTurboAdId
     *
     * @return void
     */
    public function testTurboAdId(): void
    {
        $ad = new Ad();
        $ad->setTurboAdId($this->turboAdId);
        $this->assertSame($this->turboAdId, $ad->getTurboAdId());
        $this->assertTrue($ad->hasTurboAdId());

        $ad = new Ad();
        $ad->setTurboAdId('');
        $this->assertNull($ad->getTurboAdId());
        $this->assertFalse($ad->hasTurboAdId());

        $ad = new Ad();
        $ad->setTurboAdId(null);
        $this->assertNull($ad->getTurboAdId());
        $this->assertFalse($ad->hasTurboAdId());
    }

    /**
     * Testing of the "isValid" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad\Ad::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $ad = new Ad();
        $this->assertFalse($ad->isValid());

        $ad = new Ad();
        $ad->setTurboAdId($this->turboAdId);
        $this->assertTrue($ad->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad\Ad::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $ad = Ad::create();
        $this->assertInstanceOf(Ad::class, $ad);
        $this->assertNull($ad->getTurboAdId());

        $ad = Ad::create($this->turboAdId);
        $this->assertInstanceOf(Ad::class, $ad);
        $this->assertSame($this->turboAdId, $ad->getTurboAdId());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $ad = (new Ad())->turboAdId($this->turboAdId);
        $this->assertInstanceOf(Ad::class, $ad);
        $this->assertSame($this->turboAdId, $ad->getTurboAdId());
    }
}

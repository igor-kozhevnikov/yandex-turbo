<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Ad;

use Mireon\YandexTurbo\Channels\Articles\Ad\Ad;
use Mireon\YandexTurbo\Channels\Articles\Ad\Ads;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the ad.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Ad
 */
class AdTest extends TestCase
{
    /**
     * Testing of the "type' variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ad::setType
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ad::hasType
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ad::getType
     *
     * @return void
     */
    public function testType(): void
    {
        /** @var Ad $ad */
        $ad = $this->getMockForAbstractClass(Ad::class);
        $this->assertFalse($ad->hasType());
        $this->assertNull($ad->getType());

        $ad->setType('type');
        $this->assertTrue($ad->hasType());
        $this->assertSame('type', $ad->getType());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Ad\Ad::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $ads = new Ads();
        $this->assertFalse($ads->isNotEmpty());

        /** @var Ad $ad */
        $ad = $this->getMockForAbstractClass(Ad::class);
        $ad->appendTo($ads);
        $this->assertTrue($ads->isNotEmpty());
        $this->assertSame(1, count($ads->getAds()));
    }
}

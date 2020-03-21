<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Share;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share\Share;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;

/**
 * Testing of the "Share" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Share
 */
class ShareTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share\Share::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $share = new Share();
        $this->assertEmpty($share->getNetworks());
        $this->assertFalse($share->hasNetworks());

        $share = new Share([Share::NETWORK_TELEGRAM]);
        $this->assertNotEmpty($share->getNetworks());
        $this->assertTrue($share->hasNetworks());
    }

    /**
     * Testing of the "setNetworks" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share\Share::setNetworks
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share\Share::hasNetworks
     *
     * @return void
     */
    public function testSetNetworks(): void
    {
        $share = new Share();
        $share->setNetworks(null);
        $this->assertEmpty($share->getNetworks());
        $this->assertFalse($share->hasNetworks());

        $share = new Share();
        $share->setNetworks([]);
        $this->assertEmpty($share->getNetworks());
        $this->assertFalse($share->hasNetworks());

        $share = new Share();
        $share->setNetworks([Share::NETWORK_TELEGRAM]);
        $this->assertSame(1, count($share->getNetworks()));
        $this->assertTrue($share->hasNetworks());
    }

    /**
     * Testing of the "addNetworks" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share\Share::addNetwork
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share\Share::hasNetworks
     *
     * @return void
     */
    public function testAddNetworks(): void
    {
        $share = new Share();
        $share->addNetwork(null);
        $this->assertEmpty($share->getNetworks());
        $this->assertFalse($share->hasNetworks());

        $share = new Share();
        $share->addNetwork('');
        $this->assertEmpty($share->getNetworks());
        $this->assertFalse($share->hasNetworks());

        $share = new Share();
        $share->addNetwork('network');
        $this->assertEmpty($share->getNetworks());
        $this->assertFalse($share->hasNetworks());

        $share = new Share();
        $share->addNetwork(Share::NETWORK_TELEGRAM);
        $this->assertSame(1, count($share->getNetworks()));
        $this->assertTrue($share->hasNetworks());

        $share = new Share();
        $share->addNetwork(Share::NETWORK_TELEGRAM);
        $share->addNetwork(Share::NETWORK_TELEGRAM);
        $this->assertSame(1, count($share->getNetworks()));
        $this->assertTrue($share->hasNetworks());
    }

    /**
     * Testing of the "reset" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share\Share::reset
     *
     * @return void
     */
    public function testReset(): void
    {
        $share = new Share();
        $share->setNetworks([Share::NETWORK_TELEGRAM]);
        $this->assertSame(1, count($share->getNetworks()));
        $this->assertTrue($share->hasNetworks());

        $share->reset();
        $this->assertEmpty($share->getNetworks());
        $this->assertFalse($share->hasNetworks());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share\Share::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $share = new Share();
        $this->assertFalse($share->isValid());

        $share = new Share();
        $share->setNetworks([Share::NETWORK_TELEGRAM]);
        $this->assertTrue($share->isValid());
    }

    /**
     * Testing of the "check" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share\Share::check
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testCheck(): void
    {
        $class = new ReflectionClass(Share::class);
        $method = $class->getMethod('check');
        $method->setAccessible(true);

        $share = new Share();
        $this->assertTrue($method->invokeArgs($share, [Share::NETWORK_FACEBOOK]));
        $this->assertFalse($method->invokeArgs($share, ['invalid']));
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $share = (new Share())->networks(['facebook', 'vkontakte']);
        $this->assertInstanceOf(Share::class, $share);
        $this->assertEquals(['facebook', 'vkontakte'], $share->getNetworks());

        $share = (new Share())->network('facebook');
        $this->assertInstanceOf(Share::class, $share);
        $this->assertEquals(['facebook'], $share->getNetworks());
    }
}

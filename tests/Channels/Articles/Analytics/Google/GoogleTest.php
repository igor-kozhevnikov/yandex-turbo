<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\Google;

use Mireon\YandexTurbo\Channels\Articles\Analytic\Google\Google;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Google" analytic.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\Google
 */
class GoogleTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Google\Google::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $google = new Google();
        $this->assertTrue($google->hasType());
        $this->assertSame('Google', $google->getType());
        $this->assertNull($google->getId());
        $this->assertFalse($google->hasId());

        $google = new Google(null);
        $this->assertNull($google->getId());
        $this->assertFalse($google->hasId());

        $google = new Google('123456789');
        $this->assertSame('123456789', $google->getId());
        $this->assertTrue($google->hasId());
    }

    /**
     * Testing of the "id" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Google\Google::setId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Google\Google::hasId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Google\Google::getId
     *
     * @return void
     */
    public function testMethods(): void
    {
        $google = new Google();
        $google->setId(null);
        $this->assertNull($google->getId());
        $this->assertFalse($google->hasId());

        $google = new Google();
        $google->setId('');
        $this->assertNull($google->getId());
        $this->assertFalse($google->hasId());

        $google = new Google();
        $google->setId('123456789');
        $this->assertSame('123456789', $google->getId());
        $this->assertTrue($google->hasId());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $google = new Google();
        $google = $google->id('123456789');
        $this->assertInstanceOf(Google::class, $google);
        $this->assertSame('123456789', $google->getId());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Google\Google::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $google = Google::create();
        $this->assertInstanceOf(Google::class, $google);
        $this->assertNull($google->getId());

        $google = Google::create('123456789');
        $this->assertInstanceOf(Google::class, $google);
        $this->assertSame('123456789', $google->getId());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Google\Google::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $google = new Google();
        $this->assertFalse($google->isValid());

        $google = new Google();
        $google->setId('123456789');
        $this->assertTrue($google->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Google\Google::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $analytics = new Analytics();
        $this->assertFalse($analytics->isNotEmpty());

        $google = new Google();
        $google->appendTo($analytics);
        $this->assertTrue($analytics->isNotEmpty());
    }
}

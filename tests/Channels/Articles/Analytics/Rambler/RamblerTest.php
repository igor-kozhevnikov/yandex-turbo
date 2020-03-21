<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\Rambler;

use Mireon\YandexTurbo\Channels\Articles\Analytic\Rambler\Rambler;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Rambler" analytic.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\Rambler
 */
class RamblerTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Rambler\Rambler::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $rambler = new Rambler();
        $this->assertTrue($rambler->hasType());
        $this->assertSame('Rambler', $rambler->getType());
        $this->assertNull($rambler->getId());
        $this->assertFalse($rambler->hasId());

        $rambler = new Rambler('123456789');
        $this->assertSame('123456789', $rambler->getId());
        $this->assertTrue($rambler->hasId());
    }

    /**
     * Testing of the "id" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Rambler\Rambler::setId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Rambler\Rambler::hasId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Rambler\Rambler::getId
     *
     * @return void
     */
    public function testId(): void
    {
        $rambler = new Rambler();
        $rambler->setId(null);
        $this->assertNull($rambler->getId());
        $this->assertFalse($rambler->hasId());

        $rambler = new Rambler();
        $rambler->setId('');
        $this->assertNull($rambler->getId());
        $this->assertFalse($rambler->hasId());

        $rambler = new Rambler();
        $rambler->setId('123456789');
        $this->assertSame('123456789', $rambler->getId());
        $this->assertTrue($rambler->hasId());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $rambler = new Rambler();
        $rambler = $rambler->id('123456789');
        $this->assertInstanceOf(Rambler::class, $rambler);
        $this->assertSame('123456789', $rambler->getId());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Rambler\Rambler::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $rambler = Rambler::create();
        $this->assertInstanceOf(Rambler::class, $rambler);
        $this->assertNull($rambler->getId());

        $rambler = Rambler::create('123456789');
        $this->assertInstanceOf(Rambler::class, $rambler);
        $this->assertSame('123456789', $rambler->getId());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Rambler\Rambler::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $rambler = new Rambler();
        $this->assertFalse($rambler->isValid());

        $rambler = new Rambler();
        $rambler->setId('123456789');
        $this->assertTrue($rambler->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Rambler\Rambler::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $analytics = new Analytics();
        $this->assertFalse($analytics->isNotEmpty());

        $rambler = new Rambler();
        $rambler->appendTo($analytics);
        $this->assertTrue($analytics->isNotEmpty());
    }
}

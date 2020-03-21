<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\Mediascope;

use Mireon\YandexTurbo\Channels\Articles\Analytic\Mediascope\Mediascope;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Mediascope" analytic.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\Mediascope
 */
class MediascopeTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Mediascope\Mediascope::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $mediascope = new Mediascope();
        $this->assertSame('Mediascope', $mediascope->getType());
        $this->assertTrue($mediascope->hasType());
        $this->assertNull($mediascope->getId());
        $this->assertFalse($mediascope->hasId());

        $mediascope = new Mediascope('123456789');
        $this->assertSame('123456789', $mediascope->getId());
        $this->assertTrue($mediascope->hasId());
    }

    /**
     * Testing of the "id" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Mediascope\Mediascope::setId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Mediascope\Mediascope::hasId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Mediascope\Mediascope::getId
     *
     * @return void
     */
    public function testId(): void
    {
        $mediascope = new Mediascope();
        $mediascope->setId(null);
        $this->assertNull($mediascope->getId());
        $this->assertFalse($mediascope->hasId());

        $mediascope = new Mediascope();
        $mediascope->setId('');
        $this->assertNull($mediascope->getId());
        $this->assertFalse($mediascope->hasId());

        $mediascope = new Mediascope();
        $mediascope->setId('123456789');
        $this->assertSame('123456789', $mediascope->getId());
        $this->assertTrue($mediascope->hasId());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $mediascope = new Mediascope();
        $mediascope = $mediascope->id('123456789');
        $this->assertInstanceOf(Mediascope::class, $mediascope);
        $this->assertSame('123456789', $mediascope->getId());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Mediascope\Mediascope::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $mediascope = Mediascope::create();
        $this->assertInstanceOf(Mediascope::class, $mediascope);
        $this->assertNull($mediascope->getId());

        $mediascope = Mediascope::create('123456789');
        $this->assertInstanceOf(Mediascope::class, $mediascope);
        $this->assertSame('123456789', $mediascope->getId());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Mediascope\Mediascope::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $mediascope = new Mediascope();
        $this->assertFalse($mediascope->isValid());

        $mediascope = new Mediascope();
        $mediascope->setId('123456789');
        $this->assertTrue($mediascope->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Mediascope\Mediascope::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $analytics = new Analytics();
        $this->assertFalse($analytics->isNotEmpty());

        $mediascope = new Mediascope();
        $mediascope->appendTo($analytics);
        $this->assertTrue($analytics->isNotEmpty());
    }
}

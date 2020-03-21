<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Analytic;

use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytic;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Testing of the analytic.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Analytic
 */
class AnalyticTest extends TestCase
{
    /**
     * Testing of the "type' variable.
     *
     * @throws ReflectionException
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytic::setType
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytic::hasType
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytic::getType
     *
     * @return void
     */
    public function testType(): void
    {
        /** @var Analytic $analytic */
        $analytic = $this->getMockForAbstractClass(Analytic::class);
        $this->assertFalse($analytic->hasType());
        $this->assertNull($analytic->getType());

        $analytic->setType('type');
        $this->assertTrue($analytic->hasType());
        $this->assertSame('type', $analytic->getType());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @throws ReflectionException
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytic::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $analytics = new Analytics();
        $this->assertFalse($analytics->isNotEmpty());

        /** @var Analytic $analytic */
        $analytic = $this->getMockForAbstractClass(Analytic::class);
        $analytic->appendTo($analytics);
        $this->assertTrue($analytics->isNotEmpty());
    }


}

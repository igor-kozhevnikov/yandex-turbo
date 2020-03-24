<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Metrics;

use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Metrics;
use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\MetricsRender;
use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex;
use PHPUnit\Framework\TestCase;

/**
 * Testing of metrics.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Metrics
 */
class MetricsTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Metrics::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $metrics = new Metrics();
        $this->assertFalse($metrics->isNotEmpty());
        $this->assertSame(0, count($metrics->getMetrics()));
        $this->assertTrue($metrics->hasRenderer());
        $this->assertInstanceOf(MetricsRender::class, $metrics->getRenderer());

        $metrics = new Metrics([new Yandex()]);
        $this->assertTrue($metrics->isNotEmpty());
        $this->assertSame(1, count($metrics->getMetrics()));
    }

    /**
     * Testing of the "metrics" property.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Metrics::setMetrics
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Metrics::addMetric
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Metrics::getMetrics
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Metrics::isNotEmpty
     *
     * @return void
     */
    public function testMetrics(): void
    {
        $metrics = new Metrics();
        $this->assertFalse($metrics->isNotEmpty());
        $this->assertSame(0, count($metrics->getMetrics()));

        $metrics = new Metrics();
        $metrics->setMetrics([new Yandex()]);
        $this->assertTrue($metrics->isNotEmpty());
        $this->assertSame(1, count($metrics->getMetrics()));

        $metrics = new Metrics();
        $metrics->addMetric(new Yandex());
        $this->assertTrue($metrics->isNotEmpty());
        $this->assertSame(1, count($metrics->getMetrics()));

        $metrics = new Metrics([new Yandex()]);
        $metrics->setMetrics([]);
        $this->assertFalse($metrics->isNotEmpty());
        $this->assertSame(0, count($metrics->getMetrics()));

        $metrics = new Metrics([new Yandex()]);
        $metrics->setMetrics(null);
        $this->assertFalse($metrics->isNotEmpty());
        $this->assertSame(0, count($metrics->getMetrics()));
    }

    /**
     * Testing of the creating methods.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Metrics::create
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Metrics::createFromArray
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Metrics::createFromClosure
     *
     * @return void
     */
    public function testCreatingMethods(): void
    {
        $metrics = Metrics::create([new Yandex()]);
        $this->assertInstanceOf(Metrics::class, $metrics);
        $this->assertSame(1, count($metrics->getMetrics()));

        $metrics = Metrics::createFromArray(['metrics' => [new Yandex()]]);
        $this->assertInstanceOf(Metrics::class, $metrics);
        $this->assertSame(1, count($metrics->getMetrics()));

        $metrics = Metrics::createFromClosure(function (Metrics $metrics) {
            $metrics->setMetrics([new Yandex()]);
        });
        $this->assertInstanceOf(Metrics::class, $metrics);
        $this->assertSame(1, count($metrics->getMetrics()));
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $metrics = (new Metrics())->metrics([new Yandex()]);
        $this->assertInstanceOf(Metrics::class, $metrics);
        $this->assertSame(1, count($metrics->getMetrics()));

        $metrics = (new Metrics())->metric(new Yandex());
        $this->assertInstanceOf(Metrics::class, $metrics);
        $this->assertSame(1, count($metrics->getMetrics()));
    }
}

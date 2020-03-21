<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Analytic;

use ArrayIterator;
use Exception;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Custom\Custom;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics;
use Mireon\YandexTurbo\Channels\Articles\Articles;
use PHPUnit\Framework\TestCase;

/**
 * Testing of analytics.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Analytic
 */
class AnalyticsTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $analytics = new Analytics();
        $this->assertFalse($analytics->isNotEmpty());
        $this->assertSame(0, count($analytics->getAnalytics()));

        $analytics = new Analytics([ new Custom() ]);
        $this->assertTrue($analytics->isNotEmpty());
        $this->assertSame(1, count($analytics->getAnalytics()));
    }

    /**
     * Testing of the "set" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::setAnalytics
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::isNotEmpty
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::getAnalytics
     *
     * @return void
     */
    public function testSet(): void
    {
        $analytics = new Analytics();
        $this->assertFalse($analytics->isNotEmpty());
        $this->assertSame(0, count($analytics->getAnalytics()));

        $analytics->setAnalytics([ new Custom() ]);
        $this->assertTrue($analytics->isNotEmpty());
        $this->assertSame(1, count($analytics->getAnalytics()));

        $analytics->setAnalytics([]);
        $this->assertFalse($analytics->isNotEmpty());
        $this->assertSame(0, count($analytics->getAnalytics()));
    }

    /**
     * Testing of the "add" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::addAnalytic
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::isNotEmpty
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::getAnalytics
     *
     * @return void
     */
    public function testAdd(): void
    {
        $analytics = new Analytics();
        $this->assertFalse($analytics->isNotEmpty());
        $this->assertSame(0, count($analytics->getAnalytics()));

        $analytics->addAnalytic(new Custom());
        $this->assertTrue($analytics->isNotEmpty());
        $this->assertSame(1, count($analytics->getAnalytics()));

        $analytics->addAnalytic(new Custom());
        $this->assertTrue($analytics->isNotEmpty());
        $this->assertSame(2, count($analytics->getAnalytics()));
    }

    /**
     * Testing of the "get" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::setAnalytics
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::getAnalytics
     *
     * @return void
     */
    public function testGet(): void
    {
        $analytics = new Analytics([new Custom()]);
        $this->assertSame(1, count($analytics->getAnalytics()));
        $this->assertIsArray($analytics->getAnalytics());
    }

    /**
     * Testing of the "IteratorAggregate' interface.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::setAnalytics
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::getAnalytics
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::getIterator
     *
     * @throws Exception
     *
     * @return void
     */
    public function testGetIterator(): void
    {
        $analytics = new Analytics([new Custom()]);
        $this->assertSame(1, count($analytics->getAnalytics()));
        $this->assertIsIterable($analytics);
        $this->assertInstanceOf(ArrayIterator::class, $analytics->getIterator());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $analytics = Analytics::create();
        $this->assertFalse($analytics->isNotEmpty());
        $this->assertSame(0, count($analytics->getAnalytics()));

        $analytics = Analytics::create([ new Custom() ]);
        $this->assertTrue($analytics->isNotEmpty());
        $this->assertSame(1, count($analytics->getAnalytics()));
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void {
        $channel = new Articles();
        $this->assertFalse($channel->hasAnalytics());

        $analytics = new Analytics([new Custom()]);
        $analytics->appendTo($channel);
        $this->assertTrue($channel->hasAnalytics());
    }
}

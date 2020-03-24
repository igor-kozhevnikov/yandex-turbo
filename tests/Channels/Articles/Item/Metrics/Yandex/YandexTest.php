<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Metrics\Yandex;

use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb;
use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex;
use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\YandexRender;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Yandex" metric.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Metrics\Yandex
 */
class YandexTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $yandex = new Yandex();
        $this->assertFalse($yandex->hasId());
        $this->assertNull($yandex->getId());
        $this->assertFalse($yandex->hasBreadcrumbs());
        $this->assertEmpty($yandex->getBreadcrumbs());
        $this->assertTrue($yandex->hasRenderer());
        $this->assertInstanceOf(YandexRender::class, $yandex->getRenderer());

        $yandex = new Yandex('123456');
        $this->assertTrue($yandex->hasId());
        $this->assertSame('123456', $yandex->getId());
    }

    /**
     * Testing of the "id" property.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::setId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::getId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::hasId
     *
     * @return void
     */
    public function testId(): void
    {
        $yandex = new Yandex();
        $this->assertFalse($yandex->hasId());
        $this->assertNull($yandex->getId());

        $yandex = new Yandex();
        $yandex->setId('123456');
        $this->assertTrue($yandex->hasId());
        $this->assertSame('123456', $yandex->getId());

        $yandex = new Yandex('123456');
        $yandex->setId(null);
        $this->assertFalse($yandex->hasId());
        $this->assertNull($yandex->getId());
    }

    /**
     * Testing of the "breadcrumbs" property.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::setBreadcrumbs
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::addBreadcrumb
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::getBreadcrumbs
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::hasBreadcrumbs
     *
     * @return void
     */
    public function testBreadcrumbs(): void
    {
        $yandex = new Yandex();
        $this->assertFalse($yandex->hasBreadcrumbs());
        $this->assertEmpty($yandex->getBreadcrumbs());

        $yandex = new Yandex();
        $yandex->setBreadcrumbs([new Breadcrumb()]);
        $this->assertTrue($yandex->hasBreadcrumbs());
        $this->assertSame(1, count($yandex->getBreadcrumbs()));

        $yandex = new Yandex();
        $yandex->setBreadcrumbs([new Breadcrumb()]);
        $yandex->setBreadcrumbs([]);
        $this->assertFalse($yandex->hasBreadcrumbs());
        $this->assertSame(0, count($yandex->getBreadcrumbs()));

        $yandex = new Yandex();
        $yandex->setBreadcrumbs([new Breadcrumb()]);
        $yandex->setBreadcrumbs(null);
        $this->assertFalse($yandex->hasBreadcrumbs());
        $this->assertSame(0, count($yandex->getBreadcrumbs()));

        $yandex = new Yandex();
        $yandex->setBreadcrumbs([new Breadcrumb()]);
        $yandex->addBreadcrumb(new Breadcrumb());
        $this->assertTrue($yandex->hasBreadcrumbs());
        $this->assertSame(2, count($yandex->getBreadcrumbs()));
        $yandex->addBreadcrumb(new Breadcrumb());
        $this->assertTrue($yandex->hasBreadcrumbs());
        $this->assertSame(3, count($yandex->getBreadcrumbs()));
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $yandex = new Yandex();
        $this->assertFalse($yandex->isValid());

        $yandex = new Yandex('123456');
        $this->assertTrue($yandex->isValid());
    }

    /**
     * Testing of the creating methods.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::create
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::createFromArray
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex::createFromClosure
     *
     * @return void
     */
    public function testCreatingMethods(): void
    {
        $yandex = Yandex::create('123456');
        $this->assertInstanceOf(Yandex::class, $yandex);
        $this->assertSame('123456', $yandex->getId());

        $yandex = Yandex::createFromArray([
            'id' => '123456',
            'breadcrumbs' => [new Breadcrumb()],
        ]);
        $this->assertInstanceOf(Yandex::class, $yandex);
        $this->assertSame('123456', $yandex->getId());
        $this->assertSame(1, count($yandex->getBreadcrumbs()));

        $yandex = Yandex::createFromClosure(function (Yandex $yandex) {
            $yandex->setId('123456');
            $yandex->setBreadcrumbs([new Breadcrumb()]);
        });
        $this->assertInstanceOf(Yandex::class, $yandex);
        $this->assertSame('123456', $yandex->getId());
        $this->assertSame(1, count($yandex->getBreadcrumbs()));
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $yandex = (new Yandex())->id('123456');
        $this->assertInstanceOf(Yandex::class, $yandex);
        $this->assertSame('123456', $yandex->getId());

        $yandex = (new Yandex())->breadcrumbs([new Breadcrumb()]);
        $this->assertInstanceOf(Yandex::class, $yandex);
        $this->assertSame(1, count($yandex->getBreadcrumbs()));

        $yandex = (new Yandex())->breadcrumb(new Breadcrumb());
        $this->assertInstanceOf(Yandex::class, $yandex);
        $this->assertSame(1, count($yandex->getBreadcrumbs()));
    }
}

<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs;

use ArrayIterator;
use Exception;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the breadcrumbs for the "Header" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs
 */
class BreadcrumbsTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $breadcrumbs = new Breadcrumbs();
        $this->assertFalse($breadcrumbs->isNotEmpty());
        $this->assertSame(0, count($breadcrumbs->getLinks()));

        $breadcrumbs = new Breadcrumbs([ new Link() ]);
        $this->assertTrue($breadcrumbs->isNotEmpty());
        $this->assertSame(1, count($breadcrumbs->getLinks()));
    }

    /**
     * Testing of the "set" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs::setLinks
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs::isNotEmpty
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs::getLinks
     *
     * @return void
     */
    public function testSet(): void
    {
        $breadcrumbs = new Breadcrumbs();
        $this->assertFalse($breadcrumbs->isNotEmpty());
        $this->assertSame(0, count($breadcrumbs->getLinks()));

        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->setLinks([ new Link() ]);
        $this->assertTrue($breadcrumbs->isNotEmpty());
        $this->assertSame(1, count($breadcrumbs->getLinks()));
    }

    /**
     * Testing of the "add" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs::addLink
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs::isNotEmpty
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs::getLinks
     *
     * @return void
     */
    public function testAdd(): void
    {
        $breadcrumbs = new Breadcrumbs();
        $this->assertFalse($breadcrumbs->isNotEmpty());
        $this->assertSame(0, count($breadcrumbs->getLinks()));

        $breadcrumbs = new Breadcrumbs();
        $breadcrumbs->addLink(new Link());
        $this->assertTrue($breadcrumbs->isNotEmpty());
        $this->assertSame(1, count($breadcrumbs->getLinks()));
    }

    /**
     * Testing of the "reset" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs::reset
     *
     * @return void
     */
    public function testReset(): void
    {
        $breadcrumbs = new Breadcrumbs([ new Link() ]);
        $this->assertTrue($breadcrumbs->isNotEmpty());
        $this->assertSame(1, count($breadcrumbs->getLinks()));

        $breadcrumbs->reset();

        $this->assertFalse($breadcrumbs->isNotEmpty());
        $this->assertSame(0, count($breadcrumbs->getLinks()));
    }

    /**
     * Testing of the "IteratorAggregate' interface.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs::getIterator
     *
     * @throws Exception
     *
     * @return void
     */
    public function testGetIterator(): void
    {
        $breadcrumbs = new Breadcrumbs([ new Link() ]);
        $this->assertSame(1, count($breadcrumbs->getLinks()));
        $this->assertIsIterable($breadcrumbs);
        $this->assertInstanceOf(ArrayIterator::class, $breadcrumbs->getIterator());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $breadcrumbs = Breadcrumbs::create([ new Link() ]);
        $this->assertSame(1, count($breadcrumbs->getLinks()));
    }
}

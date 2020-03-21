<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\RelatedLinks;

use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link as ExternalLink;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link as InfinityLink;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the related links.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\RelatedLinks
 */
class RelatedLinksTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $links = new RelatedLinks();
        $this->assertFalse($links->hasInfinities());
        $this->assertSame(0, count($links->getInfinities()));
        $this->assertFalse($links->hasExternals());
        $this->assertSame(0, count($links->getExternals()));
        $this->assertFalse($links->isNotEmpty());

        $links = new RelatedLinks([ new InfinityLink(), new ExternalLink() ]);
        $this->assertTrue($links->hasInfinities());
        $this->assertSame(1, count($links->getInfinities()));
        $this->assertTrue($links->hasExternals());
        $this->assertSame(1, count($links->getExternals()));
        $this->assertTrue($links->isNotEmpty());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $links = RelatedLinks::create();
        $this->assertFalse($links->hasInfinities());
        $this->assertSame(0, count($links->getInfinities()));
        $this->assertFalse($links->hasExternals());
        $this->assertSame(0, count($links->getExternals()));
        $this->assertFalse($links->isNotEmpty());

        $links = RelatedLinks::create([ new InfinityLink(), new ExternalLink() ]);
        $this->assertTrue($links->hasInfinities());
        $this->assertSame(1, count($links->getInfinities()));
        $this->assertTrue($links->hasExternals());
        $this->assertSame(1, count($links->getExternals()));
        $this->assertTrue($links->isNotEmpty());
    }

    /**
     * Testing of the "set" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::setLinks
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::hasInfinities
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::getInfinities
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::hasExternals
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::getExternals
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::isNotEmpty
     *
     * @return void
     */
    public function testSet(): void
    {
        $links = new RelatedLinks();
        $this->assertFalse($links->hasInfinities());
        $this->assertSame(0, count($links->getInfinities()));
        $this->assertFalse($links->hasExternals());
        $this->assertSame(0, count($links->getExternals()));
        $this->assertFalse($links->isNotEmpty());

        $links->setLinks([ new InfinityLink(), new ExternalLink() ]);
        $this->assertTrue($links->hasInfinities());
        $this->assertSame(1, count($links->getInfinities()));
        $this->assertTrue($links->hasExternals());
        $this->assertSame(1, count($links->getExternals()));
        $this->assertTrue($links->isNotEmpty());
    }

    /**
     * Testing of the "set" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::addLink
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::hasInfinities
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::getInfinities
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::hasExternals
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::getExternals
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::isNotEmpty
     *
     * @return void
     */
    public function testAdd(): void
    {
        $links = new RelatedLinks();
        $this->assertFalse($links->hasInfinities());
        $this->assertSame(0, count($links->getInfinities()));
        $this->assertFalse($links->hasExternals());
        $this->assertSame(0, count($links->getExternals()));
        $this->assertFalse($links->isNotEmpty());

        $links = new RelatedLinks();
        $links->addLink(new InfinityLink());
        $this->assertTrue($links->hasInfinities());
        $this->assertSame(1, count($links->getInfinities()));
        $this->assertFalse($links->hasExternals());
        $this->assertSame(0, count($links->getExternals()));
        $this->assertTrue($links->isNotEmpty());

        $links = new RelatedLinks();
        $links->addLink(new ExternalLink());
        $this->assertFalse($links->hasInfinities());
        $this->assertSame(0, count($links->getInfinities()));
        $this->assertTrue($links->hasExternals());
        $this->assertSame(1, count($links->getExternals()));
        $this->assertTrue($links->isNotEmpty());
    }

    /**
     * Testing of the "addInfinity" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::addInfinity
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::hasInfinities
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::getInfinities
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::isNotEmpty
     *
     * @return void
     */
    public function testAddInfinity(): void
    {
        $links = new RelatedLinks();
        $this->assertFalse($links->hasInfinities());
        $this->assertSame(0, count($links->getInfinities()));
        $this->assertFalse($links->isNotEmpty());

        $links = new RelatedLinks();
        $links->addInfinity(new InfinityLink());
        $this->assertTrue($links->hasInfinities());
        $this->assertSame(1, count($links->getInfinities()));
        $this->assertTrue($links->isNotEmpty());
    }

    /**
     * Testing of the "addExternal" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::addExternal
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::hasExternals
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::getExternals
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::isNotEmpty
     *
     * @return void
     */
    public function testAddExternal(): void
    {
        $links = new RelatedLinks();
        $this->assertFalse($links->hasExternals());
        $this->assertSame(0, count($links->getExternals()));
        $this->assertFalse($links->isNotEmpty());

        $links = new RelatedLinks();
        $links->setLinks([ new InfinityLink(), new ExternalLink() ]);
        $this->assertTrue($links->hasExternals());
        $this->assertSame(1, count($links->getExternals()));
        $this->assertTrue($links->isNotEmpty());

        $links = new RelatedLinks();
        for ($i = 0; $i <= 60; $i++) {
            $links->addExternal(new ExternalLink());
        }
        $this->assertSame(30, count($links->getExternals()));
    }

    /**
     * Testing of the "reset" methods.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::reset
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::resetInfinities
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks::resetExternals
     *
     * @return void
     */
    public function testReset(): void
    {
        $links = new RelatedLinks();
        $this->assertFalse($links->hasInfinities());
        $this->assertSame(0, count($links->getInfinities()));
        $this->assertFalse($links->hasExternals());
        $this->assertSame(0, count($links->getExternals()));
        $this->assertFalse($links->isNotEmpty());

        $links->setLinks([ new InfinityLink(), new ExternalLink() ]);
        $this->assertTrue($links->hasInfinities());
        $this->assertSame(1, count($links->getInfinities()));
        $this->assertTrue($links->hasExternals());
        $this->assertSame(1, count($links->getExternals()));
        $this->assertTrue($links->isNotEmpty());

        $links->reset();
        $this->assertFalse($links->hasInfinities());
        $this->assertSame(0, count($links->getInfinities()));
        $this->assertFalse($links->hasExternals());
        $this->assertSame(0, count($links->getExternals()));
        $this->assertFalse($links->isNotEmpty());

        $links->setLinks([ new InfinityLink(), new ExternalLink() ]);

        $links->resetInfinities();
        $this->assertFalse($links->hasInfinities());
        $this->assertSame(0, count($links->getInfinities()));
        $this->assertTrue($links->isNotEmpty());

        $links->resetExternals();
        $this->assertFalse($links->hasExternals());
        $this->assertSame(0, count($links->getExternals()));
        $this->assertFalse($links->isNotEmpty());
    }
}

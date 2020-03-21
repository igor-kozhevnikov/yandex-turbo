<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Header\Menu;

use ArrayIterator;
use Exception;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Link;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the menu for the "Header" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Header\Menu
 */
class MenuTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $menu = new Menu();
        $this->assertFalse($menu->isNotEmpty());
        $this->assertSame(0, count($menu->getLinks()));

        $menu = new Menu([ new Link() ]);
        $this->assertTrue($menu->isNotEmpty());
        $this->assertSame(1, count($menu->getLinks()));
    }

    /**
     * Testing of the "set" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu::setLinks
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu::isNotEmpty
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu::getLinks
     *
     * @return void
     */
    public function testSet(): void
    {
        // Init.
        $menu = new Menu();
        $this->assertFalse($menu->isNotEmpty());
        $this->assertSame(0, count($menu->getLinks()));

        // Array.
        $menu = new Menu();
        $menu->setLinks([ new Link() ]);
        $this->assertTrue($menu->isNotEmpty());
        $this->assertSame(1, count($menu->getLinks()));

        // Null.
        $menu->setLinks(null);
        $this->assertFalse($menu->isNotEmpty());
        $this->assertSame(0, count($menu->getLinks()));
    }

    /**
     * Testing of the "add" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu::addLink
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu::isNotEmpty
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu::getLinks
     *
     * @return void
     */
    public function testAdd(): void
    {
        $menu = new Menu();
        $this->assertFalse($menu->isNotEmpty());
        $this->assertSame(0, count($menu->getLinks()));

        $menu = new Menu();
        $menu->addLink(new Link());
        $this->assertTrue($menu->isNotEmpty());
        $this->assertSame(1, count($menu->getLinks()));
    }

    /**
     * Testing of the "reset" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu::reset
     *
     * @return void
     */
    public function testReset(): void
    {
        $menu = new Menu([ new Link() ]);
        $this->assertTrue($menu->isNotEmpty());
        $this->assertSame(1, count($menu->getLinks()));

        $menu->reset();

        $this->assertFalse($menu->isNotEmpty());
        $this->assertSame(0, count($menu->getLinks()));
    }

    /**
     * Testing of the "IteratorAggregate' interface.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu::getIterator
     *
     * @throws Exception
     *
     * @return void
     */
    public function testGetIterator(): void
    {
        $menu = new Menu([ new Link() ]);
        $this->assertSame(1, count($menu->getLinks()));
        $this->assertIsIterable($menu);
        $this->assertInstanceOf(ArrayIterator::class, $menu->getIterator());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $menu = Menu::create([ new Link() ]);
        $this->assertSame(1, count($menu->getLinks()));
    }
}

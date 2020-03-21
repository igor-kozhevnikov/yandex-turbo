<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item;

use ArrayIterator;
use Exception;
use Mireon\YandexTurbo\Channels\Articles\Articles;
use Mireon\YandexTurbo\Channels\Articles\Item\Items;
use Mireon\YandexTurbo\Channels\Articles\Item\Item;
use PHPUnit\Framework\TestCase;

/**
 * Testing of items.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item
 */
class ItemsTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Items::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $items = new Items();
        $this->assertFalse($items->isNotEmpty());
        $this->assertSame(0, count($items->getItems()));

        $items = new Items([ new Item() ]);
        $this->assertTrue($items->isNotEmpty());
        $this->assertSame(1, count($items->getItems()));
    }

    /**
     * Testing of the "items" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Items::setItems
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Items::getItems
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Items::isNotEmpty
     *
     * @return void
     */
    public function testSetItems(): void
    {
        $items = new Items();
        $this->assertFalse($items->isNotEmpty());
        $this->assertEquals([], $items->getItems());

        $items->setItems([ new Item() ]);
        $this->assertTrue($items->isNotEmpty());
        $this->assertSame(1, count($items->getItems()));

        $items->setItems([]);
        $this->assertFalse($items->isNotEmpty());
        $this->assertEquals([], $items->getItems());
    }

    /**
     * Testing of the "add" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Items::addItem
     *
     * @return void
     */
    public function testAddItem(): void
    {
        $items = new Items();
        $this->assertFalse($items->isNotEmpty());
        $this->assertSame(0, count($items->getItems()));

        $items->addItem(new Item());
        $this->assertTrue($items->isNotEmpty());
        $this->assertSame(1, count($items->getItems()));
    }

    /**
     * Testing of the "get" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Items::getItems
     *
     * @return void
     */
    public function testGetItems(): void
    {
        $items = new Items(array_pad([], 2, new Item()));
        $this->assertIsArray($items->getItems());
        $this->assertSame(2, count($items->getItems()));
        $this->assertSame(2, count($items->getItems(null)));
        $this->assertSame(0, count($items->getItems(-1)));
        $this->assertSame(0, count($items->getItems(0)));
        $this->assertSame(1, count($items->getItems(1)));
        $this->assertSame(2, count($items->getItems(2)));
        $this->assertSame(2, count($items->getItems(3)));
    }

    /**
     * Testing of the "IteratorAggregate" interface.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Items::getIterator
     *
     * @throws Exception
     *
     * @return void
     */
    public function testGetIterator(): void
    {
        $items = new Items([new Item()]);
        $this->assertSame(1, count($items->getItems()));
        $this->assertIsIterable($items);
        $this->assertInstanceOf(ArrayIterator::class, $items->getIterator());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Items::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $items = Items::create();
        $this->assertInstanceOf(Items::class, $items);
        $this->assertFalse($items->isNotEmpty());
        $this->assertSame(0, count($items->getItems()));

        $items = Items::create([ new Item() ]);
        $this->assertInstanceOf(Items::class, $items);
        $this->assertTrue($items->isNotEmpty());
        $this->assertSame(1, count($items->getItems()));
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Items::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void {
        $channel = new Articles();
        $this->assertFalse($channel->hasItems());

        $items = new Items([new Item()]);
        $items->appendTo($channel);
        $this->assertTrue($channel->hasItems());
    }
}

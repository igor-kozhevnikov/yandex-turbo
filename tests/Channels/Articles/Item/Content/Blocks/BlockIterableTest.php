<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks;

use ArrayIterator;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Testing of the iterable block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks
 */
class BlockIterableTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable::__construct
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $block = $this->getMockForAbstractClass(BlockIterable::class);
        $this->assertInstanceOf(BlockIterable::class, $block);
        $this->assertSame(0, count($block->getItems()));
        $this->assertFalse($block->hasItems());
        $this->assertFalse($block->isValid());

        $item = $this->getMockForAbstractClass(BlockIterableItem::class);
        $this->assertInstanceOf(BlockIterableItem::class, $item);

        $block = $this->getMockForAbstractClass(BlockIterable::class, [[$item]]);
        $this->assertInstanceOf(BlockIterable::class, $block);
        $this->assertSame(1, count($block->getItems()));
        $this->assertTrue($block->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable::create
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testCreate(): void
    {
        $block = $this->getMockForAbstractClass(BlockIterable::class);
        $block = $block::create();
        $this->assertInstanceOf(BlockIterable::class, $block);
        $this->assertSame(0, count($block->getItems()));
        $this->assertFalse($block->hasItems());

        $item = $this->getMockForAbstractClass(BlockIterableItem::class);
        $this->assertInstanceOf(BlockIterableItem::class, $item);

        $block = $block::create([$item]);
        $this->assertInstanceOf(BlockIterable::class, $block);
        $this->assertSame(1, count($block->getItems()));
        $this->assertTrue($block->hasItems());
    }

    /**
     * Testing of the "items" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable::setItems
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable::addItem
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable::hasItems
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable::getItems
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable::reset
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testItems(): void
    {
        $block = $this->getMockForAbstractClass(BlockIterable::class);
        $this->assertInstanceOf(BlockIterable::class, $block);
        $this->assertSame(0, count($block->getItems()));
        $this->assertFalse($block->hasItems());

        $item = $this->getMockForAbstractClass(BlockIterableItem::class);
        $this->assertInstanceOf(BlockIterableItem::class, $item);

        $block->setItems([$item]);
        $this->assertSame(1, count($block->getItems()));
        $this->assertTrue($block->hasItems());

        $block->addItem($item);
        $this->assertSame(2, count($block->getItems()));
        $this->assertTrue($block->hasItems());

        $block->addItem(null);
        $this->assertSame(2, count($block->getItems()));
        $this->assertTrue($block->hasItems());

        $block->setItems([]);
        $this->assertSame(0, count($block->getItems()));
        $this->assertFalse($block->hasItems());

        $block->setItems(null);
        $this->assertSame(0, count($block->getItems()));
        $this->assertFalse($block->hasItems());

        $block->setItems([$item]);
        $this->assertSame(1, count($block->getItems()));
        $block->reset();
        $this->assertSame(0, count($block->getItems()));
    }

    /**
     * Testing of the "getIterator" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable::getIterator
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testGetIterator(): void
    {
        $block = $this->getMockForAbstractClass(BlockIterable::class);
        $this->assertIsIterable($block);
        $this->assertInstanceOf(ArrayIterator::class, $block->getIterator());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable::create
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $block = $this->getMockForAbstractClass(BlockIterable::class);
        $item = $this->getMockForAbstractClass(BlockIterableItem::class);

        $block = $block->items([$item]);
        $this->assertInstanceOf(BlockIterable::class, $block);
        $this->assertSame(1, count($block->getItems()));

        $block = $block->item($item);
        $this->assertInstanceOf(BlockIterable::class, $block);
        $this->assertSame(2, count($block->getItems()));
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable::isValid
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $item = $this->getMockForAbstractClass(BlockIterableItem::class);
        $block = $this->getMockForAbstractClass(BlockIterable::class);
        $this->assertFalse($block->isValid());

        $block->items([$item]);
        $this->assertIsIterable($block);
        $this->assertTrue($block->isValid());
        $this->assertInstanceOf(ArrayIterator::class, $block->getIterator());
    }
}

<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the item of the iterable block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks
 */
class BlockIterableItemTest extends TestCase
{
    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $item = $this->getMockForAbstractClass(BlockIterableItem::class);
        $item = $item::create();
        $this->assertInstanceOf(BlockIterableItem::class, $item);
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $block = $this->getMockForAbstractClass(BlockIterable::class);
        $this->assertSame(0, count($block->getItems()));

        $item = $this->getMockForAbstractClass(BlockIterableItem::class);
        $item->appendTo($block);

        $this->assertSame(1, count($block->getItems()));
    }
}

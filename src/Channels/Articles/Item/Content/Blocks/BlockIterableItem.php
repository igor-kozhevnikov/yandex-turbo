<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks;

use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;

/**
 * The item of iterable block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks
 */
abstract class BlockIterableItem
{
    use Creator;
    use MagicSetter;

    /**
     * Adds an item to a block.
     *
     * @param BlockIterable $block
     *   An iterable block.
     *
     * @return void
     */
    public function appendTo(BlockIterable $block): void
    {
        $block->addItem($this);
    }
}

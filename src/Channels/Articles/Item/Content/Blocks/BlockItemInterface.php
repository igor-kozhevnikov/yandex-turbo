<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks;

/**
 * The block item contract.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks
 */
interface BlockItemInterface
{
    /**
     * Indicates if an item is valid.
     *
     * @return bool
     */
    public function isValid(): bool;
}

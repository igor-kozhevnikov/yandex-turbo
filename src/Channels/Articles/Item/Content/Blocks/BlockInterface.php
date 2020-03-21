<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks;

/**
 * The block contract.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks
 */
interface BlockInterface
{
    /**
     * Check a block is valid.
     *
     * @return bool
     */
    public function isValid(): bool;

    /**
     * Render a block.
     *
     * @return string|null
     */
    public function render(): ?string;
}

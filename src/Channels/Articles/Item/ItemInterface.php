<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item;

/**
 * The item contract.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks
 */
interface ItemInterface
{
    /**
     * Indicates if an item is valid.
     *
     * @return bool
     */
    public function isValid(): bool;

    /**
     * Render an item.
     *
     * @return string|null
     */
    public function render(): ?string;
}

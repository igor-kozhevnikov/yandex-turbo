<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm;

/**
 * The contract for the items of the "DynamicForm" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm
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

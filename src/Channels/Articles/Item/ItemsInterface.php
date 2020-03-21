<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item;

/**
 * The contract for a list of items.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item
 */
interface ItemsInterface
{
    /**
     * Sets items.
     *
     * @param ItemInterface[]|null $items
     *   A list of items.
     *
     * @return void
     */
    public function setItems(?array $items): void;

    /**
     * Adds an item.
     *
     * @param ItemInterface|null $item
     *   An item.
     *
     * @return void
     */
    public function addItem(?ItemInterface $item): void;

    /**
     * Returns a list of items.
     *
     * @param int|null $limit
     *   A maximum number of items.
     *
     * @return ItemInterface[]
     */
    public function getItems(?int $limit = null): array;

    /**
     * Indicates if a list is not empty.
     *
     * @return bool
     */
    public function isNotEmpty(): bool;

    /**
     * Render a list of items.
     *
     * @return string|null
     */
    public function render(): ?string;
}

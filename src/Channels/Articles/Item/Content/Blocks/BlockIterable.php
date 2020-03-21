<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks;

use ArrayIterator;
use IteratorAggregate;
use Mireon\YandexTurbo\Traits\Renderer;
use Traversable;

/**
 * The abstract iterable block.
 *
 * @method self items(?BlockIterableItem[] $items)
 *   Sets a list of items.
 * @method self item(?BlockIterableItem $item)
 *   Add an item.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks
 */
abstract class BlockIterable extends Block implements IteratorAggregate
{
    use Renderer;

    /**
     * The list of items.
     *
     * @var BlockItemInterface[]
     */
    protected array $items = [];

    /**
     * The constructor.
     *
     * @param BlockIterableItem[]|null $items
     *   A list of items.
     */
    public function __construct(?array $items = null)
    {
        $this->setItems($items);
    }

    /**
     * Sets items.
     *
     * @param BlockIterableItem[] $items
     *   A list of items.
     *
     * @return void
     */
    public function setItems(?array $items): void
    {
        $this->reset();

        if (empty($items)) {
            return;
        }

        foreach ($items as $item) {
            static::addItem($item);
        }
    }

    /**
     * Adds an item to a list.
     *
     * @param BlockIterableItem|null $item
     *   An item.
     *
     * @return self
     */
    public function addItem(?BlockIterableItem $item): self
    {
        if (!is_null($item)) {
            $this->items[] = $item;
        }

        return $this;
    }

    /**
     * Indicates if a item list is not empty.
     *
     * @return bool
     */
    public function hasItems(): bool
    {
        return !empty($this->items);
    }

    /**
     * Returns a item list.
     *
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Reset list.
     *
     * @return void
     */
    public function reset(): void
    {
        $this->items = [];
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasItems();
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->getItems());
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item;

use ArrayIterator;
use IteratorAggregate;
use Mireon\YandexTurbo\Channels\Articles\Articles;
use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * All items.
 *
 * @method self items(ItemInterface[]|null $items)
 *   Sets a list of items.
 * @method self item(ItemInterface $item)
 *   Add an item.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item
 */
class Items implements ItemsInterface, IteratorAggregate
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The list of items.
     *
     * @var ItemInterface[]
     */
    private array $items = [];

    /**
     * The constructor.
     *
     * @param ItemInterface[]|null $items
     *   A list of items.
     */
    public function __construct(?array $items = [])
    {
        $this->setRenderer(ItemsRender::class);
        $this->setItems($items);
    }

    /**
     * @inheritDoc
     */
    public function setItems(?array $items): void
    {
        if (!empty($this->items)) {
            $this->items = [];
        }

        if (!empty($items)) {
            foreach ($items as $item) {
                $this->addItem($item);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function addItem(?ItemInterface $item): void
    {
        if (!is_null($item)) {
            $this->items[] = $item;
        }
    }

    /**
     * @inheritDoc
     */
    public function isNotEmpty(): bool
    {
        return !empty($this->items);
    }

    /**
     * @inheritDoc
     */
    public function getItems(?int $limit = null): array
    {
        if (is_null($limit) || $limit > count($this->items)) {
            return $this->items;
        } elseif ($limit <= 0) {
            return [];
        }

        return array_slice($this->items, -$limit);
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new ArrayIterator($this->getItems());
    }

    /**
     * Adds list of items to the articles channel.
     *
     * @param Articles $articles
     *   The channel of articles.
     *
     * @return void
     */
    public function appendTo(Articles $articles): void
    {
        $articles->setItems($this);
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item;

/**
 * The renderer for the "Items".
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Items
 */
class ItemsRender
{
    /**
     * Renders the "Items".
     *
     * @param ItemsInterface $items
     *   The "Items".
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(ItemsInterface $items): ?string
    {
        return array_reduce($items->getItems(), function ($output, ItemInterface $item) {
            if ($item->isValid()) { $output .= $item->render(); }
            return $output;
        });
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Cards" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards
 */
class CardsRender
{
    /**
     * Renders the "Callback" block.
     *
     * @param Cards $cards
     *   The "Cards" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Cards $cards): ?string
    {
        return Tag::create('div')
            ->attribute('data-block', 'cards')
            ->content($cards->getItems(), fn(Item $item) => $item->isValid() ? $item->render() : null);
    }
}

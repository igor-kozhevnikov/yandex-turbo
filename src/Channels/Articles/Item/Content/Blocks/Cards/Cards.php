<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable;

/**
 * The "Cards" block.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/cards-docpage/#card
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards
 */
class Cards extends BlockIterable
{
    /**
     * The constructor.
     *
     * @param array|null $items
     *   A list of items.
     */
    public function __construct(?array $items = null)
    {
        parent::__construct($items);
        $this->setRenderer(CardsRender::class);
    }
}

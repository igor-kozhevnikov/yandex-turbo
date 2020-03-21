<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Carousel" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel
 */
class CarouselRender
{
    /**
     * Renders the "Callback" block.
     *
     * @param Carousel $data
     *   The "Carousel" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Carousel $data): ?string
    {
        $cards = Tag::create('div')->attribute('data-block', 'cards');
        $carousel = Tag::create('div')->attribute('data-block', 'carousel')->appendTo($cards);

        if ($data->hasHeader()) {
            Tag::create('header')->content($data->getHeader())->appendTo($carousel);
        }

        $carousel->content($data->getItems(), function (Item $item) {
            if (!$item->isValid()) { return null; }

            return Tag::create('div')
                ->attribute('data-block', 'snippet')
                ->attribute('data-title', $item->getTitle())
                ->attribute('data-img', $item->getImage())
                ->attribute('data-url', $item->getUrl());
        });

        return $cards->render();
    }
}

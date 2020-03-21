<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Feed" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed
 */
class FeedRender
{
    /**
     * Renders the "Feed" block.
     *
     * @param Feed $feed
     *   The "Feed" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Feed $feed): ?string
    {
        return Tag::create('div')
            ->attribute('data-block', 'feed')
            ->attribute('data-layout', $feed->getLayout())
            ->attribute('data-title', $feed->getTitle())
            ->content($feed->getItems(), function (Item $item) {
                if (!$item->isValid()) { return null; }

                return Tag::create('div')
                    ->attribute('data-block', 'feed-item')
                    ->attribute('data-title', $item->getTitle())
                    ->attribute('data-href', $item->getHref())
                    ->attribute('data-description', $item->getDescription())
                    ->attribute('data-thumb', $item->getThumb(), $item->hasThumb())
                    ->attribute('data-thumb-position', $item->getThumbPosition(), $item->hasThumb())
                    ->attribute('data-thumb-ratio', $item->getThumbRatio(), $item->hasThumb());
            });
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Rating" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating
 */
class RatingRender
{
    /**
     * Renders the "Rating" block.
     *
     * @param Rating $rating
     *   The "Rating" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Rating $rating): ?string
    {
        return Tag::create('div')
            ->attribute('itemscope', 'itemscope')
            ->attribute('itemtype', 'http://schema.org/Rating')
            ->content(
                Tag::create('meta')
                    ->attribute('itemprop', 'ratingValue')
                    ->attribute('content', $rating->getValue())
                    ->empty()
            )
            ->content(
                Tag::create('meta')
                    ->attribute('itemprop', 'bestRating')
                    ->attribute('content', $rating->getBest())
                    ->empty()
            );
    }
}

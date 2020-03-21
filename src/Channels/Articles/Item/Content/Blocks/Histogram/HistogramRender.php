<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Histogram" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram
 */
class HistogramRender
{
    /**
     * Renders the "Histogram" block.
     *
     * @param Histogram $histogram
     *   The "Histogram" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Histogram $histogram): ?string
    {
        return Tag::create('div')
            ->attribute('data-block', 'histogram')
            ->content($histogram->getItems(), function (Item $item) {
                if (!$item->isValid()) { return null; }

                return Tag::create('div')
                    ->attribute('data-block', 'histogram-item')
                    ->attribute('data-title', $item->getTitle())
                    ->attribute('data-value', $item->getValue())
                    ->attribute('data-height', $item->getHeight())
                    ->attribute('data-icon', $item->getIcon())
                    ->attribute('data-color', $item->getColor());
            });
    }
}

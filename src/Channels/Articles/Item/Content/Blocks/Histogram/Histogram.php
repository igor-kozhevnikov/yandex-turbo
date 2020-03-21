<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable;

/**
 * The "Histogram" block.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/histogram-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram
 */
class Histogram extends BlockIterable {
    /**
     * The constructor.
     *
     * @param array|null $items
     *   A list of items.
     */
    public function __construct(?array $items = null)
    {
        parent::__construct($items);
        $this->setRenderer(HistogramRender::class);
    }
}

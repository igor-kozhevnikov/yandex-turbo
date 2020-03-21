<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable;

/**
 * The "Carousel" block.
 *
 * @method self header(?string $header)
 *   Sets the header.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/cards-docpage/#carousel
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel
 */
class Carousel extends BlockIterable
{
    /**
     * The header.
     *
     * @var string|null
     */
    private ?string $header = null;

    /**
     * The constructor.
     *
     * @param array|null $items
     *   An array of items.
     */
    public function __construct(?array $items = null)
    {
        parent::__construct($items);
        $this->setRenderer(CarouselRender::class);
    }

    /**
     * Sets the header.
     *
     * @param string|null $header
     *   A header.
     *
     * @return void
     */
    public function setHeader(?string $header): void
    {
        $this->header = $header ?: null;
    }

    /**
     * Indicates if a header is set.
     *
     * @return bool
     */
    public function hasHeader(): bool
    {
        return !is_null($this->header);
    }

    /**
     * Returns a header.
     *
     * @return string|null
     */
    public function getHeader(): ?string
    {
        return $this->header;
    }
}

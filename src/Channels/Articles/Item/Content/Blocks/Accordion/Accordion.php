<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable;

/**
 * The "Accordion" block.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/accordion-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion
 */
class Accordion extends BlockIterable
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
        $this->setRenderer(AccordionRender::class);
    }
}

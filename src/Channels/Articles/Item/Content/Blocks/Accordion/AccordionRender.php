<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Accordion" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion
 */
class AccordionRender
{
    /**
     * Renders the "Accordion" block.
     *
     * @param Accordion $accordion
     *   The "Accordion" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Accordion $accordion): string
    {
        return Tag::create('div')
            ->attribute('data-block', 'accordion')
            ->content($accordion->getItems(), function (Item $item) {
                if (!$item->isValid()) { return null; }

                return Tag::create('div')
                    ->attribute('data-block', 'item')
                    ->attribute('data-title', $item->getTitle())
                    ->attribute('data-expanded', $item->getExpanded())
                    ->content($item->getContent())
                    ->appendTo($output);
            });
    }
}

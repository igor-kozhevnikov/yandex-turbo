<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Search" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search
 */
class SearchRender
{
    /**
     * Renders the "Search" block.
     *
     * @param Search $search
     *   The "Search" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Search $search): ?string
    {
        return Tag::create('form')
            ->attribute('method', 'GET')
            ->attribute('action', $search->getAction())
            ->content(
                Tag::create('input')
                    ->attribute('type', 'search')
                    ->attribute('name', $search->getName())
                    ->attribute('placeholder', $search->getPlaceholder()),
            );
    }
}

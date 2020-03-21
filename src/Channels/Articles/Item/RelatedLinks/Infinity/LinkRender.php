<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the infinity link of the "RelatedLinks" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Items\RelatedLinks\Infinity
 */
class LinkRender
{
    /**
     * Renders the infinity link.
     *
     * @param Link $link
     *   The infinity link.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Link $link): ?string
    {
        return Tag::create('link')->attribute('url', $link->getUrl());
    }
}

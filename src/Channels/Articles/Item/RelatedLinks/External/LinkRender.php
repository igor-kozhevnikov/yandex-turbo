<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the external link of the "RelatedLinks" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Items
 */
class LinkRender
{
    /**
     * Renders the external link.
     *
     * @param Link $link
     *   The external link.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Link $link): ?string
    {
        return Tag::create('link')
            ->attribute('url', $link->getUrl())
            ->attribute('image', $link->getImage())
            ->content($link->getText());
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for a breadcrumbs of the "Header" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu
 */
class BreadcrumbsRender
{
    /**
     * Renders the breadcrumbs.
     *
     * @param Breadcrumbs $breadcrumbs
     *   A breadcrumbs of the "Header" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Breadcrumbs $breadcrumbs): ?string
    {
        return Tag::create('div')
            ->attribute('data-block', 'breadcrumblist')
            ->content($breadcrumbs->getLinks(), function (Link $link) {
                if (!$link->isValid()) { return null; }

                return Tag::create('a')
                    ->attribute('href', $link->getUrl())
                    ->content($link->getText())
                    ->empty();
            });
    }
}

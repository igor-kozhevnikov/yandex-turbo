<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for a menu of the "Header" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu
 */
class MenuRender
{
    /**
     * Renders the menu.
     *
     * @param Menu $menu
     *   A menu of the "Header" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Menu $menu): ?string
    {
        return Tag::create('menu')->content($menu->getLinks(), function (Link $link) {
            if (!$link->isValid()) { return null; }

            return Tag::create('a')
                ->attribute('href', $link->getUrl())
                ->content($link->getText())
                ->empty();
        });
    }
}

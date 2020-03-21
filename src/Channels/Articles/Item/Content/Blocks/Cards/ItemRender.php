<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for an item of the "Cards" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards
 */
class ItemRender
{
    /**
     * Renders an item.
     *
     * @param Item $data
     *   An item of the "Cards" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Item $data): ?string
    {
        $item = Tag::create('div')->attribute('data-block', 'card')->content($data->getContent());

        if ($data->hasHeader()) {
            $header = Tag::create('header')->appendTo($item);

            if ($data->hasHeaderImage()) {
                Tag::create('img')
                    ->attribute('src', $data->getHeaderImage())
                    ->empty()
                    ->appendTo($header);
            }

            if ($data->hasHeaderTitle()) {
                Tag::create('h2')->content($data->getHeaderTitle())->appendTo($header);
            }
        }

        if ($data->isValidFooter()) {
            Tag::create('footer')->content(
                Tag::create('a')->attribute('href', $data->getFooterUrl())->content($data->getFooterText())
            )->appendTo($item);
        }

        if ($data->isValidMore()) {
            Tag::create('div')->attribute('data-block', 'more')->content(
                Tag::create('a')
                    ->attribute('data-block', 'button')
                    ->attribute('href', $data->getMoreUrl())
                    ->content($data->getMoreText())
            )->appendTo($item);
        }

        return $item;
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Item".
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Items
 */
class ItemRender
{
    /**
     * Renders the "Item".
     *
     * @param Item $data
     *   The "Item".
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Item $data): string
    {
        $item = Tag::create('item')
            ->attribute('turbo', $data->getTurbo())
            ->content($data->getContent()->render());

        Tag::create('link')->content($data->getLink())->appendTo($item);

        if ($data->hasSource()) {
            Tag::create('turbo:source')->content($data->getSource())->appendTo($item);
        }

        if ($data->hasTopic()) {
            Tag::create('turbo:topic')->content($data->getTopic())->appendTo($item);
        }

        if ($data->hasPubDate()) {
            Tag::create('pubDate')->content($data->getPubDate())->appendTo($item);
        }

        if ($data->hasAuthor()) {
            Tag::create('author')->content($data->getAuthor())->appendTo($item);
        }

        if ($data->hasRelatedLinks()) {
            $item->content($data->getRelatedLinks()->render());
        }

        if ($data->hasMetrics()) {
            $item->content($data->getMetrics()->render());
        }

        return $item;
    }
}

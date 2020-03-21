<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Header" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header
 */
class HeaderRender
{
    /**
     * Renders the "Html" block.
     *
     * @param Header $data
     *   The "Header" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Header $data): ?string
    {
        $header = Tag::create('header');

        Tag::create('h1')->content($data->getTitle())->appendTo($header);

        if ($data->hasSubTitle()) {
            Tag::create('h2')->content($data->getSubTitle())->appendTo($header);
        }

        if ($data->hasPreview()) {
            Tag::create('figure')->content(
                Tag::create('img')->attribute('src', $data->getPreview())->empty()
            )->appendTo($header);
        }

        if ($data->hasMenu()) {
            $header->content($data->getMenu()->render());
        }

        if ($data->hasBreadcrumbs()) {
            $header->content($data->getBreadcrumbs()->render());
        }

        return $header->render();
    }
}

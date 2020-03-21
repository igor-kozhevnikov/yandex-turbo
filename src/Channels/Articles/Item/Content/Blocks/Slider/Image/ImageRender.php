<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for "Image" item of the "Slider" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image
 */
class ImageRender
{
    /**
     * Renders the "Image" item.
     *
     * @param Image $data
     *   The "Image" item.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Image $data): ?string
    {
        $figure = Tag::create('figure');

        if ($data->hasCaption()) {
            Tag::create('figcaption')->content($data->getCaption())->appendTo($figure);
        }

        Tag::create('img')->attribute('src', $data->getImage())->appendTo($figure);

        return $figure;
    }
}

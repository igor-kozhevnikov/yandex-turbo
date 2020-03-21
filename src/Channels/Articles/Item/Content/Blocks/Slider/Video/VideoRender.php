<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for "Image" item of the "Slider" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video
 */
class VideoRender
{
    /**
     * Renders the "Image" item.
     *
     * @param Video $data
     *   The "Video" item.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Video $data): ?string
    {
        $figure = Tag::create('figure');

        $video = Tag::create('video')
            ->attribute('width', $data->getWidth())
            ->attribute('height', $data->getHeight())
            ->appendTo($figure);

        Tag::create('source')
            ->attribute('src', $data->getSource())
            ->attribute('type', $data->getType())
            ->attribute('data-duration', $data->getDuration())
            ->attribute('data-title', $data->getTitle())
            ->empty()
            ->appendTo($video);

        if ($data->hasPreview()) {
            Tag::create('img')->attribute('src', $data->getPreview())->appendTo($figure);
        }

        if ($data->hasCaption()) {
            Tag::create('figcaption')->content($data->getCaption())->appendTo($figure);
        }

        return $figure;
    }
}

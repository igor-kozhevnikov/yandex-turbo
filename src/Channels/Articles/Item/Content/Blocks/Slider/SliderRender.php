<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Slider" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider
 */
class SliderRender
{
    /**
     * Renders the "Slider" block.
     *
     * @param Slider $data
     *   The "Slider" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Slider $data): ?string
    {
        $slider = Tag::create('div')
            ->attribute('data-block', 'slider')
            ->attribute('data-view', $data->getView());

        if ($data->hasHeader()) {
            Tag::create('figure')->content(
                Tag::create('header')->content($data->getHeader())
            )->appendTo($slider);
        }

        $slider->content($data->getItems(), fn(ItemInterface $item) => $item->isValid() ? $item->render() : null);

        return $slider;
    }
}

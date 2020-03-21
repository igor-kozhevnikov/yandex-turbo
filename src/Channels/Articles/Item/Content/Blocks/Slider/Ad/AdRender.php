<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for "Ad" item of the "Slider" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad
 */
class AdRender
{
    /**
     * Renders the "Ad" item.
     *
     * @param Ad $ad
     *   The "Ad" item.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Ad $ad): ?string
    {
        return Tag::create('figure')->attribute('data-turbo-ad-id', $ad->getTurboAdId());
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "AdInContent" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad
 */
class AdInContentRender
{
    /**
     * Renders the "AdInContent" block.
     *
     * @param AdInContent $ad
     *   The "AdInContent" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(AdInContent $ad): ?string
    {
        return Tag::create('figure')
            ->attribute('data-turbo-ad-id', $ad->getTurboAdId())
            ->attribute('data-platform-mobile', $ad->getMobile())
            ->attribute('data-platform-desktop', $ad->getDesktop());
    }
}

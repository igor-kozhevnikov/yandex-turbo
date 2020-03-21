<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "AdInPage" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad
 */
class AdInPageRender
{
    /**
     * Renders the "AdInPage" block.
     *
     * @param AdInPage $ad
     *   The "AdInPage" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(AdInPage $ad): ?string
    {
        return Tag::create('figure')
            ->attribute('inpage', 'true')
            ->attribute('data-turbo-ad-id', $ad->getTurboAdId())
            ->attribute('data-turbo-inpage-ad-id', $ad->getTurboInPageAdId());
    }
}

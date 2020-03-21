<?php

namespace Mireon\YandexTurbo\Channels\Articles\Ad\AdFox;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "AdFox" ad.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Ad\AdFox
 */
class AdFoxRender
{
    /**
     * Renders the "AdFox" ad.
     *
     * @param AdFox $ad
     *   The "AdFox" ad.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(AdFox $ad): ?string
    {
        return Tag::create('turbo:adNetwork')
            ->attribute('type', $ad->getType())
            ->attribute('turbo-ad-id', $ad->getTurboAdId())
            ->content("<![CDATA[{$ad->getContent()}]]>");
    }
}

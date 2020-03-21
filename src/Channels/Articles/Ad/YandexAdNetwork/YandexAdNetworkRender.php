<?php

namespace Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "YandexAdNetwork" ad.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork
 */
class YandexAdNetworkRender
{
    /**
     * Renders the "YandexAdNetwork" ad.
     *
     * @param YandexAdNetwork $ad
     *   The "YandexAdNetwork" ad.
     *
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function render(YandexAdNetwork $ad): ?string
    {
        return Tag::create('turbo:adNetwork')
            ->attribute('type', $ad->getType())
            ->attribute('id', $ad->getId())
            ->attribute('turbo-ad-id', $ad->getTurboAdId());
    }
}

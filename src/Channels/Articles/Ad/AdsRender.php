<?php

namespace Mireon\YandexTurbo\Channels\Articles\Ad;

/**
 * The renderer for the list of ads.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Ad
 */
class AdsRender
{
    /**
     * Render the list of ads.
     *
     * @param AdsInterface $ads
     *   A list of ads.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(AdsInterface $ads): ?string
    {
        return array_reduce($ads->getAds(), function ($output, AdInterface $ad) {
            if ($ad->isValid()) { $output .= $ad->render(); }
            return $output;
        });
    }
}

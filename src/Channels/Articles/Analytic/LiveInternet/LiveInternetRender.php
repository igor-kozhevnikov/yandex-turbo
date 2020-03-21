<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "LiveInternet" analytic.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytics\LiveInternet
 */
class LiveInternetRender
{
    /**
     * Render the "LiveInternet" analytic.
     *
     * @param LiveInternet $live
     *   The "LiveInternet" analytic.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(LiveInternet $live): ?string
    {
        return Tag::create('turbo:analytics')
            ->attribute('type', $live->getType())
            ->attribute('params', $live->getParams());
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic\Custom;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Custom" analytic.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytic\Custom
 */
class CustomRender
{
    /**
     * Render the "Custom" analytic.
     *
     * @param Custom $custom
     *   The "Custom" analytic.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Custom $custom): ?string
    {
        return Tag::create('turbo:analytics')
            ->attribute('type', $custom->getType())
            ->attribute('url', $custom->getUrl());
    }
}

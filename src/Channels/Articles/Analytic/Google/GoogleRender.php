<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic\Google;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Google" analytic.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytic\Google
 */
class GoogleRender
{
    /**
     * Render the "Google" analytic.
     *
     * @param Google $google
     *   The "Google" analytic.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Google $google): ?string
    {
        return Tag::create('turbo:analytics')
            ->attribute('type', $google->getType())
            ->attribute('id', $google->getId());
    }
}

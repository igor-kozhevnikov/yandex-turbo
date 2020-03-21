<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic\Mediascope;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Mediascope" analytic.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytics\Mediascope
 */
class MediascopeRender
{
    /**
     * Render "Mediascope" analytic.
     *
     * @param Mediascope $media
     *   The "Mediascope" analytic.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Mediascope $media): ?string
    {
        return Tag::create('turbo:analytics')
            ->attribute('type', $media->getType())
            ->attribute('id', $media->getId());
    }
}

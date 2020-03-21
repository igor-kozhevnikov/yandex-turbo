<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic\Rambler;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Rambler" analytic.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytics\Rambler
 */
class RamblerRender
{
    /**
     * Render "Rambler" analytic.
     *
     * @param Rambler $rambler
     *   The "Rambler" analytic.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Rambler $rambler): ?string
    {
        return Tag::create('turbo:analytics')
            ->attribute('type', $rambler->getType())
            ->attribute('id', $rambler->getId());
    }
}

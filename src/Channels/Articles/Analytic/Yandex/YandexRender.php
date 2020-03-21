<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Yandex" analytic.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytics\Yandex
 */
class YandexRender
{
    /**
     * Render "Yandex" analytic.
     *
     * @param Yandex $yandex
     *   The "Yandex" analytic.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Yandex $yandex): ?string
    {
        return Tag::create('turbo:analytics')
            ->attribute('type', $yandex->getType())
            ->attribute('id', $yandex->getId())
            ->attribute('params', $yandex->getParams());
    }
}

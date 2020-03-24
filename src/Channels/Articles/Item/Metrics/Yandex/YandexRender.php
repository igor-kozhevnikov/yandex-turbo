<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The "Yandex" metric render.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex
 */
class YandexRender
{
    /**
     * Renders the "Yandex" metric.
     *
     * @param Yandex $data
     *   The "Yandex" metric.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Yandex $data): ?string
    {
        $yandex = Tag::create('yandex')->attribute('schema_identifier', $data->getId());

        if ($data->hasBreadcrumbs()) {
            $breadcrumbs = Tag::create('breadcrumblist')->appendTo($yandex);

            foreach ($data->getBreadcrumbs() as $breadcrumb) {
                if ($breadcrumb->isValid()) {
                    Tag::create('breadcrumb')
                        ->attribute('url', $breadcrumb->getUrl())
                        ->attribute('text', $breadcrumb->getText())
                        ->empty()
                        ->appendTo($breadcrumbs);
                }
            }
        }

        return $yandex;
    }
}

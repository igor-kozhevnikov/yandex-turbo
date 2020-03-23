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
     * @param Yandex $yandex
     *   The "Yandex" metric.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Yandex $yandex): ?string
    {
        $root = Tag::create('yandex')->attribute('schema_identifier', $yandex->getId());

        if ($yandex->hasBreadcrumbs()) {
            $breadcrumbs = Tag::create('breadcrumblist')->appendTo($root);

            foreach ($yandex->getBreadcrumbs() as $breadcrumb) {
                if ($breadcrumb->isValid()) {
                    Tag::create('breadcrumb')
                        ->attribute('url', $breadcrumb->getUrl())
                        ->attribute('text', $breadcrumb->getText())
                        ->empty()
                        ->appendTo($breadcrumbs);
                }
            }
        }

        return $root;
    }
}

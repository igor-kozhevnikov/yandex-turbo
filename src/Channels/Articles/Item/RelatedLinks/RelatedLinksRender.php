<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks;

use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link as ExternalLink;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link as InfinityLink;
use Mireon\YandexTurbo\Helpers\Tag\Group;
use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "RelatedLinks" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Items
 */
class RelatedLinksRender
{
    /**
     * Renders the "Item".
     *
     * @param RelatedLinks $links
     *   The "RelatedLinks" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(RelatedLinks $links): ?string
    {
        $group = Group::create();

        if ($links->hasInfinities()) {
            Tag::create('yandex:related')
                ->attribute('type', 'infinity')
                ->content($links->getInfinities(), fn(InfinityLink $link) => $link->isValid() ? $link->render() : null)
                ->appendTo($group);
        }

        if ($links->hasExternals()) {
            Tag::create('yandex:related')
                ->content($links->getExternals(), fn(ExternalLink $link) => $link->isValid() ? $link->render() : null)
                ->appendTo($group);
        }

        return $group->render();
    }
}

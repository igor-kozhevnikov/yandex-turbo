<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Share" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share
 */
class ShareRender
{
    /**
     * Renders the "Share" block.
     *
     * @param Share $share
     *   The "Share" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Share $share): ?string
    {
        return Tag::create('div')
            ->attribute('data-block', 'share')
            ->attribute('data-network', implode(',', $share->getNetworks()));
    }
}

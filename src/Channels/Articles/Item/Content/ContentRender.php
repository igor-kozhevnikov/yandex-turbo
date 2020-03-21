<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockInterface;
use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the item content.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Items
 */
class ContentRender
{
    /**
     * Renders the item content.
     *
     * @param Content $content
     *   The item content.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Content $content): string
    {
        return Tag::create('turbo:content')
            ->content('<![CDATA[')
            ->content($content->getBlocks(), fn(BlockInterface $block) => $block->isValid() ? $block->render() : null)
            ->content(']]>')
        ;
    }
}

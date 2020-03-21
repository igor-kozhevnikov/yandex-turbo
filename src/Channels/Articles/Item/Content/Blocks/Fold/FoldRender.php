<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Fold" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold
 */
class FoldRender
{
    /**
     * Renders the "Fold" block.
     *
     * @param Fold $fold
     *   The "Fold" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Fold $fold): ?string
    {
        return Tag::create('div')->attribute('data-block', 'fold')->content($fold->getContent());
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html;

/**
 * The renderer for the "Html" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Items
 */
class HtmlRender
{
    /**
     * Renders the "Html" block.
     *
     * @param Html $html
     *   The "Html" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Html $html): ?string
    {
        return $html->isValid() ? $html->getHtml() : null;
    }
}

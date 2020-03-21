<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content;

/**
 * The contract for the content item.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content
 */
interface ContentInterface
{
    /**
     * Render a content.
     *
     * @return string|null
     */
    public function render(): ?string;
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles;

/**
 * The contract for channel of articles.
 *
 * @package Mireon\YandexTurbo\Contracts\Articles
 */
interface ArticlesInterface
{
    /**
     * Render the channel of articles.
     *
     * @return string|null
     */
    public function render(): ?string;
}

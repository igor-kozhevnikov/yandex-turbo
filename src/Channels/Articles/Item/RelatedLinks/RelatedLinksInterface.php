<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks;

/**
 * The contract for a list of related links.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks
 */
interface RelatedLinksInterface
{
    /**
     * Indicates if a list is not empty.
     *
     * @return bool
     */
    public function isNotEmpty(): bool;

    /**
     * Render a list of links.
     *
     * @return string|null
     */
    public function render(): ?string;
}

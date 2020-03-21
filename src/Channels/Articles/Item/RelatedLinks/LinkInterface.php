<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks;

/**
 * The contract for the related link.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks
 */
interface LinkInterface
{
    /**
     * Indicates if an ad is valid.
     *
     * @return bool
     */
    public function isValid(): bool;

    /**
     * Render a link.
     *
     * @return string|null
     */
    public function render(): ?string;
}

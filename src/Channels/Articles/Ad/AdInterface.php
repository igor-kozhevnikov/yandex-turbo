<?php

namespace Mireon\YandexTurbo\Channels\Articles\Ad;

/**
 * The contract for an ad.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Ad
 */
interface AdInterface
{
    /**
     * Indicates if an ad is valid.
     *
     * @return bool
     */
    public function isValid(): bool;

    /**
     * Render an ad.
     *
     * @return string|null
     */
    public function render(): ?string;
}

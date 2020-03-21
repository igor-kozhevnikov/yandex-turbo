<?php

namespace Mireon\YandexTurbo\Channels\Articles\Ad;

/**
 * The contract for a list of ads.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Ad
 */
interface AdsInterface
{
    /**
     * Sets a list of ads.
     *
     * @param AdInterface[] $ads
     *   A list of ads.
     *
     * @return void
     */
    public function setAds(?array $ads): void;

    /**
     * Adds an ad.
     *
     * @param AdInterface|null $ad
     *   An add.
     *
     * @return void
     */
    public function addAd(?AdInterface $ad): void;

    /**
     * Returns list of ads.
     *
     * @return array
     */
    public function getAds(): array;

    /**
     * Indicates if a list is not empty.
     *
     * @return bool
     */
    public function isNotEmpty(): bool;

    /**
     * Render a list of ads.
     *
     * @return string|null
     */
    public function render(): ?string;
}

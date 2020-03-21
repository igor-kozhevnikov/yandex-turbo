<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic;

/**
 * The contract for an analytics.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytic
 */
interface AnalyticInterface
{
    /**
     * Indicates if an analytics is valid.
     *
     * @return bool
     */
    public function isValid(): bool;

    /**
     * Render an analytic.
     *
     * @return string|null
     */
    public function render(): ?string;
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Metrics;

/**
 * The contract for a metric.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Metrics
 */
interface MetricInterface
{
    /**
     * Indicates if a metric is valid.
     *
     * @return bool
     */
    public function isValid(): bool;

    /**
     * Render a metrics.
     *
     * @return string|null
     */
    public function render(): ?string;
}

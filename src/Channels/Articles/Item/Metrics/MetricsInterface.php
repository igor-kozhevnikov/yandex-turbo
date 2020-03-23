<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Metrics;

/**
 * The contract for a list of metrics.
 * 
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Metrics
 */
interface MetricsInterface
{
    /**
     * Sets a list of metrics.
     *
     * @param MetricInterface[] $metrics
     *   A list of metrics.
     *
     * @return void
     */
    public function setMetrics(?array $metrics): void;

    /**
     * Adds a metric.
     *
     * @param MetricInterface|null $metric
     *   A metric.
     *
     * @return void
     */
    public function addMetric(?MetricInterface $metric): void;

    /**
     * Returns list of metrics.
     *
     * @return MetricInterface[]
     */
    public function getMetrics(): array;

    /**
     * Indicates if a list is not empty.
     *
     * @return bool
     */
    public function isNotEmpty(): bool;

    /**
     * Render a list of metrics.
     *
     * @return string|null
     */
    public function render(): ?string;
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Metrics;

use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The metrics.
 *
 * @method self metrics(MetricInterface[]|null $metrics)
 *   Sets a list of metrics.
 * @method self metric(?MetricInterface $metric)
 *   Adds a metric.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Metrics
 */
class Metrics implements MetricsInterface
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The list of metrics.
     *
     * @var MetricInterface[]
     */
    private array $metrics = [];

    /**
     * Metrics constructor.
     *
     * @param array|null $metrics
     */
    public function __construct(?array $metrics = null)
    {
        $this->setRenderer(MetricsRender::class);
        $this->setMetrics($metrics);
    }

    /**
     * @inheritDoc
     */
    public function setMetrics(?array $metrics): void
    {
        if (!empty($metrics)) {
            foreach ($metrics as $metric) {
                $this->addMetric($metric);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function addMetric(?MetricInterface $metric): void
    {
        if (!is_null($metric)) {
            $this->metrics[] = $metric;
        }
    }

    /**
     * @inheritDoc
     */
    public function getMetrics(): array
    {
        return $this->metrics;
    }

    /**
     * @inheritDoc
     */
    public function isNotEmpty(): bool
    {
        return !empty($this->metrics);
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Metrics;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the metrics.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytics
 */
class MetricsRender
{
    /**
     * Render the metrics.
     *
     * @param MetricsInterface $metrics
     *   A metrics.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(MetricsInterface $metrics): ?string
    {
        return Tag::create('metrics')
            ->content(
                $metrics->getMetrics(),
                fn (MetricInterface $metric) => $metric->isValid() ? $metric->render() : null
            );
    }
}

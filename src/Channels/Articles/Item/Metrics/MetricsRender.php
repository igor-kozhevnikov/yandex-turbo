<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Metrics;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the list of metrics.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytics
 */
class MetricsRender
{
    /**
     * Render the list of metrics.
     *
     * @param MetricsInterface $metrics
     *   A list of metrics.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(MetricsInterface $metrics): ?string
    {
        return Tag::create('metrics')
            ->content($metrics->getMetrics(), function (MetricInterface $metric) {
                return $metric->isValid() ? $metric->render() : null;
            });
    }
}

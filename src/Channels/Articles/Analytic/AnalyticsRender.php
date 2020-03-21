<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic;

/**
 * The renderer for the list of analytics.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytics
 */
class AnalyticsRender
{
    /**
     * Render the list of ads.
     *
     * @param AnalyticsInterface $analytics
     *   A list of analytics.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(AnalyticsInterface $analytics): ?string
    {
        return array_reduce($analytics->getAnalytics(), function ($output, AnalyticInterface $analytic) {
            if ($analytic->isValid()) { $output .= $analytic->render(); }
            return $output;
        });
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic;

/**
 * The contract for a list of analytics.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytic
 */
interface AnalyticsInterface
{
    /**
     * Sets a list of analytics.
     *
     * @param AnalyticInterface[]|null $analytics
     *   A list of analytics.
     *
     * @return void
     */
    public function setAnalytics(?array $analytics): void;

    /**
     * Adds an analytic.
     *
     * @param AnalyticInterface|null $analytics
     *   An analytics.
     *
     * @return void
     */
    public function addAnalytic(?AnalyticInterface $analytics): void;

    /**
     * Returns a list of analytics.
     *
     * @return AnalyticInterface[]
     */
    public function getAnalytics(): array;

    /**
     * Indicates if a list is not empty.
     *
     * @return bool
     */
    public function isNotEmpty(): bool;

    /**
     * Render a list of analytics.
     *
     * @return string|null
     */
    public function render(): ?string;
}

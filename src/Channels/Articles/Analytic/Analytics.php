<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic;

use ArrayIterator;
use IteratorAggregate;
use Mireon\YandexTurbo\Channels\Articles\Articles;
use Mireon\YandexTurbo\Traits\Creator;
use Traversable;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The list of analytics.
 *
 * @method self analytics(AnalyticsInterface[]|null $analytics)
 *   Sets a list of analytics.
 * @method self analytic(AnalyticInterface|null $analytic)
 *   Add an analytic.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytic
 */
class Analytics implements AnalyticsInterface, IteratorAggregate
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The list of analytics.
     *
     * @var AnalyticInterface[]
     */
    private array $analytics = [];

    /**
     * The constructor.
     *
     * @param AnalyticInterface[]|null $analytics
     *   A list of analytics.
     */
    public function __construct(?array $analytics = null)
    {
        $this->setRenderer(AnalyticsRender::class);
        $this->setAnalytics($analytics);
    }

    /**
     * @inheritDoc
     */
    public function setAnalytics(?array $analytics): void
    {
        if (!empty($this->analytics)) {
            $this->analytics = [];
        }

        if (empty($analytics)) {
            return;
        }

        foreach ($analytics as $analytic) {
            $this->addAnalytic($analytic);
        }
    }

    /**
     * @inheritDoc
     */
    public function addAnalytic(?AnalyticInterface $analytic): void
    {
        if (!is_null($analytic)) {
            $this->analytics[] = $analytic;
        }
    }

    /**
     * @inheritDoc
     */
    public function isNotEmpty(): bool
    {
        return !empty($this->analytics);
    }

    /**
     * @inheritDoc
     */
    public function getAnalytics(): array
    {
        return $this->analytics;
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->getAnalytics());
    }

    /**
     * Adds list of analytics to the articles channel.
     *
     * @param Articles $articles
     *   The channel of articles.
     *
     * @return void
     */
    public function appendTo(Articles $articles): void
    {
        $articles->setAnalytics($this);
    }
}

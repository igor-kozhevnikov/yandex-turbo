<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet;

use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytic;

/**
 * The "LiveInternet" analytics.
 *
 * @method self params(?string $params)
 *   Sets parameters.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet
 */
class LiveInternet extends Analytic
{
    /**
     * The params.
     *
     * @var string|null
     */
    private ?string $params = null;

    /**
     * The constructor.
     *
     * @param string|null $params
     *   Params as a string.
     */
    public function __construct(?string $params = null)
    {
        $this->setRenderer(LiveInternetRender::class);
        $this->setType('LiveInternet');
        $this->setParams($params);
    }

    /**
     * Sets params.
     *
     * @param string|null $params
     *   Params as a string.
     *
     * @return void
     */
    public function setParams(?string $params): void
    {
        $this->params = $params ?: null;
    }

    /**
     * Indicates if a params is set.
     *
     * @return bool
     */
    public function hasParams(): bool
    {
        return !is_null($this->params);
    }

    /**
     * Returns params.
     *
     * @return string|null
     */
    public function getParams(): ?string
    {
        return $this->params;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasType();
    }
}

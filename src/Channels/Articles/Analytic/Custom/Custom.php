<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic\Custom;

use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytic;

/**
 * The "Custom" analytics.
 *
 * @method self url(?string $url)
 *   Sets an URL.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytic\Custom
 */
class Custom extends Analytic
{
    /**
     * The URL.
     *
     * @var string|null
     */
    private ?string $url = null;

    /**
     * The constructor.
     *
     * @param string|null $url
     *   An URL.
     */
    public function __construct(?string $url = null)
    {
        $this->setRenderer(CustomRender::class);
        $this->setType('custom');
        $this->setUrl($url);
    }

    /**
     * Sets an URL.
     *
     * @param string|null $url
     *   An URL.
     *
     * @return void
     */
    public function setUrl(?string $url): void
    {
        $this->url = filter_var($url, FILTER_VALIDATE_URL) ? $url : null;
    }

    /**
     * Indicates if an URL is set.
     *
     * @return bool
     */
    public function hasUrl(): bool
    {
        return !is_null($this->url);
    }

    /**
     * Returns an URL.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasType() && $this->hasUrl();
    }
}

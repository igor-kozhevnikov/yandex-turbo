<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex;

use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;

/**
 * The breadcrumb of the "Yandex" metric.
 *
 * @method self url(?string $url)
 *   Sets the URL.
 * @method self text(?string $text)
 *   Sets the text.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex
 */
class Breadcrumb
{
    use Creator;
    use MagicSetter;

    /**
     * The URL.
     *
     * @var string|null $url
     */
    private ?string $url = null;

    /**
     * The text.
     *
     * @var string|null $text
     */
    private ?string $text = null;

    /**
     * The constructor.
     *
     * @param string|null $text
     *   A text.
     * @param string|null $url
     *   A URL.
     */
    public function __construct(?string $text, ?string $url)
    {
        $this->setText($text);
        $this->setUrl($url);
    }

    /**
     * Sets the URL.
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
     * Indicates if the URL is set.
     *
     * @return bool
     */
    public function hasUrl(): bool
    {
        return !is_null($this->url);
    }

    /**
     * Returns the URL.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Sets the text.
     *
     * @param string|null $text
     *   A text.
     *
     * @return void
     */
    public function setText(?string $text): void
    {
        $this->text = !empty($text) ? $text : null;
    }

    /**
     * Indicates if the text is set.
     *
     * @return bool
     */
    public function hasText(): bool
    {
        return !is_null($this->text);
    }

    /**
     * Returns the text.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Indicates if a breadcrumb is valid.
     */
    public function isValid(): bool
    {
        return $this->hasText() && $this->hasUrl();
    }
}

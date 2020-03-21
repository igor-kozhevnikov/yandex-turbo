<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity;

use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\LinkInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks;
use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The related link for an infinity feed.
 *
 * @method self url(?string $url)
 *   Sets an URL.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity
 */
class Link implements LinkInterface
{
    use Creator;
    use MagicSetter;
    use Renderer;

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
        $this->setRenderer(LinkRender::class);
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
        return $this->hasUrl();
    }

    /**
     * Added a link to the related list.
     *
     * @param RelatedLinks $related
     *   A related list.
     *
     * @return void
     */
    public function appendTo(RelatedLinks $related): void
    {
        $related->addInfinity($this);
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External;

use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\LinkInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks;
use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Helpers\Str;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The related link for an external feed.
 *
 * @method self text(?string $text)
 *   Sets a text of the link.
 * @method self url(?string $url)
 *   Sets an URL of the link.
 * @method self image(?string $image)
 *   Sets an URL of the image.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External
 */
class Link implements LinkInterface
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The link text.
     *
     * @var string|null
     */
    private ?string $text = null;

    /**
     * The image.
     *
     * @var string|null
     */
    private ?string $image = null;

    /**
     * The link URL.
     *
     * @var string|null
     */
    private ?string $url = null;

    /**
     * The constructor.
     *
     * @param string|null $text
     *   A link text.
     * @param string|null $url
     *   A link URL.
     */
    public function __construct(?string $text = null, ?string $url = null)
    {
        $this->setRenderer(LinkRender::class);
        $this->setText($text);
        $this->setUrl($url);
    }

    /**
     * Sets a link text.
     *
     * @param string|null $text
     *   A link text.
     *
     * @return void
     */
    public function setText(?string $text): void
    {
        if (!empty($text)) {
            $text = strip_tags($text);
            $text = trim($text);
            $text = Str::e($text);
        }

        $this->text = $text ?: null;
    }

    /**
     * Indicates if a link text is set.
     *
     * @return bool
     */
    public function hasText(): bool
    {
        return !is_null($this->text);
    }

    /**
     * Returns a text.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Sets a link URL.
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
     * Indicates if a link URL is set.
     *
     * @return bool
     */
    public function hasUrl(): bool
    {
        return !is_null($this->url);
    }

    /**
     * Returns a link URL.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Sets an URL to image.
     *
     * @param string|null $image
     *   An image.
     *
     * @return void
     */
    public function setImage(?string $image): void
    {
        $this->image = filter_var($image, FILTER_VALIDATE_URL) ? $image : null;
    }

    /**
     * Indicates if an URL to image is set.
     *
     * @return bool
     */
    public function hasImage(): bool
    {
        return !is_null($this->image);
    }

    /**
     * Returns an URL to image.
     *
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasUrl() && $this->hasText();
    }

    /**
     * Added a link to the list of related links.
     *
     * @param RelatedLinks $related
     *   A list of related links.
     *
     * @return void
     */
    public function appendTo(RelatedLinks $related): void
    {
        $related->addExternal($this);
    }
}

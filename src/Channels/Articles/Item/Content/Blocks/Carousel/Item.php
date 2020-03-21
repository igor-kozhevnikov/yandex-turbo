<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockItemInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;

/**
 * The "Carousel" block item.
 *
 * @method self title(?string $title)
 *   Sets the title.
 * @method self image(?string $image)
 *   Sets the image URL.
 * @method self url(?string $url)
 *   Sets the URL.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel
 */
class Item extends BlockIterableItem implements BlockItemInterface
{
    /**
     * The title.
     *
     * @var string|null;
     */
    private ?string $title = null;

    /**
     * The image URL.
     *
     * @var string|null;
     */
    private ?string $image = null;

    /**
     * The URL.
     *
     * @var string|null;
     */
    private ?string $url = null;

    /**
     * The constructor.
     *
     * @param string|null $title
     *   A title.
     * @param string|null $image
     *   An image URL.
     * @param string|null $url
     *   An URL.
     */
    public function __construct(?string $title = null, ?string $image = null, ?string $url = null)
    {
        $this->setTitle($title);
        $this->setImage($image);
        $this->setUrl($url);
    }

    /**
     * Sets a title.
     *
     * @param string|null $title
     *   A title.
     *
     * @return void
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title ?: null;
    }

    /**
     * Indicates if a title is set.
     *
     * @return bool
     */
    public function hasTitle(): bool
    {
        return !is_null($this->title);
    }

    /**
     * Returns a title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Sets an image URL.
     *
     * @param string|null $image
     *   An image URL.
     *
     * @return void
     */
    public function setImage(?string $image): void
    {
        $this->image = filter_var($image, FILTER_VALIDATE_URL) ? $image : null;
    }

    /**
     * Indicates if an image is set.
     *
     * @return bool
     */
    public function hasImage(): bool
    {
        return !is_null($this->image);
    }

    /**
     * Returns an image URL.
     *
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
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
     * Indicates if a URL is set.
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
        return $this->hasTitle() && $this->hasImage() && $this->hasUrl();
    }
}

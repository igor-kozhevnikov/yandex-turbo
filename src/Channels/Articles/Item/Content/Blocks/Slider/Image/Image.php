<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\ItemInterface;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The "Image" item of the "Slider" block.
 *
 * @method self image(?string $image)
 *   Sets the image.
 * @method self caption(?string $caption)
 *   Sets the caption.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image
 */
class Image extends BlockIterableItem implements ItemInterface
{
    use Renderer;

     /**
     * The image URL.
     *
     * @var string|null
     */
    private ?string $image = null;

    /**
     * The caption.
     *
     * @var string|null
     */
    private ?string $caption = null;

    /**
     * The constructor.
     *
     * @param string|null $image
     *   A image URL.
     */
    public function __construct(?string $image = null)
    {
        $this->setRenderer(ImageRender::class);
        $this->setImage($image);
    }

    /**
     * Sets a image URL.
     *
     * @param string|null $image
     *   A image URL.
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
     * Returns a image URL.
     *
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Sets a caption.
     *
     * @param string|null $caption
     *   A caption.
     *
     * @return void
     */
    public function setCaption(?string $caption): void
    {
        $this->caption = $caption ?: null;
    }

    /**
     * Indicates if a caption is set.
     *
     * @return bool
     */
    public function hasCaption(): bool
    {
        return !is_null($this->caption);
    }

    /**
     * Returns a caption.
     *
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasImage();
    }
}

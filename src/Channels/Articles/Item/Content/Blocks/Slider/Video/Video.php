<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\ItemInterface;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The "Slider" block "Video" item.
 *
 * @method self width(?int $width)
 *   Sets the video frame weight.
 * @method self height(?int $height)
 *   Sets the video frame height.
 * @method self source(?string $source)
 *   Sets the video source URL.
 * @method self type(?string $type)
 *   Sets the video type.
 * @method self duration(?int $duration)
 *   Sets the video duration.
 * @method self title(?string $title)
 *   Sets the video title.
 * @method self preview(?string $preview)
 *   Sets the video preview image URL.
 * @method self caption(?string $caption)
 *   Sets the caption.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video
 */
class Video extends BlockIterableItem implements ItemInterface
{
    use Renderer;

    /**
     * The video frame width.
     *
     * @var int|null
     */
    private ?int $width = null;

    /**
     * The video frame height.
     *
     * @var int|null
     */
    private ?int $height = null;

    /**
     * The video source URL.
     *
     * @var string|null
     */
    private ?string $source = null;

    /**
     * The video type.
     *
     * @var string|null
     */
    private ?string $type = null;

    /**
     * The video duration.
     *
     * @var int|null
     */
    private ?int $duration = null;

    /**
     * The title.
     *
     * @var string|null
     */
    private ?string $title = null;

    /**
     * The preview image URL.
     *
     * @var string|null
     */
    private ?string $preview = null;

    /**
     * The caption.
     *
     * @var string|null
     */
    private ?string $caption = null;

    /**
     * The constructor.
     *
     * @param int|null $width
     *   A video frame weight.
     * @param int|null $height
     *   A video frame height.
     * @param string|null $source
     *   A video source URL.
     * @param string|null $type
     *   A video type.
     * @param int|null $duration
     *   A video duration.
     */
    public function __construct(
        ?int $width = null,
        ?int $height = null,
        ?string $source = null,
        ?string $type = null,
        ?int $duration = null
    ) {
        $this->setRenderer(VideoRender::class);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setSource($source);
        $this->setType($type);
        $this->setDuration($duration);
    }

    /**
     * Sets a video frame weight.
     *
     * @param string|int|null $width
     *   A video frame weight.
     *
     * @return void
     */
    public function setWidth($width): void
    {
        if (is_numeric($width)) {
            $width = (int) $width;
            $this->width = $width >= 0 ? $width : null;
        } else {
            $this->width = null;
        }
    }

    /**
     * Indicates if a video frame width is set.
     *
     * @return bool
     */
    public function hasWidth(): bool
    {
        return !is_null($this->width);
    }

    /**
     * Returns a video frame weight.
     *
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * Sets a video frame height.
     *
     * @param string|int|null $height
     *   A video frame height.
     *
     * @return void
     */
    public function setHeight($height): void
    {
        if (is_numeric($height)) {
            $height = (int) $height;
            $this->height = $height >= 0 ? $height : null;
        } else {
            $this->height = null;
        }
    }

    /**
     * Indicates if a video frame height is set.
     *
     * @return bool
     */
    public function hasHeight(): bool
    {
        return !is_null($this->height);
    }

    /**
     * Returns a video frame height.
     *
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * Sets a video source URL.
     *
     * @param string|null $source
     *   A video source URL.
     *
     * @return void
     */
    public function setSource(?string $source): void
    {
        $this->source = filter_var($source, FILTER_VALIDATE_URL) ? $source : null;
    }

    /**
     * Indicates if a source is set.
     *
     * @return bool
     */
    public function hasSource(): bool
    {
        return !is_null($this->source);
    }

    /**
     * Returns a video source URL.
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * Sets a video type.
     *
     * @param string|null $type
     *   A video type.
     *
     * @return void
     */
    public function setType(?string $type): void
    {
        $this->type = $type ?: null;
    }

    /**
     * Indicates if a type is set.
     *
     * @return bool
     */
    public function hasType(): bool
    {
        return !is_null($this->type);
    }

    /**
     * Returns a video type.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets a video duration.
     *
     * @param string|int|null $duration
     *   A video duration.
     *
     * @return void
     */
    public function setDuration($duration): void
    {
        if (is_numeric($duration)) {
            $duration = (int) $duration;
            $this->duration = $duration >= 0 ? $duration : null;
        } else {
            $this->duration = null;
        }
    }

    /**
     * Indicates if a duration is set.
     *
     * @return bool
     */
    public function hasDuration(): bool
    {
        return !is_null($this->duration);
    }

    /**
     * Returns a video duration.
     *
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * Sets a video title.
     *
     * @param string|null $title
     *   A video title.
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
     * Returns a video title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Sets a video preview image URL.
     *
     * @param string|null $preview
     *   A video preview image URL.
     *
     * @return void
     */
    public function setPreview(?string $preview): void
    {
        $this->preview = filter_var($preview, FILTER_VALIDATE_URL) ? $preview : null;
    }

    /**
     * Indicates if a preview is set.
     *
     * @return bool
     */
    public function hasPreview(): bool
    {
        return !is_null($this->preview);
    }

    /**
     * Returns a video preview image URL.
     *
     * @return string|null
     */
    public function getPreview(): ?string
    {
        return $this->preview;
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
        return $this->hasWidth() &&
               $this->hasHeight() &&
               $this->hasSource() &&
               $this->hasType() &&
               $this->hasDuration();
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockItemInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;

/**
 * The "Histogram" block item.
 *
 * @method self title(?string $title)
 *   Sets the title.
 * @method self value(?string $value)
 *   Sets the value.
 * @method self height(string|int $height)
 *   Sets the height.
 * @method self icon(?string $icon)
 *   Sets the icon URL.
 * @method self color(?string $color)
 *   Sets the color.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram
 */
class Item extends BlockIterableItem implements BlockItemInterface
{
    /**
     * The title.
     *
     * @var string|null
     */
    private ?string $title = null;

    /**
     * The value.
     *
     * @var string|null
     */
    private ?string $value = null;

    /**
     * The height.
     *
     * @var int|null
     */
    private ?int $height = null;

    /**
     * The color.
     *
     * @var string|null
     */
    private ?string $color = null;

    /**
     * The icon.
     *
     * @var string|null
     */
    private ?string $icon = null;

    /**
     * The constructor.
     *
     * @param string|null $title
     *   A title.
     * @param string|null $value
     *   A value.
     * @param int|null $height
     *   A height.
     * @param string|null $icon
     *   An icon URL.
     */
    public function __construct(
        ?string $title = null,
        ?string $value = null,
        ?int $height = null,
        ?string $icon = null
    ) {
        $this->setTitle($title);
        $this->setValue($value);
        $this->setHeight($height);
        $this->setIcon($icon);
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
     * Sets a value.
     *
     * @param string|null $value
     *   A value.
     *
     * @return void
     */
    public function setValue(?string $value): void
    {
        $this->value = $value ?: null;
    }

    /**
     * Indicates if a value is set.
     *
     * @return bool
     */
    public function hasValue(): bool
    {
        return !is_null($this->value);
    }

    /**
     * Returns a value.
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * Sets a height.
     *
     * @param string|int|null $height
     *   A height.
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
     * Indicates if a height is set.
     *
     * @return bool
     */
    public function hasHeight(): bool
    {
        return !is_null($this->height);
    }

    /**
     * Returns a height.
     *
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * Sets a color.
     *
     * @param string|null $color
     *   A color.
     *
     * @return void
     */
    public function setColor(?string $color): void
    {
        $this->color = $color ?: null;
    }

    /**
     * Sets if a color is set.
     *
     * @return bool
     */
    public function hasColor(): bool
    {
        return !is_null($this->color);
    }

    /**
     * Returns a color.
     *
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * Sets an icon URL.
     *
     * @param string|null $icon
     *   An icon URL.
     *
     * @return void
     */
    public function setIcon(?string $icon): void
    {
        $this->icon = filter_var($icon, FILTER_VALIDATE_URL) ? $icon : null;
    }

    /**
     * Sets if a icon URL is set.
     *
     * @return bool
     */
    public function hasIcon(): bool
    {
        return !is_null($this->icon);
    }

    /**
     * Returns an icon URL.
     *
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasTitle() && $this->hasValue() && $this->hasHeight() && $this->hasIcon();
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockItemInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;

/**
 * The "Feed" block item.
 *
 * @method self title(?string $title)
 *   Sets the title.
 * @method self description(?string $description)
 *   Sets the description.
 * @method self href(?string $href)
 *   Sets the page URL.
 * @method self thumb(?string $thumb)
 *   Sets the thumb URL.
 * @method self thumbPosition(?string $position)
 *   Sets the thumb position.
 * @method self thumbRatio(?string $ratio)
 *   Sets the thumb position.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed
 */
class Item extends BlockIterableItem implements BlockItemInterface
{
    /**
     * The left thumb position.
     */
    public const POSITION_LEFT = 'left';

    /**
     * The right thumb position.
     */
    public const POSITION_RIGHT = 'right';

    /**
     * The top thumb position.
     */
    public const POSITION_TOP = 'top';

    /**
     * The 1x1 thumb ratio.
     */
    public const RATIO_1x1 = '1x1';

    /**
     * The 2x3 thumb ratio.
     */
    public const RATIO_2x3 = '2x3';

    /**
     * The 3x2 thumb ratio.
     */
    public const RATIO_3x2 = '3x2';

    /**
     * The 3x4 thumb ratio.
     */
    public const RATIO_3x4 = '3x4';

    /**
     * The 4x3 thumb ratio.
     */
    public const RATIO_4x3 = '4x3';

    /**
     * The 16x9 thumb ratio.
     */
    public const RATIO_16x9 = '16x9';

    /**
     * The 16x10 thumb ratio.
     */
    public const RATIO_16x10 = '16x10';

    /**
     * The title.
     *
     * @var string|null
     */
    private ?string $title = null;

    /**
     * The description.
     *
     * @var string|null
     */
    private ?string $description = null;

    /**
     * The page URL.
     *
     * @var string|null
     */
    private ?string $href = null;

    /**
     * The thumb URL.
     *
     * @var string|null
     */
    private ?string $thumb = null;

    /**
     * The thumb position.
     *
     * Options:
     *   - left (default)
     *   - right
     *   - top
     *
     * @var string
     */
    private string $thumbPosition = self::POSITION_LEFT;

    /**
     * The thumb ratio.
     *
     * Options:
     *   - 1x1 (default)
     *   - 2x3
     *   - 3x2
     *   - 3x4
     *   - 4x3
     *   - 16x9
     *   - 16x10
     *
     * @var string
     */
    private string $thumbRatio = self::RATIO_1x1;

    /**
     * The constructor.
     *
     * @param string|null $title
     *   A title.
     * @param string|null $href
     *   A page URL.
     */
    public function __construct(?string $title = null, ?string $href = null) {
        $this->setTitle($title);
        $this->setHref($href);
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
     * Sets a description.
     *
     * @param string|null $description
     *   A description.
     *
     * @return void
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description ?: null;
    }

    /**
     * Indicates if a description is set.
     *
     * @return bool
     */
    public function hasDescription(): bool
    {
        return !is_null($this->description);
    }

    /**
     * Returns a description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets a page URL.
     *
     * @param string|null $href
     *   A page URL.
     *
     * @return void
     */
    public function setHref(?string $href): void
    {
        $this->href = filter_var($href, FILTER_VALIDATE_URL) ? $href : null;
    }

    /**
     * Indicates if a page URL is set.
     *
     * @return bool
     */
    public function hasHref(): bool
    {
        return !is_null($this->href);
    }

    /**
     * Returns a page URL.
     *
     * @return string|null
     */
    public function getHref(): ?string
    {
        return $this->href;
    }

    /**
     * Sets a thumb URL.
     *
     * @param string|null $thumb
     *   A thumb URL.
     *
     * @return void
     */
    public function setThumb(?string $thumb): void
    {
        $this->thumb = filter_var($thumb, FILTER_VALIDATE_URL) ? $thumb : null;
    }

    /**
     * Indicates if a thumb URL is set.
     *
     * @return bool
     */
    public function hasThumb(): bool
    {
        return !is_null($this->thumb);
    }

    /**
     * Returns a thumb URL.
     *
     * @return string|null
     */
    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    /**
     * Sets a thump position.
     *
     * @param string|null $position
     *   A thumb position.
     *
     * @return void
     */
    public function setThumbPosition(?string $position): void
    {
        switch ($position) {
            case self::POSITION_LEFT:
            case self::POSITION_RIGHT:
            case self::POSITION_TOP:
                $this->thumbPosition = $position;
                break;
            default:
                $this->thumbPosition = self::POSITION_LEFT;
        }
    }

    /**
     * Indicates if a thumb position is set.
     *
     * @return bool
     */
    public function hasThumbPosition(): bool
    {
        return !is_null($this->thumbPosition);
    }

    /**
     * Returns a thumb position.
     *
     * @return string
     */
    public function getThumbPosition(): string
    {
        return $this->thumbPosition;
    }

    /**
     * Sets a thumb ratio.
     *
     * @param string|null $ratio
     *   A thumb position.
     *
     * @return void
     */
    public function setThumbRatio(?string $ratio): void
    {
        switch ($ratio) {
            case self::RATIO_1x1:
            case self::RATIO_2x3:
            case self::RATIO_3x2:
            case self::RATIO_3x4:
            case self::RATIO_4x3:
            case self::RATIO_16x9:
            case self::RATIO_16x10:
                $this->thumbRatio = $ratio;
                break;
            default:
                $this->thumbRatio = self::RATIO_1x1;
        }
    }

    /**
     * Indicates if a thumb ratio is set.
     *
     * @return bool
     */
    public function hasThumbRatio(): bool
    {
        return !is_null($this->thumbRatio);
    }

    /**
     * Returns a thumb ratio.
     *
     * @return string
     */
    public function getThumbRatio(): string
    {
        return $this->thumbRatio;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasTitle() && $this->hasHref();
    }
}

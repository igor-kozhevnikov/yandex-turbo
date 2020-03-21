<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable;

/**
 * The "Feedback" black.
 *
 * @method self title(?string $title)
 *   Sets the title.
 * @method self stick(?string $stick)
 *   Sets the alignment of a block.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/feedback-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback
 */
class Feedback extends BlockIterable
{
    /**
     * The "false" alignment.
     */
    public const STICK_FALSE = 'false';

    /**
     * The "left" alignment.
     */
    public const STICK_LEFT = 'left';

    /**
     * The "right" alignment.
     */
    public const STICK_RIGHT = 'right';

    /**
     * The title.
     *
     * @var string|null
     */
    private ?string $title = null;

    /**
     * The alignment of a block.
     *
     * Options:
     *   - false (default)
     *   - left
     *   - right
     *
     * @var string
     */
    private string $stick = self::STICK_FALSE;

    /**
     * Feedback constructor.
     *
     * @param array|null $items
     *   A list of items.
     */
    public function __construct(?array $items = null)
    {
        parent::__construct($items);
        $this->setRenderer(FeedbackRender::class);
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
     * Sets a stick.
     *
     * @param string|null $stick
     *   A stick.
     *
     * @return void
     */
    public function setStick(?string $stick): void
    {
        switch ($stick) {
            case self::STICK_FALSE:
            case self::STICK_LEFT:
            case self::STICK_RIGHT:
                $this->stick = $stick;
                break;
            default:
                $this->stick = self::STICK_FALSE;
        }
    }

    /**
     * Indicates if a stick is set.
     *
     * @return bool
     */
    public function hasStick(): bool
    {
        return !is_null($this->stick);
    }

    /**
     * Returns a stick.
     *
     * @return string
     */
    public function getStick(): string
    {
        return $this->stick;
    }
}

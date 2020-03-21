<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable;

/**
 * The "Feed" block.
 *
 * @method self layout(?string $layout)
 *   Sets the layout.
 * @method self title(?string $title)
 *   Sets the title.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/read-also-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed
 */
class Feed extends BlockIterable
{
    /**
     * The vertical layout.
     */
    public const LAYOUT_VERTICAL = 'vertical';

    /**
     * The horizontal layout.
     */
    public const LAYOUT_HORIZONTAL = 'horizontal';

    /**
     * The layout.
     *
     * Options:
     * - vertical (default)
     * - horizontal
     *
     * @var string
     */
    private string $layout = 'vertical';

    /**
     * The title.
     *
     * @var string|null
     */
    private ?string $title = null;

    /**
     * The constructor.
     *
     * @param array|null $items
     *   Sets the items.
     */
    public function __construct(?array $items = null)
    {
        parent::__construct($items);
        $this->setRenderer(FeedRender::class);
    }

    /**
     * Sets a layout.
     *
     * @param string|null $layout
     *   A layout.
     *
     * @return void
     */
    public function setLayout(?string $layout): void
    {
        switch ($layout) {
            case self::LAYOUT_VERTICAL:
            case self::LAYOUT_HORIZONTAL:
                $this->layout = $layout;
                break;
            default:
                $this->layout = self::LAYOUT_VERTICAL;
        }
    }

    /**
     * Returns a layout.
     *
     * @return string|null
     */
    public function getLayout(): ?string
    {
        return $this->layout;
    }

    /**
     * Indicates if a layout is set.
     *
     * @return bool
     */
    public function hasLayout(): bool
    {
        return !is_null($this->layout);
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
     * Returns a title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
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
}

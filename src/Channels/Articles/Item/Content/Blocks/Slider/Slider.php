<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable;

/**
 * The "Slider" block.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/slider-docpage/
 *
 * @method self view(?string $view)
 *   Sets an view.
 * @method self header(?string $header)
 *   Sets a header.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider
 */
class Slider extends BlockIterable
{
    /**
     * The landscape view.
     */
    public const VIEW_LANDSCAPE = 'landscape';

    /**
     * The portrait view.
     */
    public const VIEW_PORTRAIT = 'portrait';

    /**
     * The square view.
     */
    public const VIEW_SQUARE = 'square';

    /**
     * The view of a slider.
     *
     * Options:
     *   - landscape (default)
     *   - portrait
     *   - square
     *
     * @var string
     */
    private string $view = self::VIEW_LANDSCAPE;

    /**
     * The header.
     *
     * @var string|null
     */
    private ?string $header = null;

    /**
     * The constructor.
     *
     * @param array|null $items
     *   A list of items.
     */
    public function __construct(?array $items = null) {
        parent::__construct($items);
        $this->setRenderer(SliderRender::class);
    }

    /**
     * Sets a view.
     *
     * @param string|null $view
     *   An view.
     *
     * @return void
     */
    public function setView(?string $view): void
    {
        switch ($view) {
            case self::VIEW_LANDSCAPE:
            case self::VIEW_PORTRAIT:
            case self::VIEW_SQUARE:
                $this->view = $view;
                break;
            default:
                $this->view = self::VIEW_LANDSCAPE;
        }
    }

    /**
     * Indicates if a view is set.
     *
     * @return bool
     */
    public function hasView(): bool
    {
        return !is_null($this->view);
    }

    /**
     * Returns an view.
     *
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }

    /**
     * Sets a header.
     *
     * @param string|null $header
     *   A header.
     *
     * @return void
     */
    public function setHeader(?string $header): void
    {
        $this->header = $header ?: null;
    }

    /**
     * Indicates if a header is set.
     *
     * @return bool
     */
    public function hasHeader(): bool
    {
        return !is_null($this->header);
    }

    /**
     * Returns a header.
     *
     * @return string|null
     */
    public function getHeader(): ?string
    {
        return $this->header;
    }
}

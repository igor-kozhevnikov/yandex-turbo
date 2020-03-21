<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockItemInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;

/**
 * The "Accordion" block item.
 *
 * @method self title(?string $title)
 *   Sets a title.
 * @method self content(?string $content)
 *   Sets a content.
 * @method self expanded(bool $expanded)
 *   Sets a expanded.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion
 */
class Item extends BlockIterableItem implements BlockItemInterface
{
    /**
     * The title.
     *
     * @var string|null $title
     */
    private ?string $title = null;

    /**
     * The content.
     *
     * @var string|null $content
     */
    private ?string $content = null;

    /**
     * The expanded state.
     *
     * @var bool
     */
    private bool $isExpanded = false;

    /**
     * The constructor.
     *
     * @param string|null $title
     *   A title.
     * @param string|null $content
     *   A content.
     */
    public function __construct(?string $title = null, ?string $content = null)
    {
        $this->setTitle($title);
        $this->setContent($content);
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
     * Sets a content.
     *
     * @param string|null $content
     *   A content.
     *
     * @return void
     */
    public function setContent(?string $content): void
    {
        $this->content = $content ?: null;
    }

    /**
     * Indicates if a content is set.
     *
     * @return bool
     */
    public function hasContent(): bool
    {
        return !is_null($this->content);
    }

    /**
     * Returns a content.
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Sets an expanded state.
     *
     * @param bool $isExpanded
     *   An expanded state.
     *
     * @return void
     */
    public function setExpanded(bool $isExpanded = true): void
    {
        $this->isExpanded = $isExpanded;
    }

    /**
     * Indicates if a expanded is set.
     *
     * @return bool
     */
    public function isExpanded(): bool
    {
        return $this->isExpanded;
    }

    /**
     * Returns an expanded state.
     *
     * @return string
     */
    public function getExpanded(): string
    {
        return $this->isExpanded ? 'true' : 'false';
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasTitle() && $this->hasContent();
    }
}

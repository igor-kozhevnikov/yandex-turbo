<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block;

/**
 * The "Search" block.
 *
 * @method self action(?string $action)
 *   Sets the form action.
 * @method self name(?string $name)
 *   Sets the param name.
 * @method self placeholder(?string $placeholder)
 *   Sets the placeholder.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/search-block-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search
 */
class Search extends Block
{
    /**
     * The form action.
     *
     * Use "{text}" placeholder as search query.
     * Example, https://example.com/search?query={text}
     *
     * @var string|null
     */
    private ?string $action = null;

    /**
     * The query param name.
     *
     * @var string|null
     */
    private ?string $name = null;

    /**
     * The search input placeholder.
     *
     * @var string|null
     */
    private ?string $placeholder = null;

    /**
     * The constructor.
     *
     * @param string|null $action
     *   A form action.
     * @param string|null $name
     *   A param name.
     */
    public function __construct(?string $action = null, ?string $name = null)
    {
        $this->setRenderer(SearchRender::class);
        $this->setAction($action);
        $this->setName($name);
    }

    /**
     * Sets a form action.
     *
     * @param string|null $action
     *   A form action.
     *
     * @return void
     */
    public function setAction(?string $action): void
    {
        $this->action = filter_var($action, FILTER_VALIDATE_URL) ? $action : null;
    }

    /**
     * Indicates if an action is set.
     *
     * @return bool
     */
    public function hasAction(): bool
    {
        return !is_null($this->action);
    }

    /**
     * Returns a form action.
     *
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * Sets a param name.
     *
     * @param string|null $name
     *   A param name.
     *
     * @return void
     */
    public function setName(?string $name): void
    {
        $this->name = $name ?: null;
    }

    /**
     * Indicates if a name is set.
     *
     * @return bool
     */
    public function hasName(): bool
    {
        return !is_null($this->name);
    }

    /**
     * Returns a param name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets a placeholder.
     *
     * @param string|null $placeholder
     *   A placeholder.
     *
     * @return void
     */
    public function setPlaceholder(?string $placeholder): void
    {
        $this->placeholder = $placeholder ?: null;
    }

    /**
     * Indicates if a placeholder is set.
     *
     * @return bool
     */
    public function hasPlaceholder(): bool
    {
        return !is_null($this->placeholder);
    }

    /**
     * Returns a placeholder.
     *
     * @return string|null
     */
    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasAction() && $this->hasName();
    }
}

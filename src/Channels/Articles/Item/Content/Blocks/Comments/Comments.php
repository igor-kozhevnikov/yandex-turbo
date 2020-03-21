<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable;

/**
 * The "Comments" block.
 *
 * @method self url(?string $url)
 *   Sets the URL.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments
 */
class Comments extends BlockIterable
{
    /**
     * The URL for adding a comment.
     *
     * @var string|null
     */
    private ?string $url = null;

    /**
     * Comments constructor.
     *
     * @param array|null $items
     *   An array of items.
     */
    public function __construct(?array $items = null)
    {
        parent::__construct($items);
        $this->setRenderer(CommentsRender::class);
    }

    /**
     * Sets an URL for adding a comment.
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
     * Indicates if an URL is set.
     *
     * @return bool
     */
    public function hasURL(): bool
    {
        return !is_null($this->url);
    }

    /**
     * Returns an URL for adding a comment.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
}

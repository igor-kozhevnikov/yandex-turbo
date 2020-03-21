<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockItemInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The "Comments" block item.
 *
 * @method self author(?string $author)
 *   Sets the author.
 * @method self content(?string $content)
 *   Sets the content.
 * @method self avatar(?string $avatar)
 *   Sets the avatar URL.
 * @method self subTitle(?string $title)
 *   Sets the sub title.
 * @method self header(?string $header)
 *   Sets the header.
 * @method self comments(?Comments $comments)
 *   Sets the comments.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments
 */
class Comment extends BlockIterableItem implements BlockItemInterface
{
    use Renderer;

    /**
     * The author.
     *
     * @var string|null
     */
    private ?string $author = null;

    /**
     * The author avatar.
     *
     * @var string|null
     */
    private ?string $avatar = null;

    /**
     * The sub title.
     *
     * @var string|null
     */
    private ?string $subTitle = null;

    /**
     * The header.
     *
     * @var string|null
     */
    private ?string $header = null;

    /**
     * The content.
     *
     * @var string|null
     */
    private ?string $content = null;

    /**
     * The comments.
     *
     * @var Comments|null
     */
    private ?Comments $comments = null;

    /**
     * Comment constructor.
     *
     * @param string|null $author
     *   An author.
     * @param string|null $content
     *   A content.
     */
    public function __construct(?string $author = null, ?string $content = null) {
        $this->setRenderer(CommentRender::class);
        $this->setAuthor($author);
        $this->setContent($content);
    }

    /**
     * Sets an author.
     *
     * @param string|null $author
     *   An author.
     *
     * @return void
     */
    public function setAuthor(?string $author): void
    {
        $this->author = $author ?: null;
    }

    /**
     * Indicates if a author is set.
     *
     * @return bool
     */
    public function hasAuthor(): bool
    {
        return !is_null($this->author);
    }

    /**
     * Returns an author.
     *
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * Sets an avatar URL.
     *
     * @param string|null $avatar
     *   An avatar URL.
     *
     * @return void
     */
    public function setAvatar(?string $avatar): void
    {
        $this->avatar = filter_var($avatar, FILTER_VALIDATE_URL) ? $avatar : null;
    }

    /**
     * Indicates if an avatar URL is set.
     *
     * @return bool
     */
    public function hasAvatar(): bool
    {
        return !is_null($this->avatar);
    }

    /**
     * Returns an avatar URL.
     *
     * @return string|null
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * Sets a sub title.
     *
     * @param string|null $subTitle
     *   A sub title.
     *
     * @return void
     */
    public function setSubTitle(?string $subTitle): void
    {
        $this->subTitle = $subTitle ?: null;
    }

    /**
     * Indicates if a sub title is set.
     *
     * @return bool
     */
    public function hasSubTitle(): bool
    {
        return !is_null($this->subTitle);
    }

    /**
     * Returns a sub title.
     *
     * @return string|null
     */
    public function getSubTitle(): ?string
    {
        return $this->subTitle;
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
     * Sets comments.
     *
     * @param Comments|null $comments
     *   Comments.
     *
     * @return void
     */
    public function setComments(?Comments $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * Indicates if comments is set.
     *
     * @return bool
     */
    public function hasComments(): bool
    {
        return !is_null($this->comments);
    }

    /**
     * Returns comments.
     *
     * @return Comments|null
     */
    public function getComments(): ?Comments
    {
        return $this->comments;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasAuthor() && $this->hasContent();
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for a comment of the "Comments" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments
 */
class CommentRender
{
    /**
     * Renders a comment.
     *
     * @param Comment $data
     *   A comment.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Comment $data): ?string
    {
        $comment = Tag::create('div')
            ->attribute('data-block', 'comment')
            ->attribute('data-author', $data->getAuthor())
            ->attribute('data-avatar-url', $data->getAvatar())
            ->attribute('data-subtitle', $data->getSubTitle());

        if ($data->hasHeader()) {
            Tag::create('header')->content($data->getHeader())->appendTo($comment);
        }

        Tag::create('content')
            ->attribute('data-block', 'content')
            ->content($data->getContent())
            ->appendTo($comment);

        if ($data->hasComments()) {
            $comment->content($data->getComments()->render());
        }

        return $comment;
    }
}

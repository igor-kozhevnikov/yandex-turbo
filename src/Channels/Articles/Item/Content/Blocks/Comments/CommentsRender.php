<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Comments" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments
 */
class CommentsRender
{
    /**
     * Renders the "Comments" block.
     *
     * @param Comments $comments
     *   The "Comments" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Comments $comments): ?string
    {
        return Tag::create('div')
            ->attribute('data-block', 'comments')
            ->attribute('data-url', $comments->getUrl(), $comments->hasURL())
            ->content($comments->getItems(), fn(Comment $comment) => $comment->isValid() ? $comment->render() : null);
    }
}

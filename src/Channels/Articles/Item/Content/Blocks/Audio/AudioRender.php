<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Audio" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio
 */
class AudioRender
{
    /**
     * Renders the "Audio" block.
     *
     * @param Audio $audio
     *   The "Audio" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Audio $audio): ?string
    {
        return Tag::create('div')
            ->attribute('data-block', 'audio')
            ->attribute('src', $audio->getSrc());
    }
}

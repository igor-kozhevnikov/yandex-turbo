<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Textarea" item.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea
 */
class TextareaRender
{
    /**
     * Renders the "Textarea" item.
     *
     * @param Textarea $textarea
     *   The "Textarea" item.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Textarea $textarea): ?string
    {
        return Tag::create('span')
            ->attribute('type', 'textarea')
            ->attribute('name', $textarea->getName())
            ->attribute('label', $textarea->getLabel())
            ->attribute('required', $textarea->getRequired())
            ->attribute('placeholder', $textarea->getPlaceholder());
    }
}

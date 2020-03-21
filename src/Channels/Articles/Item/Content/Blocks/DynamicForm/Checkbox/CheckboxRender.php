<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Checkbox" item.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox
 */
class CheckboxRender
{
    /**
     * Renders the "Checkbox" item.
     *
     * @param Checkbox $checkbox
     *   The "Checkbox" item.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Checkbox $checkbox): ?string
    {
        return Tag::create('span')
            ->attribute('type', 'checkbox')
            ->attribute('name', $checkbox->getName())
            ->attribute('content', $checkbox->getContent())
            ->attribute('value', $checkbox->getValue());
    }
}

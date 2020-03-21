<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Input" item.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input
 */
class InputRender
{
    /**
     * Renders the "Input" item.
     *
     * @param Input $input
     *   The "Input" item.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Input $input): ?string
    {
        return Tag::create('span')
            ->attribute('type', 'input')
            ->attribute('name', $input->getName())
            ->attribute('label', $input->getLabel())
            ->attribute('input-type', $input->getType())
            ->attribute('required', $input->getRequired())
            ->attribute('placeholder', $input->getPlaceholder());
    }
}

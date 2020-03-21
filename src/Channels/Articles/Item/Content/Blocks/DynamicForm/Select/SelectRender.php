<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Select" item.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select
 */
class SelectRender
{
    /**
     * Renders the "Select" item.
     *
     * @param Select $select
     *   The "Select" item.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Select $select): ?string
    {
        return Tag::create('span')
            ->attribute('type', 'select')
            ->attribute('name', $select->getName())
            ->attribute('label', $select->getLabel())
            ->attribute('value', $select->getValue())
            ->content($select->getOptions(), function (Option $option) {
                if (!$option->isValid()) { return null; }

                return Tag::create('span')
                    ->attribute('type', 'option')
                    ->attribute('value', $option->getValue())
                    ->attribute('text', $option->getText())
                    ->appendTo($output);
            });
    }
}

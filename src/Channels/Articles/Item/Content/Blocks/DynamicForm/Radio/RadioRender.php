<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Radio" item.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio
 */
class RadioRender
{
    /**
     * Renders the "Radio" item.
     *
     * @param Radio $radio
     *   The "Radio" item.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Radio $radio): ?string
    {
        return Tag::create('span')
            ->attribute('type', 'radio')
            ->attribute('name', $radio->getName())
            ->attribute('label', $radio->getLabel())
            ->content($radio->getOptions(), function (Option $option) {
                if (!$option->isValid()) { return null; }

                return Tag::create('span')
                    ->attribute('type', 'option')
                    ->attribute('value', $option->getValue())
                    ->attribute('label', $option->getLabel())
                    ->attribute('meta', $option->getMeta())
                    ->attribute('checked', $option->getChecked())
                    ->appendTo($output);
            });
    }
}

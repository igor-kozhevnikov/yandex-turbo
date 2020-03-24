<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Button" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button
 */
class ButtonRender
{
    /**
     * Renders the "Button" block.
     *
     * @param Button $button
     *   The "Button" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Button $button): ?string
    {
        return Tag::create('button')
            ->attribute('formaction', $button->getFormaction())
            ->attribute('data-turbo', $button->getTurbo())
            ->attribute('data-primary', $button->getPrimary())
            ->attribute('data-background-color', $button->getBackground())
            ->attribute('data-color', $button->getColor())
            ->attribute('disabled', 'disabled', $button->isDisabled())
            ->content($button->getText());
    }
}

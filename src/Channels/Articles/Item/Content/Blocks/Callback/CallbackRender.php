<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Callback" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback
 */
class CallbackRender
{
    /**
     * Renders the "Callback" block.
     *
     * @param Callback $callback
     *   The "Callback" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Callback $callback): ?string
    {
        return Tag::create('form')
            ->attribute('data-type', 'callback')
            ->attribute('data-send-to', $callback->getSendTo())
            ->attribute('data-agreement-company', $callback->getAgreementCompany())
            ->attribute('data-agreement-link', $callback->getAgreementLink());
    }
}

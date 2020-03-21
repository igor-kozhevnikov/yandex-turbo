<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "Feedback" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback
 */
class FeedbackRender
{
    /**
     * Renders the "Feedback" block.
     *
     * @param Feedback $feedback
     *   The "Feedback" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(Feedback $feedback): ?string
    {
        return Tag::create('div')
            ->attribute('data-block', 'widget-feedback')
            ->attribute('data-stick', $feedback->getStick())
            ->attribute('data-title', $feedback->getTitle())
            ->content($feedback->getItems(), function (Item $item) {
                if (!$item->isValid()) { return null; }

                return Tag::create('div')
                    ->attribute('data-type', $item->getType())
                    ->attribute('data-send-to', $item->getSendTo())
                    ->attribute('data-agreement-company', $item->getAgreementCompany())
                    ->attribute('data-agreement-link', $item->getAgreementLink())
                    ->attribute('data-url', $item->getUrl());
            });
    }
}

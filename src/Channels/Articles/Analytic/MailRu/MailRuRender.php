<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic\MailRu;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "MailRu" analytic.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytics\MailRu
 */
class MailRuRender
{
    /**
     * Render "MailRu" analytic.
     *
     * @param MailRu $mail
     *   The "MailRu" analytic.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(MailRu $mail): ?string
    {
        return Tag::create('turbo:analytics')
            ->attribute('type', $mail->getType())
            ->attribute('id', $mail->getId());
    }
}

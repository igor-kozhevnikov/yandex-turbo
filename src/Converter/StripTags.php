<?php

namespace Mireon\YandexTurbo\Converter;

use Mireon\YandexTurbo\Converter\ConverterInterface;

/**
 * The converter for removing all tags.
 *
 * @package Mireon\YandexTurbo\Manager\Handlers;
 */
class StripTags implements ConverterInterface
{
    /**
     * @inheritDoc
     */
    public function convert(string $text): string
    {
        return strip_tags($text);
    }
}

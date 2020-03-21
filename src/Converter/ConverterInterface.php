<?php

namespace Mireon\YandexTurbo\Converter;

/**
 * The contract for converters.
 *
 * @package Mireon\YandexTurbo\Manager;
 */
interface ConverterInterface
{
    /**
     * Convert a text.
     *
     * @param string $text
     *   A text for conversion.
     *
     * @return string
     */
    public function convert(string $text): string;
}

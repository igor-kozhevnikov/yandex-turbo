<?php

namespace Mireon\YandexTurbo\Converter;

/**
 * The converter for removing not allowed tags.
 *
 * @package Mireon\YandexTurbo\Manager\Handlers;
 */
class StripNotAllowedTags implements ConverterInterface
{
    /**
     * Returns allowed tags as a string.
     *
     * @return string|null
     */
    protected function getAllowedTags(): ?string
    {
        $allowed = [
            'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'a', 'br', 'hr', 'ul', 'ol', 'li', 'b', 'strong', 'i', 'em',
            'sup', 'sub', 'ins', 'del', 'small', 'big', 'pre', 'abbr', 'u', 'table', 'tr', 'th', 'td', 'div', 'caption',
            'code', 'blockquote', 'dl', 'dt', 'dd', 'figure', 'figcaption', 'img', 'header', 'source', 'video', 'menu',
            'button',
        ];

        return array_reduce($allowed, fn($output, $tag) => "$output<$tag>");
    }

    /**
     * Convert a text.
     *
     * @param string $text
     *   A text for conversion.
     *
     * @return string
     */
    public function convert(string $text): string
    {
        return strip_tags($text, $this->getAllowedTags());
    }
}

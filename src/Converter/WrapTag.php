<?php

namespace Mireon\YandexTurbo\Converter;

use Mireon\YandexTurbo\Converter\ConverterInterface;

/**
 * The converter for wrapping with "<p>" tag.
 *
 * @package Mireon\YandexTurbo\Manager\Handlers;
 */
class WrapTag implements ConverterInterface
{
    /**
     * The tag.
     *
     * @var string|null $tag
     */
    private ?string $tag = null;

    /**
     * The list of attributes tag.
     *
     * @var array|null
     */
    private ?array $attrs = null;

    /**
     * The constructor.
     *
     * @param string $tag
     *   A tag.
     * @param array|null $attrs
     *   An associative array of attributes.
     */
    public function __construct(string $tag, ?array $attrs = null)
    {
        $this->tag = trim($tag);
        $this->attrs = $attrs;
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
        if (empty($this->tag)) {
            return $text;
        }

        $attrs = null;
        if (!empty($this->attrs)) {
            $attrs = array_map(fn($key, $value) => "$key=\"$value\"", array_keys($this->attrs), $this->attrs);
            $attrs = ' ' . implode(' ', $attrs);
        }

        return "<{$this->tag}{$attrs}>$text</{$this->tag}>";
    }
}

<?php

namespace Mireon\YandexTurbo\Converter;

/**
 * The converter of a text.
 *
 * @package Mireon\YandexTurbo\Manager
 */
class Manager
{
    /**
     * Converts text using converters from an array.
     *
     * @param string|null $text
     *   A text for converting.
     * @param ConverterInterface[]|string|null $converters
     *   An array of converters.
     *
     * @return string|null
     */
    public static function convert(?string $text, $converters = null): ?string
    {
        if (empty($converters)) {
            return $text;
        }

        if (empty($text)) {
            return null;
        }

        if (!is_array($converters)) {
            $converters = [$converters];
        }

        foreach ($converters as $class) {
            if ($converter = self::getClass($class)) {
                $text = $converter->convert($text);
            }
        }

        return $text;
    }

    /**
     * Returns a instance class of a converter.
     *
     * @param ConverterInterface|string $class
     *   A converter.
     *
     * @return ConverterInterface|null
     */
    private static function getClass($class): ?ConverterInterface
    {
        if (is_string($class) && class_exists($class)) {
            $class = new $class();
        }

        if ($class instanceof ConverterInterface) {
            return $class;
        }

        return null;
    }
}

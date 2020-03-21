<?php

namespace Mireon\YandexTurbo\Helpers;

/**
 * The utility for strings.
 *
 * @package Mireon\YandexTurbo\Helpers
 */
class Str
{
    /**
     * Limit the number of characters in a string.
     *
     * @param string $text
     *   A text
     * @param int $limit
     *   A max number of letters.
     * @param string $end
     *   A end of text.
     *
     * @return string
     */
    public static function limit(string $text, int $limit = 100, string $end = '...'): string
    {
        if (mb_strwidth($text, 'UTF-8') <= $limit) {
            return $text;
        }

        return rtrim(mb_strimwidth($text, 0, $limit, '', 'UTF-8')) . $end;
    }

    /**
     * Escape HTML special characters in a string.
     *
     * @param string $text
     *   A text.
     * @param bool $doubleEncode
     *   When is turned off PHP will not encode existing html entities,
     *   the default is to convert everything.
     *
     * @return string
     */
    public static function e(string $text, bool $doubleEncode = false): string
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8', $doubleEncode);
    }

    /**
     * Convert a value to studly caps case.
     *
     * @param string $text
     *   A text.
     *
     * @return string
     */
    public static function studly(string $text): string
    {
        $text = ucwords(str_replace(['-', '_'], ' ', $text));

        return str_replace(' ', '', $text);
    }

    /**
     * Convert the given string to lower-case.
     *
     * @param string $text
     *   A text.
     *
     * @return string
     */
    public static function lower(string $text): string
    {
        return mb_strtolower($text, 'UTF-8');
    }
}

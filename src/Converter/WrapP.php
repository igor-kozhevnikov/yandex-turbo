<?php

namespace Mireon\YandexTurbo\Converter;

/**
 * The converter for wrapping with "<p>" tag.
 *
 * @package Mireon\YandexTurbo\Manager\Handlers;
 */
class WrapP extends WrapTag
{
    /**
     * The constructor.
     *
     * @param array|null $attrs
     *   An associative array of attributes.
     */
    public function __construct(?array $attrs = null)
    {
        parent::__construct('p', $attrs);
    }
}

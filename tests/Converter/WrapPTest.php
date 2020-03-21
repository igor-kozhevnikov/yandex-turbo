<?php

namespace Mireon\YandexTurbo\Tests\Converter;

use Mireon\YandexTurbo\Converter\Manager;
use Mireon\YandexTurbo\Converter\WrapP;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "WrapP" handler.
 *
 * @package Mireon\YandexTurbo\Tests\Manager\Handlers
 */
class WrapPTest extends TestCase
{
    /**
     * Testing of the handler.
     *
     * @return void
     */
    public function testHandler(): void
    {
        $result = Manager::convert('text', [ WrapP::class ]);
        $this->assertSame('<p>text</p>', $result);

        $result = Manager::convert('text', [ new WrapP(['class' => 'red']) ]);
        $this->assertSame('<p class="red">text</p>', $result);
    }
}

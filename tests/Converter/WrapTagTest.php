<?php

namespace Mireon\YandexTurbo\Tests\Converter;

use Mireon\YandexTurbo\Converter\Manager;
use Mireon\YandexTurbo\Converter\WrapTag;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "WrapTag" handler.
 *
 * @package Mireon\YandexTurbo\Tests\Manager\Handlers
 */
class WrapTagTest extends TestCase
{
    /**
     * Testing of the empty tag.
     *
     * @covers \Mireon\YandexTurbo\Converter\WrapTag::convert
     *
     * @return void
     */
    public function testEmptyTag(): void
    {
        $result = Manager::convert('text', [ new WrapTag('') ]);
        $this->assertSame('text', $result);

        $result = Manager::convert('text', [ new WrapTag(' ') ]);
        $this->assertSame('text', $result);
    }

    /**
     * Testing of the empty attributes.
     *
     * @covers \Mireon\YandexTurbo\Converter\WrapTag::convert
     *
     * @return void
     */
    public function testEmptyAttributes(): void
    {
        $result = Manager::convert('text', [ new WrapTag('div', null) ]);
        $this->assertSame('<div>text</div>', $result);

        $result = Manager::convert('text', [ new WrapTag('div', []) ]);
        $this->assertSame('<div>text</div>', $result);
    }

    /**
     * Testing of the valid data.
     *
     * @covers \Mireon\YandexTurbo\Converter\WrapTag::convert
     *
     * @return void
     */
    public function testValidData(): void
    {
        $result = Manager::convert('text', [ new WrapTag('div') ]);
        $this->assertSame('<div>text</div>', $result);

        $result = Manager::convert('text', [ new WrapTag('div', ['data-index' => 1, 'class' => 'red']) ]);
        $this->assertSame('<div data-index="1" class="red">text</div>', $result);
    }
}

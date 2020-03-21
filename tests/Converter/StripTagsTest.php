<?php

namespace Mireon\YandexTurbo\Tests\Converter;

use Mireon\YandexTurbo\Converter\Manager;
use Mireon\YandexTurbo\Converter\StripTags;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "StripTags" handler.
 *
 * @package Mireon\YandexTurbo\Tests\Manager\Handlers
 */
class StripTagsTest extends TestCase
{
    /**
     * Testing of the handler.
     *
     * @return void
     */
    public function testHandler(): void
    {
        $result = Manager::convert('<p>text</p>', [ StripTags::class ]);
        $this->assertSame('text', $result);
    }
}

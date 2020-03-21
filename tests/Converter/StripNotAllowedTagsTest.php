<?php

namespace Mireon\YandexTurbo\Tests\Converter;

use Mireon\YandexTurbo\Converter\Manager;
use Mireon\YandexTurbo\Converter\StripNotAllowedTags;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "StripNotAllowedTags" handler.
 *
 * @package Mireon\YandexTurbo\Tests\Manager\Handlers
 */
class StripNotAllowedTagsTest extends TestCase
{
    /**
     * Testing of the handler.
     *
     * @return void
     */
    public function testHandler(): void
    {
        $result = Manager::convert('<custom><p>text<p></custom>', [ StripNotAllowedTags::class ]);
        $this->assertSame('<p>text<p>', $result);
    }
}

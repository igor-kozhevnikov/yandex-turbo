<?php

namespace Mireon\YandexTurbo\Tests\Helpers;

use PHPUnit\Framework\TestCase;
use Mireon\YandexTurbo\Helpers\Str;

/**
 * Testing of the string helper.
 *
 * @package Mireon\YandexTurbo\Tests\Helpers
 */
class StrTest extends TestCase
{
    /**
     * Testing of the "limit" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Str::limit
     *
     * @return void
     */
    public function testLimit(): void
    {
        $result = Str::limit('text', 2);
        $this->assertSame('te...', $result);

        $result = Str::limit('te', 2, '');
        $this->assertSame('te', $result);

        $result = Str::limit('text', 2, '_');
        $this->assertSame('te_', $result);
    }

    /**
     * Testing of the "e" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Str::e
     *
     * @return void
     */
    public function testE(): void
    {
        $result = Str::e('& " \' > <');
        $this->assertSame('&amp; &quot; &#039; &gt; &lt;', $result);
    }

    /**
     * Testing of the "studly" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Str::studly
     *
     * @return void
     */
    public function testStudly(): void
    {
        $result = Str::studly('aaa bbb ccc');
        $this->assertSame('AaaBbbCcc', $result);

        $result = Str::studly('aaa-bbb-ccc');
        $this->assertSame('AaaBbbCcc', $result);

        $result = Str::studly('aaa-bbb-ccc');
        $this->assertSame('AaaBbbCcc', $result);
    }

    /**
     * Testing of the "lower" method.
     *
     * @return void
     */
    public function testLower(): void
    {
        $result = Str::lower('AAA');
        $this->assertSame('aaa', $result);
    }
}

<?php

namespace Mireon\YandexTurbo\Tests\Traits;

use BadMethodCallException;
use PHPUnit\Framework\TestCase;

/**
 * Testing for the "MagicSetter" trait.
 *
 * @package Mireon\YandexTurbo\Tests\Traits
 */
class MagicSetterTest extends TestCase
{
    /**
     * Testing setters.
     *
     * @return void
     */
    public function testSetters(): void
    {
        $class = new Example();
        $class = $class->data('hello');
        $this->assertInstanceOf(Example::class, $class);
        $this->assertSame('hello', $class->getData());
    }

    /**
     * Testing adders.
     *
     * @return void
     */
    public function testAdders(): void
    {
        $class = new Example();
        $class->setData('hello');
        $class = $class->suffix(' world!');
        $this->assertInstanceOf(Example::class, $class);
        $this->assertSame('hello world!', $class->getData());
    }

    /**
     * Testing an exception.
     *
     * @return void
     */
    public function testException(): void
    {
        $this->expectException(BadMethodCallException::class);
        (new Example())->invalid_method();
    }
}

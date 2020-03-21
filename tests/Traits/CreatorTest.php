<?php

namespace Mireon\YandexTurbo\Tests\Traits;

use PHPUnit\Framework\TestCase;

/**
 * Testing for the "Creator" trait.
 *
 * @package Mireon\YandexTurbo\Tests\Traits
 */
class CreatorTest extends TestCase
{
    /**
     * Testing for the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Traits\Creator::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $class = Example::create();
        $this->assertInstanceOf(Example::class, $class);

        $class = Example::create('data');
        $this->assertInstanceOf(Example::class, $class);
        $this->assertSame('data', $class->getData());
    }

    /**
     * Testing for the "createFromArray" method.
     *
     * @covers \Mireon\YandexTurbo\Traits\Creator::createFromArray
     *
     * @return void
     */
    public function testCreateFromArray(): void
    {
        $class = Example::createFromArray([]);
        $this->assertInstanceOf(Example::class, $class);
        $this->assertEquals(new Example(), $class);

        $class = Example::createFromArray(['data' => 'hello']);
        $this->assertSame('hello', $class->getData());
    }

    /**
     * Testing for the "createFromClosure" method.
     *
     * @covers \Mireon\YandexTurbo\Traits\Creator::createFromClosure
     *
     * @return void
     */
    public function testCreateFromClosure(): void
    {
        $class = Example::createFromClosure(null);
        $this->assertInstanceOf(Example::class, $class);
        $this->assertEquals(new Example(), $class);

        $class = Example::createFromClosure(function (Example $example) { $example->setData('hello'); });
        $this->assertSame('hello', $class->getData());
    }
}

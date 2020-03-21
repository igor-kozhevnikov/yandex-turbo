<?php

namespace Mireon\YandexTurbo\Tests\Converter;

use Mireon\YandexTurbo\Converter\ConverterInterface;
use Mireon\YandexTurbo\Converter\Manager;
use Mireon\YandexTurbo\Converter\WrapP;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use stdClass;

/**
 * Testing of the converter.
 *
 * @package Mireon\YandexTurbo\Tests\Manager
 */
class ManagerTest extends TestCase
{
    /**
     * Testing of the "convert" method with empty text.
     *
     * @covers \Mireon\YandexTurbo\Converter\Manager::convert
     *
     * @return void
     */
    public function testEmptyText(): void
    {
        $result = Manager::convert(null, [WrapP::class]);
        $this->assertNull($result);

        $result = Manager::convert('', [WrapP::class]);
        $this->assertSame(null, $result);

        $result = Manager::convert(null, WrapP::class);
        $this->assertNull($result);

        $result = Manager::convert('', WrapP::class);
        $this->assertSame(null, $result);
    }

    /**
     * Testing of the "convert" method with empty list of converters.
     *
     * @covers \Mireon\YandexTurbo\Converter\Manager::convert
     *
     * @return void
     */
    public function testEmptyConverters(): void
    {
        $result = Manager::convert('text', null);
        $this->assertSame('text', $result);

        $result = Manager::convert('text', []);
        $this->assertSame('text', $result);

        $result = Manager::convert('text', '');
        $this->assertSame('text', $result);
    }

    /**
     * Testing of the "convert" method with a converter as string.
     *
     * @covers \Mireon\YandexTurbo\Converter\Manager::convert
     *
     * @return void
     */
    public function testAsString(): void
    {
        $result = Manager::convert('text', [WrapP::class]);
        $this->assertSame('<p>text</p>', $result);

        $result = Manager::convert('text', ['not_class']);
        $this->assertSame('text', $result);

        $result = Manager::convert('text', [stdClass::class]);
        $this->assertSame('text', $result);

        $result = Manager::convert('text', WrapP::class);
        $this->assertSame('<p>text</p>', $result);

        $result = Manager::convert('text', 'not_class');
        $this->assertSame('text', $result);

        $result = Manager::convert('text', stdClass::class);
        $this->assertSame('text', $result);
    }

    /**
     * Testing of the "convert" method with a converter as instance class.
     *
     * @covers \Mireon\YandexTurbo\Converter\Manager::convert
     *
     * @return void
     */
    public function testAsInstance(): void
    {
        $result = Manager::convert('text', [new WrapP()]);
        $this->assertSame('<p>text</p>', $result);

        $result = Manager::convert('text', [new stdClass()]);
        $this->assertSame('text', $result);

        $result = Manager::convert('text', new WrapP());
        $this->assertSame('<p>text</p>', $result);

        $result = Manager::convert('text', new stdClass());
        $this->assertSame('text', $result);
    }

    /**
     * Testing of the "getClass" method.
     *
     * @covers \Mireon\YandexTurbo\Converter\Manager::getClass
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testGetClass(): void
    {
        $class = new ReflectionClass(Manager::class);
        $method = $class->getMethod('getClass');
        $method->setAccessible(true);

        $manager = new Manager();
        $this->assertNull($method->invokeArgs($manager, ['class']));

        $manager = new Manager();
        $this->assertInstanceOf(ConverterInterface::class, $method->invokeArgs($manager, [Example::class]));

        $manager = new Manager();
        $this->assertInstanceOf(ConverterInterface::class, $method->invokeArgs($manager, [new Example()]));
    }
}

/**
 * Example converter.
 *
 * @package Mireon\YandexTurbo\Tests\Converter
 */
class Example implements ConverterInterface {
    /**
     * @inheritDoc
     */
    public function convert(string $text): string
    {
        return $text;
    }
}

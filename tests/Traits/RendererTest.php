<?php

namespace Mireon\YandexTurbo\Tests\Traits;

use PHPUnit\Framework\TestCase;

/**
 * Testing for the "Renderer" trait.
 *
 * @package Mireon\YandexTurbo\Tests\Traits
 */
class RendererTest extends TestCase
{
    /**
     * Testing the "renderer" variable.
     *
     * @covers \Mireon\YandexTurbo\Traits\Renderer::setRenderer
     * @covers \Mireon\YandexTurbo\Traits\Renderer::hasRenderer
     * @covers \Mireon\YandexTurbo\Traits\Renderer::getRenderer
     *
     * @return void
     */
    public function testRenderer(): void
    {
        $class = new Example();
        $this->assertNull($class->getRenderer());
        $this->assertFalse($class->hasRenderer());

        $class = new Example();
        $class->setRenderer('invalid');
        $this->assertNull($class->getRenderer());
        $this->assertFalse($class->hasRenderer());

        $class = new Example();
        $class->setRenderer(new class {});
        $this->assertNull($class->getRenderer());
        $this->assertFalse($class->hasRenderer());

        $class = new Example();
        $class->setRenderer(Renderer::class);
        $this->assertNotNull($class->getRenderer());
        $this->assertTrue($class->hasRenderer());

        $class = new Example();
        $class->setRenderer(new Renderer());
        $this->assertNotNull($class->getRenderer());
        $this->assertTrue($class->hasRenderer());
    }

    /**
     * Testing the "render" method.
     *
     * @covers \Mireon\YandexTurbo\Traits\Renderer::render
     *
     * @return void
     */
    public function testRender(): void
    {
        $class = new Example();
        $this->assertNull($class->render());

        $class = new Example();
        $class->setData('hello render');
        $class->setRenderer(Renderer::class);
        $this->assertSame('hello render', $class->render());
    }
}

/**
 * The example renderer.
 *
 * @package Mireon\YandexTurbo\Tests\Traits
 */
class Renderer {
    public function render(Example $example): ?string
    {
        return $example->getData();
    }
}

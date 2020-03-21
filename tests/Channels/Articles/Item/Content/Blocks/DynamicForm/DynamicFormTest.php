<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\DynamicForm;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "DynamicForm" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\DynamicForm
 */
class DynamicFormTest extends TestCase
{
    /**
     * The URL for processing form data.
     *
     * @var string|null $endPoint
     */
    private $endPoint = 'https://example.com';

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\DynamicForm::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $form = new DynamicForm();
        $this->assertEmpty($form->getItems());
        $this->assertNull($form->getEndPoint());

        $form = new DynamicForm([new Input()]);
        $this->assertNotEmpty($form->getItems());
    }

    /**
     * Testing of the "endPoint" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\DynamicForm::setEndPoint
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\DynamicForm::hasEndPoint
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\DynamicForm::getEndPoint
     *
     * @return void
     */
    public function testEndPoint(): void
    {
        $form = new DynamicForm();
        $form->setEndPoint($this->endPoint);
        $this->assertSame($this->endPoint, $form->getEndPoint());
        $this->assertTrue($form->hasEndPoint());

        $form = new DynamicForm();
        $form->setEndPoint('');
        $this->assertNull($form->getEndPoint());
        $this->assertFalse($form->hasEndPoint());

        $form = new DynamicForm();
        $form->setEndPoint(null);
        $this->assertNull($form->getEndPoint());
        $this->assertFalse($form->hasEndPoint());

        $form = new DynamicForm();
        $form->setEndPoint('url');
        $this->assertNull($form->getEndPoint());
        $this->assertFalse($form->hasEndPoint());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\DynamicForm::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $form = DynamicForm::create();
        $this->assertEmpty($form->getItems());
        $this->assertNull($form->getEndPoint());

        $form = DynamicForm::create([new Input()]);
        $this->assertNotEmpty($form->getItems());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $form = (new DynamicForm())->endPoint($this->endPoint);
        $this->assertInstanceOf(DynamicForm::class, $form);
        $this->assertSame($this->endPoint, $form->getEndPoint());
    }
}

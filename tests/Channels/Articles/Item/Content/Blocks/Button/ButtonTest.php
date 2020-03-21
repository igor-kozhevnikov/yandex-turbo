<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Button;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Button" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Button
 */
class ButtonTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $formaction = 'http://example.com';
        $text = 'text';

        $button = new Button();
        $this->assertNull($button->getFormaction());
        $this->assertFalse($button->hasFormaction());

        $button = new Button($formaction, $text);
        $this->assertSame($formaction, $button->getFormaction());
        $this->assertTrue($button->hasFormaction());
    }

    /**
     * Testing of the "formaction" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::setFormaction
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::hasFormaction
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::getFormaction
     *
     * @return void
     */
    public function testFormaction(): void
    {
        $button = new Button();
        $this->assertNull($button->getFormaction());
        $this->assertFalse($button->hasFormaction());

        $button = new Button();
        $button->setFormaction('formaction');
        $this->assertSame('formaction', $button->getFormaction());
        $this->assertTrue($button->hasFormaction());

        $button = new Button();
        $button->setFormaction('');
        $this->assertNull($button->getFormaction());
        $this->assertFalse($button->hasFormaction());

        $button = new Button();
        $button->setFormaction(null);
        $this->assertNull($button->getFormaction());
        $this->assertFalse($button->hasFormaction());
    }

    /**
     * Testing of the "text" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::setText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::hasText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::getText
     *
     * @return void
     */
    public function testText(): void
    {
        $button = new Button();
        $this->assertNull($button->getText());
        $this->assertFalse($button->hasText());

        $button = new Button();
        $button->setText('text');
        $this->assertSame('text', $button->getText());
        $this->assertTrue($button->hasText());

        $button = new Button();
        $button->setText('');
        $this->assertNull($button->getText());
        $this->assertFalse($button->hasText());

        $button = new Button();
        $button->setText(null);
        $this->assertNull($button->getText());
        $this->assertFalse($button->hasText());
    }

    /**
     * Testing of the "background" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::setBackground
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::hasBackground
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::getBackground
     *
     * @return void
     */
    public function testBackground(): void
    {
        $button = new Button();
        $this->assertNull($button->getBackground());
        $this->assertFalse($button->hasBackground());

        $button = new Button();
        $button->setBackground('background');
        $this->assertSame('background', $button->getBackground());
        $this->assertTrue($button->hasBackground());

        $button = new Button();
        $button->setBackground('');
        $this->assertNull($button->getBackground());
        $this->assertFalse($button->hasBackground());

        $button = new Button();
        $button->setBackground(null);
        $this->assertNull($button->getBackground());
        $this->assertFalse($button->hasBackground());
    }

    /**
     * Testing of the "color" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::setColor
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::hasColor
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::getColor
     *
     * @return void
     */
    public function testColor(): void
    {
        $button = new Button();
        $this->assertNull($button->getColor());
        $this->assertFalse($button->hasColor());

        $button = new Button();
        $button->setColor('color');
        $this->assertSame('color', $button->getColor());
        $this->assertTrue($button->hasColor());

        $button = new Button();
        $button->setColor('');
        $this->assertNull($button->getColor());
        $this->assertFalse($button->hasColor());

        $button = new Button();
        $button->setColor(null);
        $this->assertNull($button->getColor());
        $this->assertFalse($button->hasColor());
    }

    /**
     * Testing of the "turbo" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::setTurbo
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::isTurbo
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::getTurbo
     *
     * @return void
     */
    public function testTurbo(): void
    {
        $button = new Button();
        $this->assertTrue($button->isTurbo());
        $this->assertSame('true', $button->getTurbo());

        $button = new Button();
        $button->setTurbo(true);
        $this->assertSame('true', $button->getTurbo());
        $this->assertTrue($button->isTurbo());

        $button = new Button();
        $button->setTurbo(false);
        $this->assertSame('false', $button->getTurbo());
        $this->assertFalse($button->isTurbo());
    }

    /**
     * Testing of the "primary" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::setPrimary
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::isPrimary
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::getPrimary
     *
     * @return void
     */
    public function testPrimary(): void
    {
        $button = new Button();
        $this->assertFalse($button->isPrimary());
        $this->assertSame('false', $button->getPrimary());

        $button = new Button();
        $button->setPrimary(true);
        $this->assertSame('true', $button->getPrimary());
        $this->assertTrue($button->isPrimary());

        $button = new Button();
        $button->setPrimary(false);
        $this->assertSame('false', $button->getPrimary());
        $this->assertFalse($button->isPrimary());
    }

    /**
     * Testing of the "disabled" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::setDisabled
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::isDisabled
     *
     * @return void
     */
    public function testDisabled(): void
    {
        $button = new Button();
        $this->assertFalse($button->isDisabled());

        $button = new Button();
        $button->setDisabled(true);
        $this->assertTrue($button->isDisabled());

        $button = new Button();
        $button->setDisabled(false);
        $this->assertFalse($button->isDisabled());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $button = new Button();
        $this->assertFalse($button->isValid());

        $button = new Button();
        $button->setFormaction('formaction');
        $button->setText('text');
        $this->assertTrue($button->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $formaction = 'http://example.com';
        $text = 'text';

        $button = Button::create($formaction, $text);
        $this->assertInstanceOf(Button::class, $button);
        $this->assertSame($formaction, $button->getFormaction());
        $this->assertTrue($button->hasFormaction());
        $this->assertSame($text, $button->getText());
        $this->assertTrue($button->hasText());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $formaction = 'http://example.com';
        $text = 'text';
        $background = '#ffffff';
        $color = '#000000';
        $turbo = (bool) rand(0, 1);
        $primary = (bool) rand(0, 1);
        $disabled = (bool) rand(0, 1);

        $button = new Button();

        $button = $button->formaction($formaction);
        $this->assertInstanceOf(Button::class, $button);
        $this->assertSame($formaction, $button->getFormaction());

        $button = $button->text($text);
        $this->assertInstanceOf(Button::class, $button);
        $this->assertSame($text, $button->getText());

        $button = $button->background($background);
        $this->assertInstanceOf(Button::class, $button);
        $this->assertSame($background, $button->getBackground());

        $button = $button->color($color);
        $this->assertInstanceOf(Button::class, $button);
        $this->assertSame($color, $button->getColor());

        $button = $button->turbo($turbo);
        $this->assertInstanceOf(Button::class, $button);
        $this->assertSame($turbo, $button->isTurbo());

        $button = $button->primary($primary);
        $this->assertInstanceOf(Button::class, $button);
        $this->assertSame($primary, $button->isPrimary());

        $button = $button->disabled($disabled);
        $this->assertInstanceOf(Button::class, $button);
        $this->assertSame($disabled, $button->isDisabled());
    }
}

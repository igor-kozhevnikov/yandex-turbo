<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Html;

use Mireon\YandexTurbo\Converter\StripNotAllowedTags;
use Mireon\YandexTurbo\Converter\WrapP;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Html" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Html
 */
class HtmlTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $html = new Html();
        $this->assertFalse($html->hasHtml());
        $this->assertNull($html->getHtml());
        $this->assertFalse($html->hasConverters());
        $this->assertNull($html->getConverters());

        $html = new Html('html');
        $this->assertTrue($html->hasHtml());
        $this->assertSame('html', $html->getHtml());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $html = Html::create();
        $this->assertFalse($html->hasHtml());
        $this->assertNull($html->getHtml());
        $this->assertFalse($html->hasConverters());
        $this->assertNull($html->getConverters());

        $html = Html::create('html');
        $this->assertTrue($html->hasHtml());
        $this->assertSame('html', $html->getHtml());
    }

    /**
     * Testing of the "html" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html::setHtml
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html::hasHtml
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html::getHtml
     *
     * @return void
     */
    public function testHtml(): void {
        $html = new Html();
        $html->setHtml('html');
        $this->assertTrue($html->hasHtml());
        $this->assertSame('html', $html->getHtml());

        $html->setConverters([WrapP::class]);
        $this->assertSame('<p>html</p>', $html->getHtml());
    }

    /**
     * Testing of the "converters" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html::setConverters
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html::hasConverters
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html::getConverters
     *
     * @return void
     */
    public function testConverters(): void {
        $html = new Html();
        $html->setHtml('html');
        $html->setConverters([ WrapP::class ]);
        $this->assertTrue($html->hasConverters());
        $this->assertSame(1, count($html->getConverters()));
        $this->assertSame('<p>html</p>', $html->getHtml());
    }

    /**
     * Testing of the "converters" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html::isValid
     *
     * @return void
     */
    public function testIsValid(): void {
        $html = new Html();
        $this->assertFalse($html->isValid());

        $html = new Html('html');
        $this->assertTrue($html->isValid());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $html = new Html();

        // Html.
        $html = $html->html('html');
        $this->assertInstanceOf(Html::class, $html);
        $this->assertTrue($html->hasHtml());
        $this->assertSame('html', $html->getHtml());

        // Converters.
        $html = $html->converters([StripNotAllowedTags::class ]);
        $this->assertInstanceOf(Html::class, $html);
        $this->assertTrue($html->hasConverters());
        $this->assertSame(1, count($html->getConverters()));
    }
}

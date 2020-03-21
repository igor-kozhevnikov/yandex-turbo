<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Fold;

use Mireon\YandexTurbo\Converter\ConverterInterface;
use Mireon\YandexTurbo\Converter\WrapP;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold\Fold;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Fold" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Fold
 */
class FoldTest extends TestCase
{
    /**
     * The content.
     *
     * @var string|null;
     */
    private $content;

    /**
     * The array of converters.
     *
     * @var ConverterInterface[]|null $converters
     */
    private $converters;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->content = 'content';
        $this->converters = [WrapP::class];
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold\Fold::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $fold = new Fold();
        $this->assertNull($fold->getContent());
        $this->assertFalse($fold->hasContent());
        $this->assertEmpty($fold->getConverters());
        $this->assertFalse($fold->hasConverters());

        $fold = new Fold($this->content);
        $this->assertSame($this->content, $fold->getContent());
        $this->assertTrue($fold->hasContent());

        $fold = new Fold($this->content);
        $this->assertSame($this->content, $fold->getContent());
        $this->assertTrue($fold->hasContent());
    }

    /**
     * Testing of the "content" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold\Fold::setContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold\Fold::hasContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold\Fold::getContent
     *
     * @return void
     */
    public function testContent(): void
    {
        $fold = new Fold();
        $fold->setContent($this->content);
        $this->assertSame($this->content, $fold->getContent());
        $this->assertTrue($fold->hasContent());

        $fold = new Fold();
        $fold->setContent('');
        $this->assertNull($fold->getContent());
        $this->assertFalse($fold->hasContent());

        $fold = new Fold();
        $fold->setContent(null);
        $this->assertNull($fold->getContent());
        $this->assertFalse($fold->hasContent());

        $fold = new Fold();
        $fold->setContent($this->content);
        $fold->setConverters($this->converters);
        $this->assertSame("<p>$this->content</p>", $fold->getContent());
    }

    /**
     * Testing of the "converters" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold\Fold::setConverters
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold\Fold::hasConverters
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold\Fold::getConverters
     *
     * @return void
     */
    public function testConverters(): void
    {
        $fold = new Fold();
        $fold->setContent($this->content);
        $fold->setConverters($this->converters);
        $this->assertEquals($this->converters, $fold->getConverters());
        $this->assertTrue($fold->hasConverters());

        $fold = new Fold();
        $fold->setConverters([]);
        $this->assertNull($fold->getConverters());
        $this->assertFalse($fold->hasConverters());

        $fold = new Fold();
        $fold->setConverters(null);
        $this->assertNull($fold->getConverters());
        $this->assertFalse($fold->hasConverters());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold\Fold::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $fold = new Fold();
        $this->assertFalse($fold->isValid());

        $fold = new Fold();
        $fold->setContent($this->content);
        $this->assertTrue($fold->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold\Fold::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $fold = Fold::create();
        $this->assertInstanceOf(Fold::class, $fold);
        $this->assertNull($fold->getContent());

        $fold = Fold::create($this->content);
        $this->assertSame($this->content, $fold->getContent());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $fold = (new Fold())->content($this->content);
        $this->assertInstanceOf(Fold::class, $fold);
        $this->assertSame($this->content, $fold->getContent());

        $fold = (new Fold())->converters($this->converters);
        $this->assertInstanceOf(Fold::class, $fold);
        $this->assertEquals($this->converters, $fold->getConverters());
    }
}

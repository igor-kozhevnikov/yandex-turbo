<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content;

use ArrayIterator;
use Exception;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Content;
use PHPUnit\Framework\TestCase;

/**
 * Testing item content.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content
 */
class ContentTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Content::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $content = new Content();
        $this->assertFalse($content->isNotEmpty());
        $this->assertFalse($content->isNotEmpty());
        $this->assertSame(0, count($content->getBlocks()));

        $content = new Content([ new Html() ]);
        $this->assertTrue($content->isNotEmpty());
        $this->assertTrue($content->isNotEmpty());
        $this->assertSame(1, count($content->getBlocks()));
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Content::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $content = Content::create();
        $this->assertFalse($content->isNotEmpty());
        $this->assertSame(0, count($content->getBlocks()));

        $content = Content::create([ new Html() ]);
        $this->assertTrue($content->isNotEmpty());
        $this->assertSame(1, count($content->getBlocks()));
    }

    /**
     * Testing of the "blocks" property.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Content::setBlocks
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Content::isNotEmpty
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Content::getBlocks
     *
     * @return void
     */
    public function testSet(): void
    {
        $content = new Content();
        $this->assertFalse($content->isNotEmpty());
        $this->assertSame(0, count($content->getBlocks()));

        $content = new Content();
        $content->setBlocks([ new Html() ]);
        $this->assertTrue($content->isNotEmpty());
        $this->assertSame(1, count($content->getBlocks()));

        $content->setBlocks([ new Html() ]);
        $this->assertTrue($content->isNotEmpty());
        $this->assertSame(1, count($content->getBlocks()));
    }

    /**
     * Testing of the "addBlock" and "addRaw" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Content::addBlock
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Content::addHtml
     *
     * @return void
     */
    public function testAdd(): void
    {
        $content = new Content();
        $this->assertFalse($content->isNotEmpty());
        $this->assertSame(0, count($content->getBlocks()));

        $content = new Content();
        $content->addBlock(new Html());
        $this->assertTrue($content->isNotEmpty());
        $this->assertSame(1, count($content->getBlocks()));

        $content->addBlock(new Html());
        $this->assertTrue($content->isNotEmpty());
        $this->assertSame(2, count($content->getBlocks()));

        $content->addHtml('text');
        $this->assertTrue($content->isNotEmpty());
        $this->assertSame(3, count($content->getBlocks()));
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $content = new Content();
        $this->assertFalse($content->isNotEmpty());
        $this->assertSame(0, count($content->getBlocks()));

        $content = $content->blocks([new Html()]);
        $this->assertInstanceOf(Content::class, $content);
        $this->assertTrue($content->isNotEmpty());
        $this->assertSame(1, count($content->getBlocks()));

        $content = $content->block(new Html());
        $this->assertInstanceOf(Content::class, $content);
        $this->assertTrue($content->isNotEmpty());
        $this->assertSame(2, count($content->getBlocks()));

        $content = $content->html('text');
        $this->assertInstanceOf(Content::class, $content);
        $this->assertTrue($content->isNotEmpty());
        $this->assertSame(3, count($content->getBlocks()));
    }

    /**
     * Testing of the "reset" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Content::reset
     *
     * @return void
     */
    public function testReset(): void
    {
        $content = new Content();
        $content->setBlocks([ new Html() ]);
        $this->assertTrue($content->isNotEmpty());
        $this->assertSame(1, count($content->getBlocks()));

        $content->reset();
        $this->assertFalse($content->isNotEmpty());
        $this->assertSame(0, count($content->getBlocks()));
    }

    /**
     * Testing of the "getIterator" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Content::getIterator
     *
     * @throws Exception
     *
     * @return void
     */
    public function testGetIterator(): void
    {
        $content = new Content();
        $this->assertIsIterable($content);
        $this->assertInstanceOf(ArrayIterator::class, $content->getIterator());
    }
}

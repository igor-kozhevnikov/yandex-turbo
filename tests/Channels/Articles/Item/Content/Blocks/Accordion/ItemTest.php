<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Accordion;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item;
use PHPUnit\Framework\TestCase;

/**
 * Testing of a item of the "Accordion" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Accordion
 */
class ItemTest extends TestCase
{
    /**
     * Testing the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $item = new Item('title', 'content');
        $this->assertSame('title', $item->getTitle());
        $this->assertSame('content', $item->getContent());
        $this->assertFalse($item->isExpanded());
    }

    /**
     * Testing the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $item = Item::create('title', 'content');
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame('title', $item->getTitle());
        $this->assertSame('content', $item->getContent());
    }

    /**
     * Testing the "title" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::setTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::hasTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::getTitle
     *
     * @return void
     */
    public function testTitle(): void
    {
        $item = new Item();
        $this->assertNull($item->getTitle());
        $this->assertFalse($item->hasTitle());

        $item->setTitle('title');
        $this->assertSame('title', $item->getTitle());
        $this->assertTrue($item->hasTitle());
    }

    /**
     * Testing the "content" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::setContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::hasContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::getContent
     *
     * @return void
     */
    public function testContent(): void
    {
        $item = new Item();
        $this->assertNull($item->getContent());
        $this->assertFalse($item->hasContent());

        $item->setContent('content');
        $this->assertSame('content', $item->getContent());
        $this->assertTrue($item->hasContent());
    }

    /**
     * Testing the "expanded" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::setExpanded
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::isExpanded
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::getExpanded
     *
     * @return void
     */
    public function testExpanded(): void
    {
        $item = new Item();
        $this->assertSame('false', $item->getExpanded());
        $this->assertFalse($item->isExpanded());

        $item->setExpanded(true);
        $this->assertSame('true', $item->getExpanded());
        $this->assertTrue($item->isExpanded());

        $item->setExpanded(false);
        $this->assertSame('false', $item->getExpanded());
        $this->assertFalse($item->isExpanded());
    }

    /**
     * Testing the fluent variable.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $item = new Item();

        $item = $item->title('title');
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame('title', $item->getTitle());

        $item = $item->content('content');
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame('content', $item->getContent());

        $item = $item->expanded(true);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame('true', $item->getExpanded());
    }

    /**
     * Testing the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $item = new Item();
        $this->assertFalse($item->isValid());

        $item->setTitle('title');
        $item->setContent('content');
        $this->assertTrue($item->isValid());
    }
}

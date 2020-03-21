<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Feedback;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Feedback;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Feedback" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Feedback
 */
class FeedbackTest extends TestCase
{
    /**
     * The title.
     *
     * @var string|null
     */
    private $title;

    /**
     * The alignment of a block.
     *
     * @var string|null
     */
    private $stick;

    /**
     * The list of items.
     *
     * @var array|null
     */
    private $items;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->title = 'title';
        $this->stick = Feedback::STICK_RIGHT;
        $this->items = [new Item()];
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Feedback::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $feedback = new Feedback();
        $this->assertEmpty($feedback->getItems());
        $this->assertFalse($feedback->hasItems());
        $this->assertNull($feedback->getTitle());
        $this->assertFalse($feedback->hasTitle());
        $this->assertSame(Feedback::STICK_FALSE, $feedback->getStick());
        $this->assertTrue($feedback->hasStick());

        $feedback = new Feedback($this->items);
        $this->assertNotEmpty($feedback->getItems());
        $this->assertTrue($feedback->hasItems());
    }

    /**
     * Testing of the "title" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Feedback::setTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Feedback::hasTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Feedback::getTitle
     *
     * @return void
     */
    public function testTitle(): void
    {
        $feedback = new Feedback();
        $feedback->setTitle($this->title);
        $this->assertSame($this->title, $feedback->getTitle());
        $this->assertTrue($feedback->hasTitle());

        $feedback = new Feedback();
        $feedback->setTitle('');
        $this->assertNull($feedback->getTitle());
        $this->assertFalse($feedback->hasTitle());

        $feedback = new Feedback();
        $feedback->setTitle(null);
        $this->assertNull($feedback->getTitle());
        $this->assertFalse($feedback->hasTitle());
    }

    /**
     * Testing of the "stick" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Feedback::setStick
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Feedback::hasStick
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Feedback::getStick
     *
     * @return void
     */
    public function testStick(): void
    {
        $feedback = new Feedback();
        $feedback->setStick($this->stick);
        $this->assertSame($this->stick, $feedback->getStick());
        $this->assertTrue($feedback->hasStick());

        $feedback = new Feedback();
        $feedback->setStick('');
        $this->assertSame(Feedback::STICK_FALSE, $feedback->getStick());
        $this->assertTrue($feedback->hasStick());

        $feedback = new Feedback();
        $feedback->setStick(null);
        $this->assertSame(Feedback::STICK_FALSE, $feedback->getStick());
        $this->assertTrue($feedback->hasStick());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Feedback::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $feedback = Feedback::create();
        $this->assertInstanceOf(Feedback::class, $feedback);
        $this->assertEmpty($feedback->getItems());

        $feedback = Feedback::create($this->items);
        $this->assertNotEmpty($feedback->getItems());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $feedback = (new Feedback())->title($this->title);
        $this->assertInstanceOf(Feedback::class, $feedback);
        $this->assertSame($this->title, $feedback->getTitle());

        $feedback = (new Feedback())->stick($this->stick);
        $this->assertInstanceOf(Feedback::class, $feedback);
        $this->assertSame($this->stick, $feedback->getStick());
    }
}

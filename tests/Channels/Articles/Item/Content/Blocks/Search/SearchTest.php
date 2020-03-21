<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Search;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Search" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Search
 */
class SearchTest extends TestCase
{
    /**
     * The form action.
     *
     * @var string
     */
    private $action = 'https://example.com/search?query={text}';

    /**
     * The query param name.
     *
     * @var string
     */
    private $name = 'query';

    /**
     * The search input placeholder.
     *
     * @var string
     */
    private $placeholder = 'placeholder';

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $search = new Search();
        $this->assertNull($search->getAction());
        $this->assertFalse($search->hasAction());
        $this->assertNull($search->getName());
        $this->assertFalse($search->hasName());
        $this->assertNull($search->getPlaceholder());
        $this->assertFalse($search->hasPlaceholder());

        $search = new Search($this->action, $this->name);
        $this->assertSame($this->action, $search->getAction());
        $this->assertTrue($search->hasAction());
        $this->assertSame($this->name, $search->getName());
        $this->assertTrue($search->hasName());
    }

    /**
     * Testing of the "action" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::setAction
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::hasAction
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::getAction
     *
     * @return void
     */
    public function testAction(): void
    {
        $search = new Search();
        $search->setAction($this->action);
        $this->assertSame($this->action, $search->getAction());
        $this->assertTrue($search->hasAction());

        $search = new Search();
        $search->setAction('');
        $this->assertNull($search->getAction());
        $this->assertFalse($search->hasAction());

        $search = new Search();
        $search->setAction(null);
        $this->assertNull($search->getAction());
        $this->assertFalse($search->hasAction());

        $search = new Search();
        $search->setAction('action');
        $this->assertNull($search->getAction());
        $this->assertFalse($search->hasAction());
    }

    /**
     * Testing of the "name" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::setName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::hasName
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::getName
     *
     * @return void
     */
    public function testName(): void
    {
        $search = new Search();
        $search->setName($this->name);
        $this->assertSame($this->name, $search->getName());
        $this->assertTrue($search->hasName());

        $search = new Search();
        $search->setName('');
        $this->assertNull($search->getName());
        $this->assertFalse($search->hasName());

        $search = new Search();
        $search->setName(null);
        $this->assertNull($search->getName());
        $this->assertFalse($search->hasName());
    }

    /**
     * Testing of the "placeholder" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::setPlaceholder
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::hasPlaceholder
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::getPlaceholder
     *
     * @return void
     */
    public function testPlaceholder(): void
    {
        $search = new Search();
        $search->setPlaceholder($this->placeholder);
        $this->assertSame($this->placeholder, $search->getPlaceholder());
        $this->assertTrue($search->hasPlaceholder());

        $search = new Search();
        $search->setPlaceholder('');
        $this->assertNull($search->getPlaceholder());
        $this->assertFalse($search->hasPlaceholder());

        $search = new Search();
        $search->setPlaceholder(null);
        $this->assertNull($search->getPlaceholder());
        $this->assertFalse($search->hasPlaceholder());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $search = new Search();
        $this->assertFalse($search->isValid());

        $search = new Search();
        $search->setAction($this->action);
        $search->setName($this->name);
        $this->assertTrue($search->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $search = Search::create();
        $this->assertInstanceOf(Search::class, $search);
        $this->assertNull($search->getAction());
        $this->assertNull($search->getName());

        $search = Search::create($this->action, $this->name, $this->placeholder);
        $this->assertInstanceOf(Search::class, $search);
        $this->assertSame($this->action, $search->getAction());
        $this->assertSame($this->name, $search->getName());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $search = (new Search())->action($this->action);
        $this->assertInstanceOf(Search::class, $search);
        $this->assertSame($this->action, $search->getAction());

        $search = (new Search())->name($this->name);
        $this->assertInstanceOf(Search::class, $search);
        $this->assertSame($this->name, $search->getName());

        $search = (new Search())->placeholder($this->placeholder);
        $this->assertInstanceOf(Search::class, $search);
        $this->assertSame($this->placeholder, $search->getPlaceholder());
    }
}

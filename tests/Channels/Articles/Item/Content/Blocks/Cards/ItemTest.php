<?php


namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Cards;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item;
use PHPUnit\Framework\TestCase;

/**
 * Testing of an item of the "Cards" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Cards
 */
class ItemTests extends TestCase
{
    /**
     * The header image URL.
     *
     * @var string|null
     */
    private $headerImage;

    /**
     * The header title.
     *
     * @var string|null
     */
    private $headerTitle;

    /**
     * The content.
     *
     * @var string|null
     */
    private $content;

    /**
     * The footer text.
     *
     * @var string|null
     */
    private $footerText;

    /**
     * The footer link URL.
     *
     * @var string|null
     */
    private $footerUrl;

    /**
     * The more link text.
     *
     * @var string|null
     */
    private $moreText;

    /**
     * The more link URL.
     *
     * @var string|null
     */
    private $moreUrl;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->headerImage = 'http://example.com';
        $this->headerTitle = 'title';
        $this->content = 'content';
        $this->footerUrl = 'http://example.com';
        $this->footerText = 'footer';
        $this->moreUrl = 'http://example.com';
        $this->moreText = 'more';
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $item = new Item();
        $this->assertNull($item->getHeaderImage());
        $this->assertFalse($item->hasHeaderImage());
        $this->assertNull($item->getHeaderTitle());
        $this->assertFalse($item->hasHeaderTitle());
        $this->assertNull($item->getContent());
        $this->assertFalse($item->hasContent());
        $this->assertNull($item->getFooterUrl());
        $this->assertFalse($item->hasFooterUrl());
        $this->assertNull($item->getFooterText());
        $this->assertFalse($item->hasFooterText());
        $this->assertNull($item->getMoreUrl());
        $this->assertFalse($item->hasMoreUrl());
        $this->assertNull($item->getMoreText());
        $this->assertFalse($item->hasMoreText());

        $item = new Item($this->content);
        $this->assertSame($this->content, $item->getContent());
        $this->assertTrue($item->hasContent());
    }

    /**
     * Testing of the "headerImage" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::setHeaderImage
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::hasHeaderImage
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::getHeaderImage
     *
     * @return void
     */
    public function testHeaderImage(): void
    {
        $item = new Item();
        $item->setHeaderImage($this->headerImage);
        $this->assertSame($this->headerImage, $item->getHeaderImage());
        $this->assertTrue($item->hasHeaderImage());

        $item = new Item();
        $item->setHeaderImage('');
        $this->assertNull($item->getHeaderImage());
        $this->assertFalse($item->hasHeaderImage());

        $item = new Item();
        $item->setHeaderImage(null);
        $this->assertNull($item->getHeaderImage());
        $this->assertFalse($item->hasHeaderImage());

        $item = new Item();
        $item->setHeaderImage('image');
        $this->assertNull($item->getHeaderImage());
        $this->assertFalse($item->hasHeaderImage());
    }

    /**
     * Testing of the "headerImage" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::setHeaderTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::hasHeaderTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::getHeaderTitle
     *
     * @return void
     */
    public function testHeaderTitle(): void
    {
        $item = new Item();
        $item->setHeaderTitle($this->headerTitle);
        $this->assertSame($this->headerTitle, $item->getHeaderTitle());
        $this->assertTrue($item->hasHeaderTitle());

        $item = new Item();
        $item->setHeaderTitle('');
        $this->assertNull($item->getHeaderTitle());
        $this->assertFalse($item->hasHeaderTitle());

        $item = new Item();
        $item->setHeaderTitle(null);
        $this->assertNull($item->getHeaderTitle());
        $this->assertFalse($item->hasHeaderTitle());
    }

    /**
     * Testing of the "header" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::hasHeader
     *
     * @return void
     */
    public function testHeader(): void
    {
        $item = new Item();
        $this->assertFalse($item->hasHeader());

        $item->setHeaderImage($this->headerImage);
        $item->setHeaderTitle($this->headerTitle);
        $this->assertTrue($item->hasHeader());
    }

    /**
     * Testing of the "content" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::setContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::hasContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::getContent
     *
     * @return void
     */
    public function testContent(): void
    {
        $item = new Item();
        $item->setContent($this->content);
        $this->assertSame($this->content, $item->getContent());
        $this->assertTrue($item->hasContent());

        $item = new Item();
        $item->setContent('');
        $this->assertNull($item->getContent());
        $this->assertFalse($item->hasContent());

        $item = new Item();
        $item->setContent(null);
        $this->assertNull($item->getContent());
        $this->assertFalse($item->hasContent());
    }

    /**
     * Testing of the "footerUrl" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::setFooterUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::hasFooterUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::getFooterUrl
     *
     * @return void
     */
    public function testFooterUrl(): void
    {
        $item = new Item();
        $item->setFooterUrl($this->footerUrl);
        $this->assertSame($this->footerUrl, $item->getFooterUrl());
        $this->assertTrue($item->hasFooterUrl());

        $item = new Item();
        $item->setFooterUrl('');
        $this->assertNull($item->getFooterUrl());
        $this->assertFalse($item->hasFooterUrl());

        $item = new Item();
        $item->setFooterUrl(null);
        $this->assertNull($item->getFooterUrl());
        $this->assertFalse($item->hasFooterUrl());

        $item = new Item();
        $item->setFooterUrl('url');
        $this->assertNull($item->getFooterUrl());
        $this->assertFalse($item->hasFooterUrl());
    }

    /**
     * Testing of the "footerText" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::setFooterText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::hasFooterText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::getFooterText
     *
     * @return void
     */
    public function testFooterText(): void
    {
        $item = new Item();
        $item->setFooterText($this->footerText);
        $this->assertSame($this->footerText, $item->getFooterText());
        $this->assertTrue($item->hasFooterText());

        $item = new Item();
        $item->setFooterText('');
        $this->assertNull($item->getFooterText());
        $this->assertFalse($item->hasFooterText());

        $item = new Item();
        $item->setFooterText(null);
        $this->assertNull($item->getFooterText());
        $this->assertFalse($item->hasFooterText());
    }

    /**
     * Testing of the "setFooter" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::setFooter
     *
     * @return void
     */
    public function testFooter(): void
    {
        $item = new Item();
        $item->setFooter($this->footerText, $this->footerUrl);
        $this->assertSame($this->footerText, $item->getFooterText());
        $this->assertSame($this->footerUrl, $item->getFooterUrl());
    }

    /**
     * Testing of the "isValidFooter" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::isValidFooter
     *
     * @return void
     */
    public function testIsValidFooter(): void
    {
        $item = new Item();
        $this->assertFalse($item->isValidFooter());

        $item = new Item();
        $item->setFooterText($this->footerText);
        $item->setFooterUrl($this->footerUrl);
        $this->assertTrue($item->isValidFooter());

        $item = new Item();
        $item->setFooterText(null);
        $item->setFooterUrl($this->footerUrl);
        $this->assertFalse($item->isValidFooter());

        $item = new Item();
        $item->setFooterText($this->footerText);
        $item->setFooterUrl(null);
        $this->assertFalse($item->isValidFooter());
    }

    /**
     * Testing of the "moreUrl" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::setMoreUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::hasMoreUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::getMoreUrl
     *
     * @return void
     */
    public function testMoreUrl(): void
    {
        $item = new Item();
        $item->setMoreUrl($this->moreUrl);
        $this->assertSame($this->moreUrl, $item->getMoreUrl());
        $this->assertTrue($item->hasMoreUrl());

        $item = new Item();
        $item->setMoreUrl('');
        $this->assertNull($item->getMoreUrl());
        $this->assertFalse($item->hasMoreUrl());

        $item = new Item();
        $item->setMoreUrl(null);
        $this->assertNull($item->getMoreUrl());
        $this->assertFalse($item->hasMoreUrl());

        $item = new Item();
        $item->setMoreUrl('url');
        $this->assertNull($item->getMoreUrl());
        $this->assertFalse($item->hasMoreUrl());
    }

    /**
     * Testing of the "moreText" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::setMoreText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::hasMoreText
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::getMoreText
     *
     * @return void
     */
    public function testMoreText(): void
    {
        $item = new Item();
        $item->setMoreText($this->moreText);
        $this->assertSame($this->moreText, $item->getMoreText());
        $this->assertTrue($item->hasMoreText());

        $item = new Item();
        $item->setMoreText('');
        $this->assertNull($item->getMoreText());
        $this->assertFalse($item->hasMoreText());

        $item = new Item();
        $item->setMoreText(null);
        $this->assertNull($item->getMoreText());
        $this->assertFalse($item->hasMoreText());
    }

    /**
     * Testing of the "setMore" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::setMore
     *
     * @return void
     */
    public function testMore(): void
    {
        $item = new Item();
        $item->setMore($this->moreText, $this->moreUrl);
        $this->assertSame($this->moreText, $item->getMoreText());
        $this->assertSame($this->moreUrl, $item->getMoreUrl());
    }

    /**
     * Testing of the "isValidMore" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::isValidMore
     *
     * @return void
     */
    public function testIsValidMore(): void
    {
        $item = new Item();
        $this->assertFalse($item->isValidMore());

        $item = new Item();
        $item->setMoreText($this->moreText);
        $item->setMoreUrl($this->moreUrl);
        $this->assertTrue($item->isValidMore());

        $item = new Item();
        $item->setMoreText(null);
        $item->setMoreUrl($this->moreUrl);
        $this->assertFalse($item->isValidMore());

        $item = new Item();
        $item->setMoreText($this->moreText);
        $item->setMoreUrl(null);
        $this->assertFalse($item->isValidMore());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $item = new Item();
        $this->assertFalse($item->isValid());

        $item = new Item();
        $item->setContent($this->content);
        $this->assertTrue($item->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $item = Item::create($this->content);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->content, $item->getContent());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $item = (new Item())->headerImage($this->headerImage);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->headerImage, $item->getHeaderImage());

        $item = (new Item())->headerTitle($this->headerTitle);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->headerTitle, $item->getHeaderTitle());

        $item = (new Item())->content($this->content);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->content, $item->getContent());

        $item = (new Item())->footerUrl($this->footerUrl);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->footerUrl, $item->getFooterUrl());

        $item = (new Item())->footerText($this->footerText);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->footerText, $item->getFooterText());

        $item = (new Item())->footer($this->footerText, $this->footerUrl);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->footerText, $item->getFooterText());
        $this->assertSame($this->footerUrl, $item->getFooterUrl());

        $item = (new Item())->moreUrl($this->moreUrl);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->moreUrl, $item->getMoreUrl());

        $item = (new Item())->moreText($this->moreText);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->moreText, $item->getMoreText());

        $item = (new Item())->more($this->moreText, $this->moreUrl);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->moreText, $item->getMoreText());
        $this->assertSame($this->moreUrl, $item->getMoreUrl());
    }
}

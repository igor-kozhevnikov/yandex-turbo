<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item;

use DateTime;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Content;
use Mireon\YandexTurbo\Channels\Articles\Item\Item;
use Mireon\YandexTurbo\Channels\Articles\Item\Items;
use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Metrics;
use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the item.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item
 */
class ItemTest extends TestCase
{
    /**
     * Testing of the "turbo" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::setTurbo
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::getTurbo
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::isTurbo
     *
     * @return void
     */
    public function testTurbo(): void
    {
        $item = new Item();
        $this->assertTrue($item->isTurbo());

        // Positive value.
        $item->setTurbo(true);
        $this->assertTrue($item->isTurbo());
        $this->assertSame('true', $item->getTurbo());

        // Negative value.
        $item->setTurbo(false);
        $this->assertFalse($item->isTurbo());
        $this->assertSame('false', $item->getTurbo());
    }

    /**
     * Testing of the "link" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::setLink
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::hasLink
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::getLink
     *
     * @return void
     */
    public function testLink(): void
    {
        $item = new Item();
        $this->assertFalse($item->hasLink());

        // Nullable URL.
        $item->setLink(null);
        $this->assertNull($item->getLink());
        $this->assertFalse($item->hasLink());

        // Invalid URL
        $item->setLink('example.com');
        $this->assertNull($item->getLink());
        $this->assertFalse($item->hasLink());

        // Valid URL that contains more than 243 characters.
        $item->setLink(str_pad('http://example.com/', 244, '.'));
        $this->assertNull($item->getLink());
        $this->assertFalse($item->hasLink());

        // Valid URL.
        $item->setLink('http://example.com');
        $this->assertSame('http://example.com', $item->getLink());
        $this->assertTrue($item->hasLink());
    }

    /**
     * Testing of the "source" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::setSource
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::hasSource
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::getSource
     *
     * @return void
     */
    public function testSource(): void
    {
        $item = new Item();
        $this->assertFalse($item->hasSource());

        // Nullable URL.
        $item->setSource(null);
        $this->assertNull($item->getSource());
        $this->assertFalse($item->hasSource());

        // Invalid URL
        $item->setSource('example.com');
        $this->assertNull($item->getSource());
        $this->assertFalse($item->hasSource());

        // Valid URL.
        $item->setSource('http://example.com');
        $this->assertSame('http://example.com', $item->getSource());
        $this->assertTrue($item->hasSource());
    }

    /**
     * Testing of the "topic" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::setTopic
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::hasTopic
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::getTopic
     *
     * @return void
     */
    public function testTopic(): void
    {
        $item = new Item();
        $this->assertFalse($item->hasTopic());

        // Nullable URL.
        $item->setTopic(null);
        $this->assertNull($item->getTopic());
        $this->assertFalse($item->hasTopic());

        // Empty URL.
        $item->setTopic('');
        $this->assertNull($item->getTopic());
        $this->assertFalse($item->hasTopic());

        // With tags.
        $item->setTopic('<h1>topic</h1>');
        $this->assertSame('topic', $item->getTopic());
        $this->assertTrue($item->hasTopic());

        // With whitespaces.
        $item->setTopic(' topic ');
        $this->assertSame('topic', $item->getTopic());
        $this->assertTrue($item->hasTopic());

        // With special characters.
        $item->setTopic('& " \' > < ');
        $this->assertSame('&amp; &quot; &#039; &gt; &lt;', $item->getTopic());
        $this->assertTrue($item->hasTopic());
    }

    /**
     * Testing of the "pubDate" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::setPubDate
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::hasPubDate
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::getPubDate
     *
     * @return void
     */
    public function testPubDate(): void
    {
        $date = date_format(date_create('01.01.2020'), DateTime::RFC2822);

        $item = new Item();
        $this->assertFalse($item->hasPubDate());

        // Nullable date.
        $item->setPubDate(null);
        $this->assertNull($item->getPubDate());
        $this->assertFalse($item->hasPubDate());

        // Empty date.
        $item->setPubDate('');
        $this->assertNull($item->getPubDate());
        $this->assertFalse($item->hasPubDate());

        // Whitespace date.
        $item->setPubDate(' ');
        $this->assertNull($item->getPubDate());
        $this->assertFalse($item->hasPubDate());

        // With date.
        $item->setPubDate("<h1>$date</h1>");
        $this->assertSame($date, $item->getPubDate());
        $this->assertTrue($item->hasPubDate());

        // With whitespaces.
        $item->setPubDate(" $date ");
        $this->assertSame($date, $item->getPubDate());
        $this->assertTrue($item->hasPubDate());
    }

    /**
     * Testing of the "author" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::setAuthor
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::hasAuthor
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::getAuthor
     *
     * @return void
     */
    public function testAuthor(): void
    {
        $item = new Item();
        $this->assertFalse($item->hasAuthor());

        // Nullable URL.
        $item->setAuthor(null);
        $this->assertNull($item->getAuthor());
        $this->assertFalse($item->hasAuthor());

        // Empty URL.
        $item->setAuthor('');
        $this->assertNull($item->getAuthor());
        $this->assertFalse($item->hasAuthor());

        // Whitespace date.
        $item->setAuthor(' ');
        $this->assertNull($item->getAuthor());
        $this->assertFalse($item->hasAuthor());

        // With tags.
        $item->setAuthor('<h1>author</h1>');
        $this->assertSame('author', $item->getAuthor());
        $this->assertTrue($item->hasAuthor());

        // With whitespaces.
        $item->setAuthor(' author ');
        $this->assertSame('author', $item->getAuthor());
        $this->assertTrue($item->hasAuthor());

        // With special characters.
        $item->setAuthor('& " \' > < ');
        $this->assertSame('&amp; &quot; &#039; &gt; &lt;', $item->getAuthor());
        $this->assertTrue($item->hasAuthor());

        // Author name that contains more than 240 characters.
        $item->setAuthor(str_pad('author', 241, '.'));
        $this->assertSame(str_pad('author', 240, '.'), $item->getAuthor());
        $this->assertTrue($item->hasAuthor());
    }

    /**
     * Testing of the "metrics" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::setMetrics
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::getMetrics
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::hasMetrics
     *
     * @return void
     */
    public function testMetrics(): void
    {
        $item = new Item();
        $this->assertNull($item->getMetrics());
        $this->assertFalse($item->hasMetrics());

        $item = new Item();
        $item->setMetrics(null);
        $this->assertNull($item->getMetrics());
        $this->assertFalse($item->hasMetrics());

        $item = new Item();
        $item->setMetrics(new Metrics([new Yandex()]));
        $this->assertInstanceOf(Metrics::class, $item->getMetrics());
        $this->assertTrue($item->hasMetrics());
    }

    /**
     * Testing of the "relatedLinks" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::setRelatedLinks
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::hasRelatedLinks
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::getRelatedLinks
     *
     * @return void
     */
    public function testRelatedLinks(): void
    {
        $item = new Item();
        $this->assertNull($item->getRelatedLinks());
        $this->assertFalse($item->hasRelatedLinks());

        // Nullable.
        $item = new Item();
        $item->setRelatedLinks(null);
        $this->assertNull($item->getRelatedLinks());
        $this->assertFalse($item->hasRelatedLinks());

        // Instance class.
        $item = new Item();
        $item->setRelatedLinks(new RelatedLinks([new Link()]));
        $this->assertInstanceOf(RelatedLinks::class, $item->getRelatedLinks());
        $this->assertTrue($item->hasRelatedLinks());
    }

    /**
     * Testing of the "content" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::setContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::hasContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::getContent
     *
     * @return void
     */
    public function testContent(): void
    {
        $item = new Item();
        $this->assertFalse($item->hasContent());

        $item = new Item();
        $item->setContent(null);
        $this->assertNull($item->getContent());
        $this->assertFalse($item->hasContent());

        $item = new Item();
        $item->setContent(new Content());
        $this->assertInstanceOf(Content::class, $item->getContent());
        $this->assertTrue($item->hasContent());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $item = new Item();
        $this->assertFalse($item->isValid());

        $item = new Item();
        $item->setLink('http://example.com');
        $item->setContent(new Content());
        $this->assertTrue($item->isValid());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $turbo = (bool) rand(0, 1);
        $link = 'http://example.com';
        $source = 'http://example.com';
        $topic = 'topic';
        $pubDate = date(DateTime::RFC2822);
        $author = 'author';
        $metrics = new Metrics();
        $relatedLinks = new RelatedLinks();
        $content = new Content();

        $item = new Item();

        // A turbo.
        $item = $item->turbo($turbo);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($turbo, $item->isTurbo());

        // A link.
        $item = $item->link($link);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($link, $item->getLink());

        // A source.
        $item = $item->source($source);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($source, $item->getSource());

        // A topic.
        $item = $item->topic($topic);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($topic, $item->getTopic());

        // A publication date.
        $item = $item->pubDate($pubDate);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($pubDate, $item->getPubDate());

        // An author.
        $item = $item->author($author);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($author, $item->getAuthor());

        // Metrics.
        $item = $item->metrics($metrics);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertInstanceOf(Metrics::class, $item->getMetrics());

        // Related links.
        $item = $item->relatedLinks($relatedLinks);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertInstanceOf(RelatedLinks::class, $item->getRelatedLinks());

        // An content.
        $item = $item->content($content);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertInstanceOf(Content::class, $item->getContent());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $link = 'http://example.com';
        $content = new Content();

        $item = Item::create($link, $content);

        $clone = new Item();
        $clone->setLink($link);
        $clone->setContent($content);

        $this->assertSame($clone->getLink(), $item->getLink());
        $this->assertEquals($clone->getContent(), $item->getContent());
    }

    /**
     * Testing of the "reset" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::reset
     *
     * @return void
     */
    public function testReset(): void
    {
        $item = new Item();
        $item->setTurbo(false);
        $item->setLink('http://example.com');
        $item->setSource('http://example.com');
        $item->setTopic('sentence');
        $item->setPubDate(date(DateTime::RFC822));
        $item->setAuthor('author');
        $item->setMetrics(new Metrics());
        $item->setRelatedLinks(new RelatedLinks());
        $item->setContent(new Content());

        $this->assertFalse($item->isTurbo());
        $this->assertNotNull($item->getLink());
        $this->assertNotNull($item->getSource());
        $this->assertNotNull($item->getTopic());
        $this->assertNotNull($item->getPubDate());
        $this->assertNotNull($item->getAuthor());
        $this->assertNotNull($item->getMetrics());
        $this->assertNotNull($item->getRelatedLinks());
        $this->assertNotNull($item->getContent());

        $item->reset();
        $this->assertTrue($item->isTurbo());
        $this->assertNull($item->getLink());
        $this->assertNull($item->getSource());
        $this->assertNull($item->getTopic());
        $this->assertNull($item->getPubDate());
        $this->assertNull($item->getAuthor());
        $this->assertNull($item->getMetrics());
        $this->assertNull($item->getRelatedLinks());
        $this->assertNull($item->getContent());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Item::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $items = new Items();
        $this->assertFalse($items->isNotEmpty());
        $this->assertEquals([], $items->getItems());

        $item = new Item();
        $item->appendTo($items);

        $this->assertTrue($items->isNotEmpty());
        $this->assertSame(1, count($items->getItems()));
    }
}

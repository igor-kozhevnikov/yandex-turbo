<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles;

use Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox;
use Mireon\YandexTurbo\Channels\Articles\Ad\Ads;
use Mireon\YandexTurbo\Channels\Articles\Ad\AdsInterface;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics;
use Mireon\YandexTurbo\Channels\Articles\Analytic\AnalyticsInterface;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Custom\Custom;
use Mireon\YandexTurbo\Channels\Articles\Articles;
use Mireon\YandexTurbo\Channels\Articles\Item\Items;
use Mireon\YandexTurbo\Channels\Articles\Item\Item;
use Mireon\YandexTurbo\Channels\Articles\Item\ItemsInterface;
use PHPUnit\Framework\TestCase;

/**
 * Testing of a channel.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles
 */
class ArticlesTest extends TestCase
{
    /**
     * The data provider to test a title.
     *
     * @return array
     */
    public function titleProvider(): array
    {
        return [
            'Nullable title' => [
                null, null, false,
            ],
            'Empty title' => [
                '', null, false,
            ],
            'White space title' => [
                ' ', null, false,
            ],
            'Empty title with tags' => [
                '<h1> </h1>', null, false,
            ],
            'Not empty title with tags' => [
                '<h1> title </h1>', 'title', true,
            ],
            'Not empty title' => [
                'title', 'title', true,
            ],
            'Title is longer than 240 characters' => [
                str_pad('', 241, '.'),
                str_pad('', 240, '.'),
                true,
            ],
            'Title with special characters' => [
                '& " \' > < ',
                '&amp; &quot; &#039; &gt; &lt;',
                true,
            ],
        ];
    }

    /**
     * Testing of the title.
     *
     * @param string|null $passed
     *   A passed value of a title.
     * @param string|null $expected
     *   An expected value of a title.
     * @param bool $has
     *   Indicate if is set a title.
     *
     * @dataProvider titleProvider
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::setTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::getTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::hasTitle
     *
     * @return void
     */
    public function testTitle(?string $passed, ?string $expected, bool $has): void
    {
        $articles = new Articles();
        $articles->setTitle($passed);
        $this->assertSame($expected, $articles->getTitle());
        $this->assertSame($has, $articles->hasTitle());
    }

    /**
     * The data provider to test a description.
     *
     * @return array
     */
    public function descriptionProvider(): array
    {
        return [
            'Nullable description' => [
                null, null, false,
            ],
            'Empty description' => [
                '', null, false,
            ],
            'White space description' => [
                ' ', null, false,
            ],
            'Empty description with tags' => [
                '<h2> </h2>', null, false,
            ],
            'Not empty description with tags' => [
                '<h2> description </h2>', 'description', true,
            ],
            'Not empty description' => [
                'description', 'description', true,
            ],
            'Description with special characters' => [
                '& " \' > < ',
                '&amp; &quot; &#039; &gt; &lt;',
                true,
            ],
        ];
    }

    /**
     * Testing of the description.
     *
     * @param string|null $passed
     *   A passed value of a description.
     * @param string|null $expected
     *   An expected value of a description.
     * @param bool $has
     *   Indicate if is set a description.
     *
     * @dataProvider descriptionProvider
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::setDescription
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::getDescription
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::hasDescription
     *
     * @return void
     */
    public function testDescription(?string $passed, ?string $expected, bool $has): void
    {
        $articles = new Articles();
        $articles->setDescription($passed);
        $this->assertSame($expected, $articles->getDescription());
        $this->assertSame($has, $articles->hasDescription());
    }

    /**
     * The data provider to test a link.
     *
     * @return array
     */
    public function linkProvider(): array
    {
        return [
            'Nullable link' => [
                null, null, false,
            ],
            'Empty link' => [
                '', null, false,
            ],
            'White space link' => [
                ' ', null, false,
            ],
            'Not link' => [
                'link', null, false,
            ],
            'Invalid link' => [
                'example.com', null, false,
            ],
            'Valid link' => [
                'http://example.com', 'http://example.com', true,
            ],
            'Valid link is longer than 243 characters' => [
                str_pad('http://example.com/', 244, '.'),
                null,
                false,
            ],
        ];
    }

    /**
     * Testing of the link.
     *
     * @param string|null $passed
     *   A passed value of a link.
     * @param string|null $expected
     *   An expected value of a link.
     * @param bool $has
     *   Indicate if is set a link.
     *
     * @dataProvider linkProvider
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::setLink
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::getLink
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::hasLink
     *
     * @return void
     */
    public function testLink(?string $passed, ?string $expected, bool $has): void
    {
        $articles = new Articles();
        $articles->setLink($passed);
        $this->assertSame($expected, $articles->getLink());
        $this->assertSame($has, $articles->hasLink());
    }

    /**
     * The data provider to test a language.
     *
     * @return array
     */
    public function languageProvider(): array
    {
        return [
            'Nullable language' => [
                null, null, false,
            ],
            'Empty language' => [
                '', null, false,
            ],
            'White space language' => [
                ' ', null, false,
            ],
            'Valid language' => [
                'en', 'en', true,
            ],
            'Language with special characters' => [
                '& " \' > < ',
                '&amp; &quot; &#039; &gt; &lt;',
                true,
            ],
        ];
    }

    /**
     * Testing of the language.
     *
     * @param string|null $passed
     *   A passed value of a language.
     * @param string|null $expected
     *   An expected value of a language.
     * @param bool $has
     *   Indicate if is set a language.
     *
     * @dataProvider languageProvider
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::setLanguage
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::getLanguage
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::hasLanguage
     *
     * @return void
     */
    public function testLanguage(?string $passed, ?string $expected, bool $has): void
    {
        $articles = new Articles();
        $articles->setLanguage($passed);
        $this->assertSame($expected, $articles->getLanguage());
        $this->assertSame($has, $articles->hasLanguage());
    }

    /**
     * The data provider to test a constructor.
     *
     * @return array
     */
    public function constructorProvider(): array
    {
        return [
            'Empty constructor' => [

            ],
            'Fully null constructor' => [
                null, null, null, null,
            ],
            'Fully filled constructor' => [
                'title', 'desc', 'http://example.com', 'en',
            ],
        ];
    }

    /**
     * Testing of the "analytics" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::setAnalytics
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::addAnalytic
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::hasAnalytics
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::getAnalytics
     *
     * @return void
     */
    public function testAnalytics(): void
    {
        $articles = new Articles();
        $articles->setAnalytics(new Analytics([new Custom()]));
        $this->assertTrue($articles->hasAnalytics());

        $articles = new Articles();
        $articles->setAnalytics(null);
        $this->assertFalse($articles->hasAnalytics());

        $articles = new Articles();
        $articles->addAnalytic(new Custom());
        $this->assertTrue($articles->hasAnalytics());
    }

    /**
     * Testing of the "ads" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::setAds
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::addAd
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::hasAds
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::getAds
     *
     * @return void
     */
    public function testAds(): void
    {
        $articles = new Articles();
        $articles->setAds(new Ads([new AdFox()]));
        $this->assertTrue($articles->hasAds());

        $articles = new Articles();
        $articles->setAds(null);
        $this->assertFalse($articles->hasAds());

        $articles = new Articles();
        $articles->addAd(new AdFox());
        $this->assertTrue($articles->hasAds());
    }

    /**
     * Testing of the "items" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::setItems
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::addItem
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::hasItems
     * @covers \Mireon\YandexTurbo\Channels\Articles\Articles::getItems
     *
     * @return void
     */
    public function testItems(): void
    {
        $articles = new Articles();
        $articles->setItems(new Items([new Item()]));
        $this->assertTrue($articles->hasItems());

        $articles = new Articles();
        $articles->setItems(null);
        $this->assertFalse($articles->hasItems());

        $articles = new Articles();
        $articles->addItem(new Item());
        $this->assertTrue($articles->hasItems());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $articles = Articles::create();
        $this->assertInstanceOf(Articles::class, $articles);

        $articles = (new Articles())->title('title');
        $this->assertSame('title', $articles->getTitle());
        $this->assertTrue($articles->hasTitle());

        $articles = (new Articles())->description('description');
        $this->assertSame('description', $articles->getDescription());
        $this->assertTrue($articles->hasDescription());

        $articles = (new Articles())->link('http://example.com');
        $this->assertSame('http://example.com', $articles->getLink());
        $this->assertTrue($articles->hasLink());

        $articles = (new Articles())->language('en');
        $this->assertSame('en', $articles->getLanguage());
        $this->assertTrue($articles->hasLanguage());

        $articles = (new Articles())->ads(new Ads([new AdFox()]));
        $this->assertInstanceOf(Articles::class, $articles);
        $this->assertInstanceOf(AdsInterface::class, $articles->getAds());
        $this->assertTrue($articles->hasAds());

        $articles = (new Articles())->ad(new AdFox());
        $this->assertInstanceOf(Articles::class, $articles);
        $this->assertInstanceOf(AdsInterface::class, $articles->getAds());
        $this->assertTrue($articles->hasAds());

        $articles = (new Articles())->analytics(new Analytics([new Custom()]));
        $this->assertInstanceOf(Articles::class, $articles);
        $this->assertInstanceOf(AnalyticsInterface::class, $articles->getAnalytics());
        $this->assertTrue($articles->hasAnalytics());

        $articles = (new Articles())->analytic(new Custom());
        $this->assertInstanceOf(Articles::class, $articles);
        $this->assertInstanceOf(AnalyticsInterface::class, $articles->getAnalytics());
        $this->assertTrue($articles->hasAnalytics());

        $articles = (new Articles())->items(new Items([new Item()]));
        $this->assertInstanceOf(Articles::class, $articles);
        $this->assertInstanceOf(ItemsInterface::class, $articles->getItems());
        $this->assertTrue($articles->hasItems());

        $articles = (new Articles())->item(new Item());
        $this->assertInstanceOf(Articles::class, $articles);
        $this->assertInstanceOf(ItemsInterface::class, $articles->getItems());
        $this->assertTrue($articles->hasItems());
    }
}

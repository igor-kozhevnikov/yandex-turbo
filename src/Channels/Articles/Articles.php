<?php

namespace Mireon\YandexTurbo\Channels\Articles;

use Mireon\YandexTurbo\Channels\Articles\Ad\AdInterface;
use Mireon\YandexTurbo\Channels\Articles\Ad\Ads;
use Mireon\YandexTurbo\Channels\Articles\Ad\AdsInterface;
use Mireon\YandexTurbo\Channels\Articles\Analytic\AnalyticInterface;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics;
use Mireon\YandexTurbo\Channels\Articles\Analytic\AnalyticsInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\ItemInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Items;
use Mireon\YandexTurbo\Channels\Articles\Item\ItemsInterface;
use Mireon\YandexTurbo\Helpers\Str;
use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The channel of articles.
 *
 * @method self title(?string $title)
 *   Sets a title of a channel.
 * @method self description(?string $description)
 *   Sets a description of a channel.
 * @method self link(?string $link)
 *   Sets a link of a channel.
 * @method self language(?string $language)
 *   Sets a language of a channel.
 * @method self ads(AdsInterface|null $ads)
 *   Sets ads of a channel.
 * @method self ad(AdInterface|null $ad)
 *   Add ad to the list of ads.
 * @method self analytics(AnalyticsInterface|null $analytics)
 *   Sets analytics of a channel.
 * @method self analytic(AnalyticInterface|null $analytic)
 *   Add an analytic.
 * @method self items(ItemsInterface|null $items)
 *   Sets items of a channel.
 * @method self item(ItemInterface $item)
 *   Add an item.
 *
 * @package Mireon\YandexTurbo\Channels\Articles
 */
class Articles implements ArticlesInterface
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The title.
     *
     * @var string|null
     */
    private ?string $title = null;

    /**
     * The description.
     *
     * @var string|null
     */
    private ?string $description = null;

    /**
     * The link to the site.
     *
     * @var string|null
     */
    private ?string $link = null;

    /**
     * The language.
     *
     * @var string|null
     */
    private ?string $language = null;

    /**
     * The ads.
     *
     * @var AdsInterface|null
     */
    private ?AdsInterface $ads = null;

    /**
     * The analytics.
     *
     * @var AnalyticsInterface|null
     */
    private ?AnalyticsInterface $analytics = null;

    /**
     * The items.
     *
     * @var ItemsInterface|null
     */
    private ?ItemsInterface $items = null;

    /**
     * The constructor.
     */
    public function __construct()
    {
        $this->setRenderer(ArticlesRender::class);
    }

    /**
     * Sets a title.
     *
     * @param string|null $title
     *   A title.
     *
     * @return void
     */
    public function setTitle(?string $title): void
    {
        if (!empty($title)) {
            $title = strip_tags($title);
            $title = trim($title);
            $title = Str::limit($title, 237);
            $title = Str::e($title);
        }

        $this->title = $title ?: null;
    }

    /**
     * Indicates if a title is set.
     *
     * @return bool
     */
    public function hasTitle(): bool
    {
        return !is_null($this->title);
    }

    /**
     * Returns a title.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Sets a description.
     *
     * @param string|null $description
     *   A description.
     *
     * @return void
     */
    public function setDescription(?string $description): void
    {
        if (!empty($description)) {
            $description = strip_tags($description);
            $description = trim($description);
            $description = Str::e($description);
        }

        $this->description = $description ?: null;
    }

    /**
     * Indicates if a description is set.
     *
     * @return bool
     */
    public function hasDescription(): bool
    {
        return !is_null($this->description);
    }

    /**
     * Returns a description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets a link.
     *
     * @param string|null $link
     *   A link to the site.
     *
     * @return void
     */
    public function setLink(?string $link): void
    {
        $this->link = filter_var($link, FILTER_VALIDATE_URL) && strlen($link) <= 243 ? $link : null;
    }

    /**
     * Indicates if a link is set.
     *
     * @return bool
     */
    public function hasLink(): bool
    {
        return !is_null($this->link);
    }

    /**
     * Returns a link.
     *
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * Sets a language.
     *
     * @param string|null $language
     *   A language.
     *
     * @return void
     */
    public function setLanguage(?string $language): void
    {
        if (!empty($language)) {
            $language = trim($language);
            $language = Str::e($language);
        }

        $this->language = $language ?: null;
    }

    /**
     * Indicates if a language is set.
     *
     * @return bool
     */
    public function hasLanguage(): bool
    {
        return !is_null($this->language);
    }

    /**
     * Returns a language.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * Sets ads.
     *
     * @param AdsInterface|null $ads
     *   A list of ads.
     *
     * @return void
     */
    public function setAds(?AdsInterface $ads): void
    {
        $this->ads = $ads;
    }

    /**
     * Adds an ad.
     *
     * @param AdInterface|null $ad
     *   An ad.
     *
     * @return void
     */
    public function addAd(?AdInterface $ad): void
    {
        if (is_null($this->ads)) {
            $this->setAds(new Ads());
        }

        $this->ads->addAd($ad);
    }

    /**
     * Indicates if analytics is set.
     *
     * @return bool
     */
    public function hasAds(): bool
    {
        return !is_null($this->ads) && $this->ads->isNotEmpty();
    }

    /**
     * Returns ads.
     *
     * @return AdsInterface|null
     */
    public function getAds(): ?AdsInterface
    {
        return $this->ads;
    }

    /**
     * Sets analytics.
     *
     * @param AnalyticsInterface|null $analytics
     *   A list of analytics.
     *
     * @return void
     */
    public function setAnalytics(?AnalyticsInterface $analytics): void
    {
        $this->analytics = $analytics;
    }

    /**
     * @inheritDoc
     */
    public function addAnalytic(?AnalyticInterface $analytic): void
    {
        if (is_null($this->analytics)) {
            $this->setAnalytics(new Analytics());
        }

        $this->analytics->addAnalytic($analytic);
    }

    /**
     * Indicates if analytics is set.
     *
     * @return bool
     */
    public function hasAnalytics(): bool
    {
        return !is_null($this->analytics) && $this->analytics->isNotEmpty();
    }

    /**
     * Returns analytics.
     *
     * @return AnalyticsInterface|null
     */
    public function getAnalytics(): ?AnalyticsInterface
    {
        return $this->analytics;
    }

    /**
     * Sets items.
     *
     * @param ItemsInterface|null $items
     *   A list of items.
     *
     * @return void
     */
    public function setItems(?ItemsInterface $items): void
    {
        $this->items = $items;
    }

    /**
     * Adds an item.
     *
     * @param ItemInterface|null $item
     *   An item.
     *
     * @return void
     */
    public function addItem(?ItemInterface $item): void
    {
        if (is_null($this->items)) {
            $this->setItems(new Items());
        }

        $this->items->addItem($item);
    }

    /**
     * Indicates if items is set.
     *
     * @return bool
     */
    public function hasItems(): bool
    {
        return !is_null($this->items) && $this->items->isNotEmpty();
    }

    /**
     * Returns items.
     *
     * @return ItemsInterface|null
     */
    public function getItems(): ?ItemsInterface
    {
        return $this->items;
    }
}

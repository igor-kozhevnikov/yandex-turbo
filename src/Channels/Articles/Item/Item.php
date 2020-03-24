<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item;

use DateTime;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\ContentInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\MetricsInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinksInterface;
use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Helpers\Str;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The item of a channel of articles.
 *
 * @method self turbo(bool $turbo)
 *   Sets a turbo status.
 * @method self link(?string $link)
 *   Sets a link URL.
 * @method self source(?string $source)
 *   Sets a source page URL.
 * @method self topic(?string $topic)
 *   Sets a topic.
 * @method self pubDate(?string $date)
 *   Sets a publication date.
 * @method self author(?string $author)
 *   Sets an author name.
 * @method self metrics(MetricsInterface|null $metrics)
 *   Sets metrics.
 * @method self relatedLinks(RelatedLinksInterface|null $links)
 *   Sets related links.
 * @method self content(ContentInterface|null $content)
 *   Sets an content.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item
 */
class Item implements ItemInterface
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The turbo status.
     *
     * @var bool
     */
    private bool $turbo = true;

    /**
     * The link.
     *
     * @var string|null
     */
    private ?string $link = null;

    /**
     * The URL of a source page for the Yandex.Metrica.
     *
     * @var string|null
     */
    private ?string $source = null;

    /**
     * The page title for the Yandex.Metrica.
     *
     * @var string|null
     */
    private ?string $topic = null;

    /**
     * The date of a publication.
     *
     * @var string|null
     */
    private ?string $pubDate = null;

    /**
     * The author.
     *
     * @var string|null
     */
    private ?string $author = null;

    /**
     * The content.
     *
     * @var ContentInterface|null
     */
    private ?ContentInterface $content = null;

    /**
     * The related links.
     *
     * @var RelatedLinksInterface|null
     */
    private ?RelatedLinksInterface $relatedLinks = null;

    /**
     * The metrics.
     *
     * @var MetricsInterface|null $metrics
     */
    private ?MetricsInterface $metrics = null;

    /**
     * The constructor.
     *
     * @param string|null $link
     *   A link.
     * @param ContentInterface|null $content
     *   A content.
     */
    public function __construct(?string $link = null, ?ContentInterface $content = null) {
        $this->setRenderer(ItemRender::class);
        $this->setLink($link);
        $this->setContent($content);
    }

    /**
     * Sets a turbo status.
     *
     * @param bool $turbo
     *   A turbo status.
     *
     * @return void
     */
    public function setTurbo(bool $turbo): void
    {
        $this->turbo = $turbo;
    }

    /**
     * Indicates if a turbo status.
     *
     * @return bool
     */
    public function isTurbo(): bool
    {
        return $this->turbo;
    }

    /**
     * Returns a turbo status.
     *
     * @return string
     */
    public function getTurbo(): string
    {
        return $this->turbo ? 'true' : 'false';
    }

    /**
     * Sets a link.
     *
     * @param string|null $link
     *   A link URL.
     *
     * @return void
     */
    public function setLink(?string $link): void
    {
        $this->link = filter_var($link, FILTER_VALIDATE_URL) && strlen($link) <= 243 ? $link : null;
    }

    /**
     * Indicates if a link is valid.
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
     * Sets a source page URL.
     *
     * @param string|null $source
     *   A source page URL.
     *
     * @return void
     */
    public function setSource(?string $source): void
    {
        $this->source = filter_var($source, FILTER_VALIDATE_URL) ? $source : null;
    }

    /**
     * Indicates if a source is set.
     *
     * @return bool
     */
    public function hasSource(): bool
    {
        return !is_null($this->source);
    }

    /**
     * Returns a source page URL.
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * Sets a topic.
     *
     * @param string|null $topic
     *   A topic.
     *
     * @return void
     */
    public function setTopic(?string $topic): void
    {
        if (!empty($topic)) {
            $topic = strip_tags($topic);
            $topic = trim($topic);
            $topic = Str::e($topic);
        }

        $this->topic = $topic ?: null;
    }

    /**
     * Indicates if a topic is set.
     *
     * @return bool
     */
    public function hasTopic(): bool
    {
        return !is_null($this->topic);
    }

    /**
     * Returns a topic.
     *
     * @return string|null
     */
    public function getTopic(): ?string
    {
        return $this->topic;
    }

    /**
     * Sets a publication date.
     *
     * @param string|null $pubDate
     *   A publication date.
     *
     * @return void
     */
    public function setPubDate(?string $pubDate): void
    {
        if (!empty($pubDate)) {
            $pubDate = strip_tags($pubDate);
            $pubDate = trim($pubDate);
            $pubDate = $pubDate ? date_format(date_create($pubDate), DateTime::RFC2822) : null;
        }

        $this->pubDate = $pubDate ?: null;
    }

    /**
     * Indicates if a publication date is set.
     *
     * @return bool
     */
    public function hasPubDate(): bool
    {
        return !is_null($this->pubDate);
    }

    /**
     * Returns a date.
     *
     * @return string|null
     */
    public function getPubDate(): ?string
    {
        return $this->pubDate;
    }

    /**
     * Sets an author.
     *
     * @param string|null $author
     *   An author name.
     *
     * @return void
     */
    public function setAuthor(?string $author): void
    {
        if (!empty($author)) {
            $author = strip_tags($author);
            $author = trim($author);
            $author = mb_strlen($author) > 240 ? Str::limit($author, 237) : $author;
            $author = Str::e($author);
        }

        $this->author = $author ?: null;
    }

    /**
     * Indicates if a author is set.
     *
     * @return bool
     */
    public function hasAuthor(): bool
    {
        return !is_null($this->author);
    }

    /**
     * Returns an author.
     *
     * @return null|string
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * Sets metrics.
     *
     * @param MetricsInterface|null $metrics
     *   A metrics.
     *
     * @return void
     */
    public function setMetrics(?MetricsInterface $metrics): void
    {
        $this->metrics = $metrics;
    }

    /**
     * Indicates if the metrics is set.
     *
     * @return bool
     */
    public function hasMetrics(): bool
    {
        return !is_null($this->metrics);
    }

    /**
     * Returns the metrics.
     *
     * @return MetricsInterface|null
     */
    public function getMetrics(): ?MetricsInterface
    {
        return $this->metrics;
    }

    /**
     * Sets related links.
     *
     * @param RelatedLinksInterface|null $links
     *   A list of links.
     *
     * @return void
     */
    public function setRelatedLinks(?RelatedLinksInterface $links): void
    {
        $this->relatedLinks = $links;
    }

    /**
     * Indicates if related links is set.
     *
     * @return bool
     */
    public function hasRelatedLinks(): bool
    {
        return !is_null($this->relatedLinks) && $this->relatedLinks->isNotEmpty();
    }

    /**
     * Returns the related items.
     *
     * @return RelatedLinksInterface|null
     */
    public function getRelatedLinks(): ?RelatedLinksInterface
    {
        return $this->relatedLinks;
    }

    /**
     * Sets a content.
     *
     * @param ContentInterface|null $content
     *   A content.
     *
     * @return void
     */
    public function setContent(?ContentInterface $content): void
    {
        $this->content = $content;
    }

    /**
     * Indicates if a content is set.
     *
     * @return bool
     */
    public function hasContent(): bool
    {
        return !is_null($this->content);
    }

    /**
     * Returns the content.
     *
     * @return ContentInterface|null
     */
    public function getContent(): ?ContentInterface
    {
        return $this->content;
    }

    /**
     * Reset all data.
     *
     * @return void
     */
    public function reset(): void
    {
        $this->turbo = true;
        $this->link = null;
        $this->source = null;
        $this->topic = null;
        $this->pubDate = null;
        $this->author = null;
        $this->relatedLinks = null;
        $this->content = null;
        $this->metrics = null;
    }

    /**
     * Indicates if an item is valid.
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->hasLink() && $this->hasContent();
    }

    /**
     * Added an item to the list.
     *
     * @param Items $items
     *   An item list.
     *
     * @return void
     */
    public function appendTo(Items $items): void
    {
        $items->addItem($this);
    }
}

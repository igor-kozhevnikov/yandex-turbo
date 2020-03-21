<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockItemInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The "Cards" block item.
 *
 * @method self content(?string $content)
 *   Sets the content.
 * @method self headerImage(?string $image)
 *   Sets the image URL.
 * @method self headerTitle(?string $title)
 *   Sets the header title.
 * @method self footerText(?string $text)
 *   Sets the footer link text.
 * @method self footerUrl(?string $url)
 *   Sets the footer link URL.
 * @method self footer(?string $text, ?string $url)
 *   Sets the footer.
 * @method self moreText(?string $text)
 *   Sets the more link text.
 * @method self moreUrl(?string $url)
 *   Sets the more link URL.
 * @method self more(?string $text, ?string $url)
 *   Sets the more.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards
 */
class Item extends BlockIterableItem implements BlockItemInterface
{
    use Renderer;

    /**
     * The header image URL.
     *
     * @var string|null
     */
    private ?string $headerImage = null;

    /**
     * The header title.
     *
     * @var string|null
     */
    private ?string $headerTitle = null;

    /**
     * The content.
     *
     * @var string|null
     */
    private ?string $content = null;

    /**
     * The footer text.
     *
     * @var string|null
     */
    private ?string $footerText = null;

    /**
     * The footer link URL.
     *
     * @var string|null
     */
    private ?string $footerUrl = null;

    /**
     * The more link text.
     *
     * @var string|null
     */
    private ?string $moreText = null;

    /**
     * The more link URL.
     *
     * @var string|null
     */
    private ?string $moreUrl = null;

    /**
     * The constructor.
     *
     * @param string|null $content
     *   A content.
     */
    public function __construct(?string $content = null) {
        $this->setRenderer(ItemRender::class);
        $this->setContent($content);
    }

    /**
     * Sets a header image URL.
     *
     * @param string|null $image
     *   A image URL.
     *
     * @return void
     */
    public function setHeaderImage(?string $image): void
    {
        $this->headerImage = filter_var($image, FILTER_VALIDATE_URL) ? $image : null;
    }

    /**
     * Indicates if a header image URL is set.
     *
     * @return bool
     */
    public function hasHeaderImage(): bool
    {
        return !is_null($this->headerImage);
    }

    /**
     * Returns a header image URL.
     *
     * @return string|null
     */
    public function getHeaderImage(): ?string
    {
        return $this->headerImage;
    }

    /**
     * Sets a header title.
     *
     * @param string|null $title
     *   A header title.
     *
     * @return void
     */
    public function setHeaderTitle(?string $title): void
    {
        $this->headerTitle = $title ?: null;
    }

    /**
     * Indicates if a header title is set.
     *
     * @return bool
     */
    public function hasHeaderTitle(): bool
    {
        return !is_null($this->headerTitle);
    }

    /**
     * Returns a header title.
     *
     * @return string|null
     */
    public function getHeaderTitle(): ?string
    {
        return $this->headerTitle;
    }

    /**
     * Indicates if a header is set.
     *
     * @return bool
     */
    public function hasHeader(): bool
    {
        return $this->hasHeaderImage() || $this->hasHeaderTitle();
    }

    /**
     * Sets a content.
     *
     * @param string|null $content
     *   A content.
     *
     * @return void
     */
    public function setContent(?string $content): void
    {
        $this->content = $content ?: null;
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
     * Returns a content.
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Sets a footer link URL.
     *
     * @param string|null $url
     *   A footer link URL.
     *
     * @return void
     */
    public function setFooterUrl(?string $url): void
    {
        $this->footerUrl = filter_var($url, FILTER_VALIDATE_URL) ? $url : null;
    }

    /**
     * Indicates if a footer link URL is set.
     *
     * @return bool
     */
    public function hasFooterUrl(): bool
    {
        return !is_null($this->footerUrl);
    }

    /**
     * Returns a footer link URL.
     *
     * @return string|null
     */
    public function getFooterUrl(): ?string
    {
        return $this->footerUrl;
    }

    /**
     * Sets a footer link text.
     *
     * @param string|null $text
     *   A footer link text.
     *
     * @return void
     */
    public function setFooterText(?string $text): void
    {
        $this->footerText = $text ?: null;
    }

    /**
     * Indicates if a footer text is set.
     *
     * @return bool
     */
    public function hasFooterText(): bool
    {
        return !is_null($this->footerText);
    }

    /**
     * Returns a footer text.
     *
     * @return string|null
     */
    public function getFooterText(): ?string
    {
        return $this->footerText;
    }

    /**
     * Sets the footer.
     *
     * @param string|null $text
     *   A footer link text.
     * @param string|null $url
     *   A footer link URL.
     *
     * @return void
     */
    public function setFooter(?string $text, ?string $url): void
    {
        $this->setFooterText($text);
        $this->setFooterUrl($url);
    }

    /**
     * Indicates if a footer is set.
     *
     * @return bool
     */
    public function isValidFooter(): bool
    {
        return $this->hasFooterUrl() && $this->hasFooterText();
    }

    /**
     * Sets a more link URL.
     *
     * @param string|null $url
     *   A more link URL.
     *
     * @return void
     */
    public function setMoreUrl(?string $url): void
    {
        $this->moreUrl = filter_var($url, FILTER_VALIDATE_URL) ? $url : null;
    }

    /**
     * Indicates if a more link URL is set.
     *
     * @return bool
     */
    public function hasMoreUrl(): bool
    {
        return !is_null($this->moreUrl);
    }

    /**
     * Returns a more link URL.
     *
     * @return string|null
     */
    public function getMoreUrl(): ?string
    {
        return $this->moreUrl;
    }

    /**
     * Sets a more text.
     *
     * @param string|null $text
     *   A more link text.
     *
     * @return void
     */
    public function setMoreText(?string $text): void
    {
        $this->moreText = $text ?: null;
    }

    /**
     * Indicates if a more text is set.
     *
     * @return bool
     */
    public function hasMoreText(): bool
    {
        return !is_null($this->moreText);
    }

    /**
     * Returns a more text.
     *
     * @return string|null
     */
    public function getMoreText(): ?string
    {
        return $this->moreText;
    }

    /**
     * Sets the more.
     *
     * @param string|null $text
     *   A more link text.
     * @param string|null $url
     *   A more link URL.
     *
     * @return void
     */
    public function setMore(?string $text, ?string $url): void
    {
        $this->setMoreText($text);
        $this->setMoreUrl($url);
    }

    /**
     * Indicates if a more is set.
     *
     * @return bool
     */
    public function isValidMore(): bool
    {
        return $this->hasMoreUrl() && $this->hasMoreText();
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasContent();
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu;

use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;

/**
 * The menu link.
 *
 * @method self text(?string $text)
 *   Sets a link text.
 * @method self url(?string $url)
 *   Sets a link URL.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu
 */
class Link
{
    use Creator;
    use MagicSetter;

    /**
     * The link text.
     *
     * @var string|null
     */
    private ?string $text = null;

    /**
     * The link URL.
     *
     * @var string|null
     */
    private ?string $url = null;

    /**
     * The constructor.
     *
     * @param string|null $text
     *   A link text.
     * @param string|null $url
     *   A link URL.
     */
    public function __construct(?string $text = null, ?string $url = null)
    {
        $this->setText($text);
        $this->setUrl($url);
    }

    /**
     * Sets a link text.
     *
     * @param string|null $text
     *   A link text.
     *
     * @return void
     */
    public function setText(?string $text): void
    {
        $this->text = $text ?: null;
    }

    /**
     * Returns a link text.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Indicates if a text is set.
     *
     * @return bool
     */
    public function hasText(): bool
    {
        return !is_null($this->text);
    }

    /**
     * Sets a link URL.
     *
     * @param string|null $url
     *   A link URL.
     *
     * @return void
     */
    public function setUrl(?string $url): void
    {
        $this->url = filter_var($url, FILTER_VALIDATE_URL) ? $url : null;
    }

    /**
     * Indicates if a link URL is set.
     *
     * @return bool
     */
    public function hasUrl(): bool
    {
        return !is_null($this->url);
    }

    /**
     * Returns a link URL.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Indicates if link is valid.
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->hasText() && $this->hasUrl();
    }

    /**
     * Added a link to menu.
     *
     * @param Menu $menu
     *   A menu.
     *
     * @return void
     */
    public function appendTo(Menu $menu): void
    {
        $menu->addLink($this);
    }
}

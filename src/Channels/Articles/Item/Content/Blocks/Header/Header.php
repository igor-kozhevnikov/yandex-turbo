<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header;

use Closure;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link as BreadcrumbLink;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Link as MenuLink;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu;

/**
 * The header block.
 *
 * @method self title(?string $title)
 *   Sets a title.
 * @method self subTitle(?string $title)
 *   Sets a sub title.
 * @method self preview(?string $preview)
 *   Sets a URL of the image preview.
 * @method self menu(Menu|null $menu)
 *   Sets a menu.
 * @method self breadcrumbs(Breadcrumbs|null $breadcrumbs)
 *   Sets breadcrumbs.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header
 */
class Header extends Block
{
    /**
     * The title page.
     *
     * @var string|null
     */
    private ?string $title = null;

    /**
     * The subtitle page.
     *
     * @var string|null
     */
    private ?string $subTitle = null;

    /**
     * The image URL for a preview.
     *
     * @var string|null
     */
    private ?string $preview = null;

    /**
     * The menu.
     *
     * @var Menu|null
     */
    private ?Menu $menu = null;

    /**
     * The breadcrumb list.
     *
     * @var Breadcrumbs|null
     */
    private ?Breadcrumbs $breadcrumbs = null;

    /**
     * The constructor.
     *
     * @param string|null $title
     *   A title.
     */
    public function __construct(?string $title = null)
    {
        $this->setRenderer(HeaderRender::class);
        $this->setTitle($title);
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
     * Sets a sub title.
     *
     * @param string|null $subTitle
     *   A sub title.
     *
     * @return void
     */
    public function setSubTitle(?string $subTitle): void
    {
        $this->subTitle = $subTitle ?: null;
    }

    /**
     * Indicates if a sub title is set.
     *
     * @return bool
     */
    public function hasSubTitle(): bool
    {
        return !is_null($this->subTitle);
    }

    /**
     * Returns a sub title.
     *
     * @return string|null
     */
    public function getSubTitle(): ?string
    {
        return $this->subTitle;
    }

    /**
     * Sets a preview.
     *
     * @param string|null $preview
     *   A preview URL.
     *
     * @return void
     */
    public function setPreview(?string $preview): void
    {
        $this->preview = filter_var($preview, FILTER_VALIDATE_URL) ? $preview : null;
    }

    /**
     * Indicates if a preview is set.
     *
     * @return bool
     */
    public function hasPreview(): bool
    {
        return !is_null($this->preview);
    }

    /**
     * Returns a preview.
     *
     * @return string|null
     */
    public function getPreview(): ?string
    {
        return $this->preview;
    }

    /**
     * Sets a menu.
     *
     * @param Menu|null $menu
     *   A menu.
     *
     * @return void
     */
    public function setMenu(?Menu $menu): void
    {
        $this->menu = $menu;
    }

    /**
     * Indicates if a menu is set.
     *
     * @return bool
     */
    public function hasMenu(): bool
    {
        return !is_null($this->menu) && $this->menu->isNotEmpty();
    }

    /**
     * Returns a menu.
     *
     * @return Menu|null
     */
    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    /**
     * Sets breadcrumbs.
     *
     * @param Breadcrumbs|null $breadcrumbs
     *   A breadcrumbs.
     *
     * @return void
     */
    public function setBreadcrumbs(?Breadcrumbs $breadcrumbs): void
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Indicates if a breadcrumbs is set.
     *
     * @return bool
     */
    public function hasBreadcrumbs(): bool
    {
        return !is_null($this->breadcrumbs) && $this->breadcrumbs->isNotEmpty();
    }

    /**
     * Returns breadcrumbs.
     *
     * @return Breadcrumbs|null
     */
    public function getBreadcrumbs(): ?Breadcrumbs
    {
        return $this->breadcrumbs;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasTitle();
    }
}

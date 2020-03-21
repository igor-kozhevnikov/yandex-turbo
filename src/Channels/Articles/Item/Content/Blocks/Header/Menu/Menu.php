<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu;

use ArrayIterator;
use IteratorAggregate;
use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;
use Traversable;

/**
 * The menu.
 *
 * @method self links(Link[]|null $links)
 *   Sets a list of links.
 * @method self link(Link|null $link)
 *   Add a link to the list.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu
 */
class Menu implements IteratorAggregate
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The list of links.
     *
     * @var Link[]
     */
    private array $links = [];

    /**
     * The constructor.
     *
     * @param Link[]|null $links
     *   Menu links.
     */
    public function __construct(?array $links = null)
    {
        $this->setRenderer(MenuRender::class);
        $this->setLinks($links);
    }

    /**
     * Sets links.
     *
     * @param Link[]|null $links
     *   A list links.
     *
     * @return void
     */
    public function setLinks(?array $links): void
    {
        $this->reset();

        if (empty($links)) {
            return;
        }

        foreach ($links as $link) {
            $this->addLink($link);
        }
    }

    /**
     * Adds a link.
     *
     * @param Link|null $link
     *   A link.
     *
     * @return void
     */
    public function addLink(?Link $link): void
    {
        if (!is_null($link)) {
            $this->links[] = $link;
        }
    }

    /**
     * Check if an items is exists.
     *
     * @return bool
     */
    public function isNotEmpty(): bool
    {
        return !empty($this->links);
    }

    /**
     * Returns a list of links.
     *
     * @return array
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * Reset menu links.
     *
     * @return void
     */
    public function reset(): void
    {
        $this->links = [];
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->getLinks());
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs;

use ArrayIterator;
use IteratorAggregate;
use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\Renderer;
use Traversable;

/**
 * The breadcrumbs list.
 *
 * @method self links(Link[]|null $links)
 *   Sets a list of links.
 * @method self link(Link|null $link)
 *   Add a link to the list.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs
 */
class Breadcrumbs implements IteratorAggregate
{
    use Creator;
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
     *   A list of links.
     */
    public function __construct(?array $links = null)
    {
        $this->setRenderer(BreadcrumbsRender::class);
        $this->setLinks($links);
    }

    /**
     * Sets links.
     *
     * @param Link[]|null $links
     *   A list of links.
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
     * Check if an links is exists.
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
     * Reset breadcrumbs links.
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

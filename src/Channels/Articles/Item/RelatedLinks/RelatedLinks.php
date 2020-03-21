<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks;

use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link as ExternalLink;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link as InfinityLink;
use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The related links.
 *
 * @method self links(LinkInterface[]|null $links)
 *   Sets a list of links.
 * @method self link(LinkInterface|null $link)
 *   Add a link.
 * @method self infinity(InfinityLink|null $link)
 *   Add the infinity link.
 * @method self external(ExternalLink|null $link)
 *   Add the external link.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks
 */
class RelatedLinks implements RelatedLinksInterface
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The list of infinities links.
     *
     * @var InfinityLink[]
     */
    private array $infinities = [];

    /**
     * The list of externals links.
     *
     * @var ExternalLink[]
     */
    private array $externals = [];

    /**
     * The constructor.
     *
     * @param LinkInterface[]|null $links
     *   An infinity and external list of links.
     */
    public function __construct(?array $links = null)
    {
        $this->setRenderer(RelatedLinksRender::class);
        $this->setLinks($links);
    }

    /**
     * Sets a list of links.
     *
     * @param LinkInterface[]|null $links
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
     * @param LinkInterface $link
     *   A link.
     *
     * @return void
     */
    public function addLink(LinkInterface $link): void
    {
        if ($link instanceof InfinityLink) {
            $this->addInfinity($link);
        } elseif ($link instanceof ExternalLink) {
            $this->addExternal($link);
        }
    }

    /**
     * Adds an infinity link.
     *
     * @param InfinityLink|null $link
     *   A link.
     *
     * @return void
     */
    public function addInfinity(?InfinityLink $link): void
    {
        if (!is_null($link)) {
            $this->infinities[] = $link;
        }
    }

    /**
     * Check if infinities links is exists.
     *
     * @return bool
     */
    public function hasInfinities(): bool
    {
        return !empty($this->infinities);
    }

    /**
     * Returns infinities links.
     *
     * @return InfinityLink[]
     */
    public function getInfinities(): array
    {
        return $this->infinities;
    }

    /**
     * Reset infinities links.
     *
     * @return void
     */
    public function resetInfinities(): void
    {
        $this->infinities = [];
    }

    /**
     * Adds an external link.
     *
     * @param ExternalLink|null $link
     *   A link.
     *
     * @return void
     */
    public function addExternal(?ExternalLink $link): void
    {
        if (!is_null($link) && count($this->externals) < 30) {
            $this->externals[] = $link;
        }
    }

    /**
     * Check if external links is exists.
     *
     * @return bool
     */
    public function hasExternals(): bool
    {
        return !empty($this->externals);
    }

    /**
     * Returns externals links.
     *
     * @return ExternalLink[]
     */
    public function getExternals(): array
    {
        return $this->externals;
    }

    /**
     * Reset external links.
     *
     * @return void
     */
    public function resetExternals(): void
    {
        $this->externals = [];
    }

    /**
     * Reset all links.
     *
     * @return void
     */
    public function reset(): void
    {
        $this->resetInfinities();
        $this->resetExternals();
    }

    /**
     * Indicates if a related links is set.
     *
     * @return bool
     */
    public function isNotEmpty(): bool
    {
        return $this->hasExternals() || $this->hasInfinities();
    }
}

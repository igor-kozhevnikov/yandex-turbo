<?php

namespace Mireon\YandexTurbo\Channels\Articles\Ad;

use ArrayIterator;
use IteratorAggregate;
use Mireon\YandexTurbo\Channels\Articles\Articles;
use Mireon\YandexTurbo\Traits\Creator;
use Traversable;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The list of ads.
 *
 * @method self ads(AdInterface[]|null $ads)
 *   Sets a list of ads.
 * @method self ad(AdInterface|null $ad)
 *   Add ads.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Ad
 */
class Ads implements AdsInterface, IteratorAggregate
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The list of ads.
     *
     * @var AdInterface[]
     */
    private array $ads = [];

    /**
     * The constructor.
     *
     * @param AdInterface[] $ads
     *   A list of ads.
     */
    public function __construct(array $ads = [])
    {
        $this->setRenderer(AdsRender::class);
        $this->setAds($ads);
    }

    /**
     * @inheritDoc
     */
    public function setAds(?array $ads): void
    {
        if (!empty($this->ads)) {
            $this->ads = [];
        }

        if (empty($ads)) {
            return;
        }

        foreach ($ads as $ad) {
            $this->addAd($ad);
        }
    }

    /**
     * @inheritDoc
     */
    public function addAd(?AdInterface $ad): void
    {
        if (!is_null($ad)) {
            $this->ads[] = $ad;
        }
    }

    /**
     * @inheritDoc
     */
    public function getAds(): array
    {
        return $this->ads;
    }

    /**
     * @inheritDoc
     */
    public function isNotEmpty(): bool
    {
        return !empty($this->ads);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->getAds());
    }

    /**
     * Adds list of ads to the articles channel.
     *
     * @param Articles $articles
     *   The channel of articles.
     *
     * @return void
     */
    public function appendTo(Articles $articles): void
    {
        $articles->setAds($this);
    }
}

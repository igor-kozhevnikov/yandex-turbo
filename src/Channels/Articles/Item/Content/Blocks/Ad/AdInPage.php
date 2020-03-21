<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block;

/**
 * The "AdInPage" ad block.
 *
 * @method self turboAdId(?string $id)
 *   Sets the turbo ad ID.
 * @method self turboInPageAdId(?string $id)
 *   Sets the turbo "AdInPage" ad ID.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/ads-docpage/#inpage
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad
 */
class AdInPage extends Block
{
    /**
     * The turbo ad ID.
     *
     * @var string|null
     */
    private ?string $turboAdId = null;

    /**
     * The turbo "AdInPage" ad ID.
     *
     * @var string|null
     */
    private ?string $turboInPageAdId = null;

    /**
     * The constructor.
     *
     * @param string|null $turboAdId
     *   A turbo ad ID.
     * @param string|null $turboInPageAdId
     *   A turbo "AdInPage" ad ID.
     */
    public function __construct(?string $turboAdId = null, ?string $turboInPageAdId = null)
    {
        $this->setRenderer(AdInPageRender::class);
        $this->setTurboAdId($turboAdId);
        $this->setTurboInPageAdId($turboInPageAdId);
    }

    /**
     * Sets a turbo ad ID.
     *
     * @param string|null $id
     *   A turbo ad ID.
     *
     * @return void
     */
    public function setTurboAdId(?string $id): void
    {
        $this->turboAdId = $id ?: null;
    }

    /**
     * Indicates if a turbo ad ID is set.
     *
     * @return bool
     */
    public function hasTurboAdId(): bool
    {
        return !is_null($this->turboAdId);
    }

    /**
     * Returns a turbo ad ID.
     *
     * @return string|null
     */
    public function getTurboAdId(): ?string
    {
        return $this->turboAdId;
    }

    /**
     * Sets a turbo "AdInPage" ad ID.
     *
     * @param string|null $id
     *   A turbo "AdInPage" ad ID.
     *
     * @return void
     */
    public function setTurboInPageAdId(?string $id): void
    {
        $this->turboInPageAdId = $id ?: null;
    }

    /**
     * Indicates if a turbo in page ad ID is set.
     *
     * @return bool
     */
    public function hasTurboInPageAdId(): bool
    {
        return !is_null($this->turboInPageAdId);
    }

    /**
     * Returns a turbo "AdInPage" ad ID.
     *
     * @return string|null
     */
    public function getTurboInPageAdId(): ?string
    {
        return $this->turboInPageAdId;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasTurboAdId() && $this->hasTurboInPageAdId();
    }
}

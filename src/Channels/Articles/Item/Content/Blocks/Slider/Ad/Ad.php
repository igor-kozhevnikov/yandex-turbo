<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\ItemInterface;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The "Ad" item of the "Slider" block.
 *
 * @method self turboAdId(?string $id)
 *   Sets a turbo ad ID.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad
 */
class Ad extends BlockIterableItem implements ItemInterface
{
    use Renderer;

    /**
     * The turbo ad ID.
     *
     * @var string|null
     */
    private ?string $turboAdId = null;

    /**
     * The constructor.
     *
     * @param string|null $turboAdId
     *   A turbo ad ID.
     */
    public function __construct(?string $turboAdId = null)
    {
        $this->setRenderer(AdRender::class);
        $this->setTurboAdId($turboAdId);
    }

    /**
     * Sets a turbo ad ID.
     *
     * @param string|null $turboAdId
     *   A turbo ad ID.
     *
     * @return void
     */
    public function setTurboAdId(?string $turboAdId): void
    {
        $this->turboAdId = $turboAdId ?: null;
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
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasTurboAdId();
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block;

/**
 * The "AdInContent" ad block.
 *
 * @method self turboAdId(?string $id)
 *   Sets the turbo ad ID.
 * @method self mobile(bool $isMobile)
 *   Sets display to mobile devices.
 * @method self desktop(bool $isDesktop)
 *   Sets display to desktop devices.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/ads-docpage/#in-content
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad
 */
class AdInContent extends Block
{
    /**
     * The turbo ad ID.
     *
     * @var string|null
     */
    private ?string $turboAdId = null;

    /**
     * Enable display on mobile devices.
     *
     * @var bool
     */
    public bool $mobile = true;

    /**
     * Enable display on desktop devices.
     *
     * @var bool
     */
    public bool $desktop = false;

    /**
     * The constructor.
     *
     * @param string|null $turboAdId
     *   A turbo ad ID.
     */
    public function __construct(?string $turboAdId = null)
    {
        $this->setRenderer(AdInContentRender::class);
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
     * Determine whether display is enabled on mobile devices.
     *
     * @param bool $enable
     *   Enable or disable display.
     *
     * @return void
     */
    public function setMobile(bool $enable): void
    {
        $this->mobile = $enable;
    }

    /**
     * Indicates if a mobile state is set.
     *
     * @return bool
     */
    public function isMobile(): bool
    {
        return $this->mobile;
    }

    /**
     * Returns the enable status on mobile devices.
     *
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile ? 'true' : 'false';
    }

    /**
     * Determine whether display is enabled on desktop devices.
     *
     * @param bool $enable
     *   Enable or disable display.
     *
     * @return void
     */
    public function setDesktop(bool $enable): void
    {
        $this->desktop = $enable;
    }

    /**
     * Indicates if a desktop state is set.
     *
     * @return bool
     */
    public function isDesktop(): bool
    {
        return $this->desktop;
    }

    /**
     * Returns the enable status on mobile devices.
     *
     * @return string
     */
    public function getDesktop(): string
    {
        return $this->desktop ? 'true' : 'false';
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasTurboAdId();
    }
}

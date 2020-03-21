<?php

namespace Mireon\YandexTurbo\Channels\Articles\Ad\AdFox;

use Mireon\YandexTurbo\Channels\Articles\Ad\Ad;

/**
 * The "AdFox" ad.
 *
 * @method self content(?string $content)
 *   Sets a content.
 * @method self turboAdId(?string $turboAdId)
 *   Sets a turbo ad ID.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Ad\AdFox
 */
class AdFox extends Ad
{
    /**
     * The turbo ad ID.
     *
     * @var string|null
     */
    private ?string $turboAdId = null;

    /**
     * The content.
     *
     * @var string|null
     */
    private ?string $content = null;

    /**
     * The constructor.
     *
     * @param string|null $turboAdId
     *   A turbo ad ID.
     * @param string|null $content
     *   A content.
     */
    public function __construct(?string $turboAdId = null, ?string $content = null)
    {
        $this->setRenderer(AdFoxRender::class);
        $this->setType('AdFox');
        $this->setTurboAdId($turboAdId);
        $this->setContent($content);
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
     * Returns a content.
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
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
        return $this->hasType() && $this->hasTurboAdId() && $this->hasContent();
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork;

use Mireon\YandexTurbo\Channels\Articles\Ad\Ad;

/**
 * The "Yandex Ad Network" ad.
 *
 * @method self id(?string $id)
 *   Sets an ID.
 * @method self turboAdId(?string $turboAdId)
 *   Sets a turbo ad ID.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork
 */
class YandexAdNetwork extends Ad
{
    /**
     * The ID.
     *
     * @var string|null
     */
    private ?string $id = null;

    /**
     * The turbo ad ID.
     *
     * @var string|null
     */
    private ?string $turboAdId = null;

    /**
     * The constructor.
     *
     * @param string|null $id
     *   An ID.
     * @param string|null $turboAdId
     *   A turbo ad ID.
     */
    public function __construct(?string $id = null, ?string $turboAdId = null)
    {
        $this->setRenderer(YandexAdNetworkRender::class);
        $this->setType('Yandex');
        $this->setId($id);
        $this->setTurboAdId($turboAdId);
    }

    /**
     * Sets an ID.
     *
     * @param string|null $id
     *   An ID.
     *
     * @return void
     */
    public function setId(?string $id): void
    {
        $this->id = $id ?: null;
    }

    /**
     * Indicates if an ID is set.
     *
     * @return bool
     */
    public function hasId(): bool
    {
        return !is_null($this->id);
    }

    /**
     * Returns an ID.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
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
        return $this->hasType() && $this->hasId() && $this->hasTurboAdId();
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Ad;

use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The ad.
 *
 * @method self type(?string $type)
 *   Sets a type.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Ad
 */
abstract class Ad implements AdInterface
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The type.
     *
     * @var string|null
     */
    private ?string $type = null;

    /**
     * Sets a type.
     *
     * @param string|null $type
     *   A type.
     *
     * @return void
     */
    public function setType(?string $type): void
    {
        $this->type = $type ?: null;
    }

    /**
     * Indicates if a type is set.
     *
     * @return bool
     */
    public function hasType(): bool
    {
        return !is_null($this->type);
    }

    /**
     * Returns a type.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Adds an ad.
     *
     * @param AdsInterface $list
     *   A list of ads.
     *
     * @return void
     */
    public function appendTo(AdsInterface $list): void
    {
        $list->addAd($this);
    }
}

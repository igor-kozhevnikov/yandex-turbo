<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic;

use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The analytics.
 *
 * @method self type(?string $type)
 *   Sets a type.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytic
 */
abstract class Analytic implements AnalyticInterface
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The type.
     *
     * @var string|null
     */
    protected ?string $type = null;

    /**
     * Sets a type.
     *
     * @param string|null $type
     *   The type.
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
     * Added an analytics to a list.
     *
     * @param Analytics $analytics
     *   A list of analytics.
     *
     * @return void
     */
    public function appendTo(Analytics $analytics): void
    {
        $analytics->addAnalytic($this);
    }
}

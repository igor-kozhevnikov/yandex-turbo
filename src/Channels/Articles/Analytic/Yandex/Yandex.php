<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex;

use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytic;

/**
 * The "Yandex.Metrica" analytics.
 *
 * @method self id(?string $id)
 *   Sets an ID.
 * @method self params(?string $params)
 *   Sets parameters.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex
 */
class Yandex extends Analytic
{
    /**
     * The ID.
     *
     * @var string|null
     */
    private ?string $id = null;

    /**
     * The params.
     *
     * @var string|null
     */
    private ?string $params = null;

    /**
     * The constructor of the "Yandex.Metrica" analytics.
     *
     * @param string|null $id
     *   An ID.
     * @param string|null $params
     *   Params as a string.
     */
    public function __construct(?string $id = null, ?string $params = null)
    {
        $this->setRenderer(YandexRender::class);
        $this->setType('Yandex');
        $this->setId($id);
        $this->setParams($params);
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
     * Sets params.
     *
     * @param string|null $params
     *   Params as a string.
     *
     * @return void
     */
    public function setParams(?string $params): void
    {
        $this->params = $params ?: null;
    }

    /**
     * Indicates if a params is set.
     *
     * @return bool
     */
    public function hasParams(): bool
    {
        return !is_null($this->params);
    }

    /**
     * Returns params.
     *
     * @return string|null
     */
    public function getParams(): ?string
    {
        return $this->params;
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
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasType() && $this->hasId();
    }
}

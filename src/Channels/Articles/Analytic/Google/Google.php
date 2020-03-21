<?php

namespace Mireon\YandexTurbo\Channels\Articles\Analytic\Google;

use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytic;

/**
 * The "Google" analytics.
 *
 * @method self id(?string $id)
 *   Sets an ID.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Analytic\Google
 */
class Google extends Analytic
{
    /**
     * The ID.
     *
     * @var string|null
     */
    private ?string $id = null;

    /**
     * The constructor.
     *
     * @param string|null $id
     *   An ID.
     */
    public function __construct(?string $id = null)
    {
        $this->setRenderer(GoogleRender::class);
        $this->setType('Google');
        $this->setId($id);
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
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasType() && $this->hasId();
    }
}

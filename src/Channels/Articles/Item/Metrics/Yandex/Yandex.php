<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex;

use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\MetricInterface;
use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The "Yandex" metric.
 *
 * @method self id(?string $id)
 *   Sets the ID.
 * @method self breadcrumbs(Breadcrumb[] $breadcrumbs)
 *   Sets the list of breadcrumbs.
 * @method self breadcrumb(Breadcrumb $breadcrumb)
 *   Adds a breadcrumb.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex
 */
class Yandex implements MetricInterface
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The schema identifier.
     *
     * @var string|null
     */
    private ?string $id = null;

    /**
     * The list of breadcrumbs.
     *
     * @var Breadcrumb[] $breadcrumbs
     */
    private array $breadcrumbs = [];

    /**
     * Yandex constructor.
     *
     * @param string|null $id
     *   A schema identifier.
     * @param array|null $breadcrumbs
     *   A list of breadcrumbs.
     */
    public function __construct(?string $id = null, ?array $breadcrumbs = null)
    {
        $this->setRenderer(YandexRender::class);
        $this->setId($id);
        $this->setBreadcrumbs($breadcrumbs);
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
     * Sets a list of breadcrumbs.
     *
     * @param Breadcrumb[]|null $breadcrumbs
     *   A list of breadcrumbs.
     *
     * @return void
     */
    public function setBreadcrumbs(?array $breadcrumbs): void
    {
        $this->breadcrumbs = [];

        if (empty($breadcrumbs)) {
            return;
        }

        foreach ($breadcrumbs as $breadcrumb) {
            $this->addBreadcrumb($breadcrumb);
        }
    }

    /**
     * Adds a breadcrumb.
     *
     * @param Breadcrumb|null $breadcrumb
     *   A breadcrumb.
     *
     * @return void
     */
    public function addBreadcrumb(?Breadcrumb $breadcrumb): void
    {
        if (!is_null($breadcrumb)) {
            $this->breadcrumbs[] = $breadcrumb;
        }
    }

    /**
     * Returns the list of breadcrumbs.
     *
     * @return Breadcrumb[]
     */
    public function getBreadcrumbs(): array
    {
        return $this->breadcrumbs;
    }

    /**
     * Indicates if a list of breadcrumbs is not empty.
     *
     * @return bool
     */
    public function hasBreadcrumbs(): bool
    {
        return !empty($this->breadcrumbs);
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasId();
    }
}

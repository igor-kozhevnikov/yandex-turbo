<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterable;

/**
 * The "Dynamic form" block.
 *
 * @method self endPoint(?string $endPoint)
 *   Sets the URL for processing form data.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/dynamic-form-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm
 */
class DynamicForm extends BlockIterable
{
    /**
     * The URL for processing form data.
     *
     * @var string|null $endPoint
     */
    private ?string $endPoint = null;

    /**
     * DynamicForm constructor.
     *
     * @param array|null $items
     *   A list of items.
     */
    public function __construct(?array $items = null)
    {
        parent::__construct($items);
        $this->setRenderer(DynamicFormRender::class);
    }

    /**
     * Sets a URL for processing form data.
     *
     * @param string $endPoint
     *   An URL for processing form data.
     *
     * @return void
     */
    public function setEndPoint(?string $endPoint): void
    {
        $this->endPoint = filter_var($endPoint, FILTER_VALIDATE_URL) ? $endPoint : null;
    }

    /**
     * Indicates if a URL for processing form data is set.
     *
     * @return bool
     */
    public function hasEndPoint(): bool
    {
        return !is_null($this->endPoint);
    }

    /**
     * Returns an URL for processing form data.
     *
     * @return string|null
     */
    public function getEndPoint(): ?string
    {
        return $this->endPoint;
    }
}

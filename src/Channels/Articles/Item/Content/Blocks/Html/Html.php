<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html;

use Mireon\YandexTurbo\Converter\ConverterInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block;
use Mireon\YandexTurbo\Converter\Manager;

/**
 * The "Html" block.
 *
 * @method self html(?string $html)
 *   Sets a html data.
 * @method self converters(?array $converters)
 *   Sets a list of converters.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html
 */
class Html extends Block
{
    /**
     * The html data.
     *
     * @var string|null $html
     */
    private ?string $html = null;

    /**
     * The converters.
     *
     * @var ConverterInterface[]|null $converters
     *   An array of converters.
     */
    private ?array $converters = null;

    /**
     * The constructor.
     *
     * @param string|null $html
     *   A html data.
     */
    public function __construct(?string $html = null)
    {
        $this->setRenderer(HtmlRender::class);
        $this->setHtml($html);
    }

    /**
     * Sets a html data.
     *
     * @param string|null $html
     *   A html data.
     *
     * @return void
     */
    public function setHtml(?string $html): void
    {
        $this->html = $html ?: null;
    }

    /**
     * Indicates if a html data is set.
     *
     * @return bool
     */
    public function hasHtml(): bool
    {
        return !is_null($this->html);
    }

    /**
     * Returns a html data.
     *
     * @return string|null
     */
    public function getHtml(): ?string
    {
        if ($this->hasConverters()) {
            return Manager::convert($this->html, $this->getConverters());
        }

        return $this->html;
    }

    /**
     * Sets converters.
     *
     * @param ConverterInterface[]|null $converters
     *   An array of converters.
     *
     * @return void
     */
    public function setConverters(?array $converters): void
    {
        $this->converters = !empty($converters) ? $converters : null;
    }

    /**
     * Indicates if converters is set.
     *
     * @return bool
     */
    public function hasConverters(): bool
    {
        return !is_null($this->converters);
    }

    /**
     * Returns converters.
     *
     * @return ConverterInterface[]|null
     */
    public function getConverters(): ?array
    {
        return $this->converters;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasHtml();
    }
}

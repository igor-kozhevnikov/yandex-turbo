<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold;

use Mireon\YandexTurbo\Converter\ConverterInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block;
use Mireon\YandexTurbo\Converter\Manager;

/**
 * The "Fold" block.
 *
 * @method self content(?string $content)
 *   Sets the content.
 * @method self converters(ConverterInterface[]|null $converters)
 *   Sets converters.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/fold-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold
 */
class Fold extends Block
{
    /**
     * The content.
     *
     * @var string|null;
     */
    private ?string $content = null;

    /**
     * The array of converters.
     *
     * @var ConverterInterface[]|null $converters
     */
    private ?array $converters = null;

    /**
     * The constructor.
     *
     * @param string|null $content
     *   A content.
     */
    public function __construct(?string $content = null)
    {
        $this->setRenderer(FoldRender::class);
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
     * Indicates if a content is set.
     *
     * @return bool
     */
    public function hasContent(): bool
    {
        return !is_null($this->content);
    }

    /**
     * Returns a content.
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        if ($this->hasConverters()) {
            return Manager::convert($this->content, $this->converters);
        }

        return $this->content;
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
        $this->converters = $converters ?: null;
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
        return $this->hasContent();
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content;

use ArrayIterator;
use IteratorAggregate;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html;
use Mireon\YandexTurbo\Converter\ConverterInterface;
use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Traversable;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The item content.
 *
 * @method self blocks(BlockInterface[]|null $blocks)
 *   Sets a list of blocks.
 * @method self block(?BlockInterface $block)
 *   Add a block to the list.
 * @method self html(?string $text, ConverterInterface[] $converters = [])
 *   Add a text.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content
 */
class Content implements ContentInterface, IteratorAggregate
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The block list.
     *
     * @var BlockInterface[]
     */
    private array $blocks = [];

    /**
     * The constructor.
     *
     * @param array|null $blocks
     *   A list of blocks.
     */
    public function __construct(?array $blocks = null)
    {
        $this->setRenderer(ContentRender::class);
        $this->setBlocks($blocks);
    }

    /**
     * Sets a list of blocks.
     *
     * @param BlockInterface[]|null $blocks
     *   A list of blocks.
     *
     * @return void
     */
    public function setBlocks(?array $blocks): void
    {
        $this->reset();

        if (empty($blocks)) {
            return;
        }

        foreach ($blocks as $block) {
            $this->addBlock($block);
        }
    }

    /**
     * Adds a block.
     *
     * @param BlockInterface|null $block
     *   A block.
     *
     * @return void
     */
    public function addBlock(?BlockInterface $block): void
    {
        if (!is_null($block)) {
            $this->blocks[] = $block;
        }
    }

    /**
     * Returns all blocks.
     *
     * @return BlockInterface[]
     */
    public function getBlocks(): array
    {
        return $this->blocks;
    }

    /**
     * Adds a HTML.
     *
     * @param string|null $html
     *   A HTML.
     * @param ConverterInterface[] $converters
     *   An array of converters.
     *
     * @return void
     */
    public function addHtml(?string $html, ?array $converters = null): void
    {
        if (!is_null($html)) {
            $block = new Html($html);
            $block->setConverters($converters);

            $this->blocks[] = $block;
        }
    }

    /**
     * Indicates if blocks is set.
     *
     * @return bool
     */
    public function isNotEmpty(): bool
    {
        return !empty($this->blocks);
    }

    /**
     * Reset a list of blocks.
     *
     * @return void
     */
    public function reset(): void
    {
        $this->blocks = [];
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->blocks);
    }
}

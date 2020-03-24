<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockInterface;
use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The "Audio" block.
 *
 * @method self src(?string $src)
 *  Sets the URL to audio.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/audio-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio
 */
class Audio implements BlockInterface
{
    use Creator;
    use MagicSetter;
    use Renderer;

    /**
     * The URL to audio.
     *
     * @var string|null $src
     */
    private ?string $src = null;

    /**
     * The constructor.
     *
     * @param string|null $src
     *   An URL to audio.
     */
    public function __construct(?string $src = null)
    {
        $this->setRenderer(AudioRender::class);
        $this->setSrc($src);
    }

    /**
     * Sets the URL to audio.
     *
     * @param string|null $src
     *   An URL to audio.
     *
     * @return void
     */
    public function setSrc(?string $src) {
        $this->src = filter_var($src, FILTER_VALIDATE_URL) ? $src : null;
    }

    /**
     * Indicate if the URL to audio is set.
     *
     * @return bool
     */
    public function hasSrc(): bool
    {
        return !is_null($this->src);
    }

    /**
     * Returns the URL to audio.
     *
     * @return string|null
     */
    public function getSrc(): ?string
    {
        return $this->src;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasSrc();
    }
}

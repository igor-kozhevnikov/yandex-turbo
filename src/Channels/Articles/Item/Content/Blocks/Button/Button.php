<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block;

/**
 * The "Button" block.
 *
 * @method self formaction(?string $formaction)
 *   Sets the formaction.
 * @method self text(?string $text)
 *   Sets the text.
 * @method self background(?string $background)
 *   Sets the background color.
 * @method self color(?string $color)
 *   Sets the text color.
 * @method self turbo(bool $isTurbo)
 *   Sets the page version of a turbo.
 * @method self primary(bool $isPrimary)
 *   Sets the text is in bold.
 * @method self disabled(bool $isDisabled)
 *   Sets the button is disabled.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/buttons-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button
 */
class Button extends Block
{
    /**
     * The formaction.
     *
     * Options:
     *   - Phone
     *   - URL
     *
     * @var string|null
     */
    private ?string $formaction = null;

    /**
     * The text.
     *
     * @var string|null
     */
    private ?string $text = null;

    /**
     * The background color.
     *
     * @var string|null
     */
    private ?string $background = null;

    /**
     * The text color.
     *
     * @var string|null
     */
    private ?string $color = null;

    /**
     * Determine the page version to display.
     *
     * @var bool
     */
    private bool $turbo = true;

    /**
     * Determines whether the button is in bold text.
     *
     * @var bool
     */
    private bool $primary = false;

    /**
     * Determines whether the button is disabled.
     *
     * @var bool
     */
    private bool $disabled = false;

    /**
     * The constructor.
     *
     * @param string|null $formaction
     *   A formaction.
     * @param string|null $text
     *   A text.
     */
    public function __construct(?string $formaction = null, ?string $text = null) {
        $this->setRenderer(ButtonRender::class);
        $this->setFormaction($formaction);
        $this->setText($text);
    }

    /**
     * Sets a formaction.
     *
     * @param string|null $formaction
     *   A formaction.
     *
     * @return void
     */
    public function setFormaction(?string $formaction): void
    {
        $this->formaction = $formaction ?: null;
    }

    /**
     * Indicates if a formaction is set.
     *
     * @return bool
     */
    public function hasFormaction(): bool
    {
        return !is_null($this->formaction);
    }

    /**
     * Returns a formaction.
     *
     * @return string|null
     */
    public function getFormaction(): ?string
    {
        return $this->formaction;
    }

    /**
     * Sets a text.
     *
     * @param string|null $text
     *   A text.
     *
     * @return void
     */
    public function setText(?string $text): void
    {
        $this->text = $text ?: null;
    }

    /**
     * Indicates if an text is set.
     *
     * @return bool
     */
    public function hasText(): bool
    {
        return !is_null($this->text);
    }

    /**
     * Returns a text.
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Sets a background color.
     *
     * @param string|null $background
     *   A background color.
     *
     * @return void
     */
    public function setBackground(?string $background): void
    {
        $this->background = $background ?: null;
    }

    /**
     * Sets if a background is set.
     *
     * @return bool
     */
    public function hasBackground(): bool
    {
        return !is_null($this->background);
    }

    /**
     * Returns a background color.
     *
     * @return string|null
     */
    public function getBackground(): ?string
    {
        return $this->background;
    }

    /**
     * Sets a text color.
     *
     * @param string|null $color
     *   A text color.
     *
     * @return void
     */
    public function setColor(?string $color): void
    {
        $this->color = $color ?: null;
    }

    /**
     * Sets if a color is set.
     *
     * @return bool
     */
    public function hasColor(): bool
    {
        return !is_null($this->color);
    }

    /**
     * Returns a text color.
     *
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * Sets a turbo page version.
     *
     * @param bool $turbo
     *   If true, page version is a turbo.
     *
     * @return void
     */
    public function setTurbo(bool $turbo): void
    {
        $this->turbo = $turbo;
    }

    /**
     * Indicates if a turbo is set.
     *
     * @return bool
     */
    public function isTurbo(): bool
    {
        return $this->turbo;
    }

    /**
     * Returns a page version.
     *
     * @return string
     */
    public function getTurbo(): string
    {
        return $this->turbo ? 'true' : 'false';
    }

    /**
     * Determine whether a text is in bold.
     *
     * @param bool $primary
     *   If true, a text is in bold.
     *
     * @return void
     */
    public function setPrimary(bool $primary): void
    {
        $this->primary = $primary;
    }

    /**
     * Indicates if a primary is set.
     *
     * @return bool
     */
    public function isPrimary(): bool
    {
        return $this->primary;
    }

    /**
     * Returns whether a text is in bold.
     *
     * @return string
     */
    public function getPrimary(): string
    {
        return $this->primary ? 'true' : 'false';
    }

    /**
     * Sets whether a button is disabled.
     *
     * @param bool $disabled
     *   If true, a button is disabled.
     *
     * @return void
     */
    public function setDisabled(bool $disabled): void
    {
        $this->disabled = $disabled;
    }

    /**
     * Returns whether a button is disabled.
     *
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasFormaction() && $this->hasText();
    }
}

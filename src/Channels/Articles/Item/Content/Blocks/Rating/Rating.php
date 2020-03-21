<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block;

/**
 * The "Rating" block.
 *
 * @method self value(?int $value)
 *   Sets the value.
 * @method self best(?int $best)
 *   Sets the best value.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/rating-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating
 */
class Rating extends Block
{
    /**
     * The current value rating.
     *
     * @var int
     */
    private int $value = 0;

    /**
     * The best value rating.
     *
     * @var int
     */
    private int $best = 5;

    /**
     * The constructor.
     *
     * @param int|null $value
     *   A value.
     * @param int|null $best
     *   A best value.
     */
    public function __construct(?int $value = null, ?int $best = null)
    {
        $this->setRenderer(RatingRender::class);
        $this->setValue($value);
        $this->setBest($best);
    }

    /**
     * Sets a value.
     *
     * @param int|null $value
     *   A value.
     *
     * @return void
     */
    public function setValue(?int $value): void
    {
        if (!is_null($value) && $value >= 0) {
            $this->value = $value;
        } else {
            $this->value = 0;
        }
    }

    /**
     * Indicates if a value is set.
     *
     * @return bool
     */
    public function hasValue(): bool
    {
        return $this->value >= 0;
    }

    /**
     * Returns a value.
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Sets a best value.
     *
     * @param int|null $best
     *   A best value.
     *
     * @return void
     */
    public function setBest(?int $best): void
    {
        if (!is_null($best) && $best > 0) {
            $this->best = $best;
        } else {
            $this->best = 5;
        }
    }

    /**
     * Indicates if a best is set.
     *
     * @return bool
     */
    public function hasBest(): bool
    {
        return $this->best > 0;
    }

    /**
     * Returns a best value.
     *
     * @return int
     */
    public function getBest(): int
    {
        return $this->best;
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return ($this->hasValue() && $this->hasBest()) && ($this->getValue() <= $this->getBest());
    }
}

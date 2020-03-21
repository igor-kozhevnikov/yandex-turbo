<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Rating;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating\Rating;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Rating" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Rating
 */
class RatingTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating\Rating::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $rating = new Rating();
        $this->assertSame(0, $rating->getValue());
        $this->assertTrue($rating->hasValue());
        $this->assertSame(5, $rating->getBest());
        $this->assertTrue($rating->hasBest());

        $rating = new Rating(10, 100);
        $this->assertSame(10, $rating->getValue());
        $this->assertTrue($rating->hasValue());
        $this->assertSame(100, $rating->getBest());
        $this->assertTrue($rating->hasBest());
    }

    /**
     * Testing of the "value" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating\Rating::setValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating\Rating::hasValue
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating\Rating::getValue
     *
     * @return void
     */
    public function testValue(): void
    {
        $rating = new Rating();
        $rating->setValue(-10);
        $this->assertSame(0, $rating->getValue());
        $this->assertTrue($rating->hasValue());

        $rating = new Rating();
        $rating->setValue(0);
        $this->assertSame(0, $rating->getValue());
        $this->assertTrue($rating->hasValue());

        $rating = new Rating();
        $rating->setValue(1);
        $this->assertSame(1, $rating->getValue());
        $this->assertTrue($rating->hasValue());

        $rating = new Rating();
        $rating->setValue(10);
        $this->assertSame(10, $rating->getValue());
        $this->assertTrue($rating->hasValue());

        $rating = new Rating();
        $rating->setValue(null);
        $this->assertSame(0, $rating->getValue());
        $this->assertTrue($rating->hasValue());
    }

    /**
     * Testing of the "best" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating\Rating::setBest
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating\Rating::hasBest
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating\Rating::getBest
     *
     * @return void
     */
    public function testBest(): void
    {
        $rating = new Rating();
        $rating->setBest(-10);
        $this->assertSame(5, $rating->getBest());
        $this->assertTrue($rating->hasBest());

        $rating = new Rating();
        $rating->setBest(0);
        $this->assertSame(5, $rating->getBest());
        $this->assertTrue($rating->hasBest());

        $rating = new Rating();
        $rating->setBest(1);
        $this->assertSame(1, $rating->getBest());
        $this->assertTrue($rating->hasBest());

        $rating = new Rating();
        $rating->setBest(10);
        $this->assertSame(10, $rating->getBest());
        $this->assertTrue($rating->hasBest());

        $rating = new Rating();
        $rating->setBest(null);
        $this->assertSame(5, $rating->getBest());
        $this->assertTrue($rating->hasBest());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating\Rating::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $rating = new Rating();
        $this->assertTrue($rating->isValid());

        $rating = new Rating();
        $rating->setValue(10);
        $rating->setBest(100);
        $this->assertTrue($rating->isValid());

        $rating = new Rating();
        $rating->setValue(10);
        $rating->setBest(5);
        $this->assertFalse($rating->isValid());

        $rating = new Rating();
        $rating->setValue(-1);
        $rating->setBest(-1);
        $this->assertTrue($rating->isValid());

        $rating = new Rating();
        $rating->setValue(null);
        $rating->setBest(null);
        $this->assertTrue($rating->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating\Rating::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $rating = Rating::create();
        $this->assertInstanceOf(Rating::class, $rating);
        $this->assertSame(0, $rating->getValue());
        $this->assertSame(5, $rating->getBest());

        $rating = Rating::create(10, 100);
        $this->assertInstanceOf(Rating::class, $rating);
        $this->assertSame(10, $rating->getValue());
        $this->assertSame(100, $rating->getBest());
    }

    /**
     * Testing of the fluent interface
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $rating = (new Rating())->value(10);
        $this->assertInstanceOf(Rating::class, $rating);
        $this->assertSame(10, $rating->getValue());

        $rating = (new Rating())->best(100);
        $this->assertInstanceOf(Rating::class, $rating);
        $this->assertSame(100, $rating->getBest());
    }
}

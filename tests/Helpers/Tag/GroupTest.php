<?php

namespace Mireon\YandexTurbo\Helpers\Tag;

use PHPUnit\Framework\TestCase;

/**
 * The test for group of tags.
 *
 * @package Mireon\YandexTurbo\Tests\Helpers\Tag
 */
class GroupTest extends TestCase
{
    /**
     * Render of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Group::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $group = new Group();
        $this->assertNull($group->render());

        $group = new Group([new Tag('a'), new Tag('b')]);
        $this->assertSame('<a></a><b></b>', $group->render());
    }

    /**
     * Render of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Group::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $group = Group::create();
        $this->assertNull($group->render());

        $group = Group::create([new Tag('a'), new Tag('b')]);
        $this->assertSame('<a></a><b></b>', $group->render());
    }

    /**
     * Render of the "tags" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Group::tags
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Group::render
     *
     * @return void
     */
    public function testTags(): void
    {
        $group = new Group();
        $this->assertNull($group->render());

        $group->tags(null);
        $this->assertNull($group->render());

        $group->tags([new Tag('a'), new Tag('b')]);
        $this->assertSame('<a></a><b></b>', $group->render());

        $group->tags([new Tag('c')]);
        $this->assertSame('<c></c>', $group->render());

        $group->tags(null);
        $this->assertNull($group->render());
    }

    /**
     * Render of the "tags" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Group::tag
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Group::render
     *
     * @return void
     */
    public function testTag(): void
    {
        $group = new Group();
        $this->assertNull($group->render());

        $group->tag(null);
        $this->assertNull($group->render());

        $group->tag(new Tag('a'));
        $this->assertSame('<a></a>', $group->render());

        $group->tag(new Tag('b'));
        $this->assertSame('<a></a><b></b>', $group->render());
    }

    /**
     * Render of the "__toString" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Group::__toString
     *
     * @return void
     */
    public function testToString(): void
    {
        $group = new Group();
        $group->tag(new Tag('a'));
        $this->assertSame('<a></a>', (string) $group);
    }
}

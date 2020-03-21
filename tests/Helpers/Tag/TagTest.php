<?php

namespace Mireon\YandexTurbo\Helpers\Tag;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;

/**
 * The test for tag.
 *
 * @package Mireon\YandexTurbo\Tests\Helpers
 */
class TagTest extends TestCase
{
    /**
     * Testing for the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::__construct
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $class = new ReflectionClass(Tag::class);
        $value = $class->getProperty('tag');
        $value->setAccessible(true);

        $tag = new Tag();
        $this->assertNull($value->getValue($tag));

        $tag = new Tag('a');
        $this->assertSame('a', $value->getValue($tag));
    }

    /**
     * Testing for the "tag" variable.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::tag
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testTag(): void
    {
        $class = new ReflectionClass(Tag::class);
        $value = $class->getProperty('tag');
        $value->setAccessible(true);

        $tag = (new Tag())->tag(null);
        $this->assertInstanceOf(Tag::class, $tag);

        $tag = (new Tag())->tag('');
        $this->assertNull($value->getValue($tag));

        $tag = (new Tag())->tag('a');
        $this->assertSame('a', $value->getValue($tag));

        $tag = (new Tag())->tag('A');
        $this->assertSame('a', $value->getValue($tag));
    }

    /**
     * Testing for the "attributes" variable.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::attribute
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testAttributes(): void
    {
        $class = new ReflectionClass(Tag::class);
        $value = $class->getProperty('attributes');
        $value->setAccessible(true);

        $tag = (new Tag())->tag(null)->attribute(null, null);
        $this->assertInstanceOf(Tag::class, $tag);

        $tag = (new Tag())->tag(null)->attribute(null, null);
        $this->assertEquals([], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->attribute('color', null);
        $this->assertEquals([], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->attribute(null, 'red');
        $this->assertEquals([], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->attribute('color', 'red');
        $this->assertEquals(['color' => 'red'], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->attribute('color', 'red', true);
        $this->assertEquals(['color' => 'red'], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->attribute('color', 'red', false);
        $this->assertEquals([], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->attribute('COLOR', 'red');
        $this->assertEquals(['color' => 'red'], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->attribute('COLOR', '& " \' > <');
        $this->assertEquals(['color' => '&amp; &quot; &#039; &gt; &lt;'], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->attribute('color', 'red')->attribute('shape', 'round');
        $this->assertEquals(['color' => 'red', 'shape' => 'round'], $value->getValue($tag));
    }

    /**
     * Testing for the "content" variable.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::content
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testContent(): void
    {
        $class = new ReflectionClass(Tag::class);
        $value = $class->getProperty('content');
        $value->setAccessible(true);

        $tag = (new Tag())->tag(null)->content(null);
        $this->assertInstanceOf(Tag::class, $tag);

        $tag = (new Tag())->tag('a')->content(null);
        $this->assertEquals([], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->content(1);
        $this->assertEquals([1], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->content('string');
        $this->assertEquals(['string'], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->content(true);
        $this->assertEquals([1], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->content(false);
        $this->assertEquals([''], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->content(new class {});
        $this->assertEquals([], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->content(new class {
            public function __toString() { return 'string'; }
        });
        $this->assertEquals(['string'], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->content([]);
        $this->assertEquals([], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->content(['string']);
        $this->assertEquals(['string'], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->content(['string'], fn($string) => strtoupper($string));
        $this->assertEquals(['STRING'], $value->getValue($tag));

        $tag = (new Tag())->tag('a')->content('hello')->content('world');
        $this->assertEquals(['hello', 'world'], $value->getValue($tag));
    }

    /**
     * Testing for the "empty" variable.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::empty
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testEmpty(): void
    {
        $class = new ReflectionClass(Tag::class);
        $value = $class->getProperty('isEmptyTag');
        $value->setAccessible(true);

        $tag = (new Tag())->tag(null);
        $this->assertInstanceOf(Tag::class, $tag);

        $this->assertInstanceOf(Tag::class, new Tag());
        $this->assertFalse($value->getValue($tag));

        $tag = (new Tag())->empty();
        $this->assertTrue($value->getValue($tag));

        $tag = (new Tag())->empty(true);
        $this->assertTrue($value->getValue($tag));

        $tag = (new Tag())->empty(false);
        $this->assertFalse($value->getValue($tag));
    }

    /**
     * Testing for the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $sting = 'string';
        $tag = (new Tag())->tag('a')->appendTo($sting);
        $this->assertInstanceOf(Tag::class, $tag);

        $sting = 'string';
        (new Tag())->tag('a')->appendTo($sting);
        $this->assertSame('string<a></a>', $sting);

        $sting = null;
        (new Tag())->tag('a')->appendTo($sting);
        $this->assertSame('<a></a>', $sting);

        $tag = new Tag('b');
        (new Tag())->tag('a')->appendTo($tag);
        $this->assertSame('<b><a></a></b>', $tag->render());

        $group = new Group();
        (new Tag())->tag('a')->appendTo($group);
        $this->assertSame('<a></a>', $group->render());

        (new Tag())->tag('b')->appendTo($group);
        $this->assertSame('<a></a><b></b>', $group->render());
    }

    /**
     * Testing for the "render" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::render
     *
     * @return void
     */
    public function testRender(): void
    {
        $tag = (new Tag())->tag('a');
        $this->assertSame('<a></a>', $tag->render());

        $tag = (new Tag())->tag('a')->attribute('color', 'red')->attribute('shape', 'round');
        $this->assertSame('<a color="red" shape="round"></a>', $tag->render());

        $tag = (new Tag())->tag('a')
            ->attribute('color', 'red')
            ->attribute('shape', 'round')
            ->content('hello');
        $this->assertSame('<a color="red" shape="round">hello</a>', $tag->render());

        $tag = (new Tag())->tag('a')->attribute('color', 'red')->attribute('shape', 'round')->empty();
        $this->assertSame('<a color="red" shape="round" />', $tag->render());

        $tag = (new Tag())->tag('a')
            ->attribute('color', 'red')
            ->attribute('shape', 'round')
            ->content('hello')
            ->empty();
        $this->assertSame('<a color="red" shape="round" />', $tag->render());

        $tag = (new Tag())->tag('a')
            ->attribute('color', 'red')
            ->attribute('shape', 'round')
            ->content('hello')
            ->content(' ')
            ->content('world');
        $this->assertSame('<a color="red" shape="round">hello world</a>', $tag->render());

        $tag = (new Tag())->tag('a')->content('hello');
        $this->assertSame('<a>hello</a>', $tag->render());

        $tag = (new Tag())->tag('a')->content('hello')->empty();
        $this->assertSame('<a />', $tag->render());
    }

    /**
     * Testing for the "__toString" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::__toString
     *
     * @return void
     */
    public function testToString(): void
    {
        $tag = (new Tag())->tag(null);
        $this->assertSame('', (string) $tag);

        $tag = (new Tag())->tag('a');
        $this->assertSame('<a></a>', (string) $tag);
    }

    /**
     * Testing for the "getOpenTag" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::getOpenTag
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testGetOpenTag(): void
    {
        $class = new ReflectionClass(Tag::class);
        $method = $class->getMethod('getOpenTag');
        $method->setAccessible(true);

        $tag = (new Tag())->tag('a');
        $this->assertSame('<a>', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->empty(true);
        $this->assertSame('<a />', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->attribute('color', 'red');
        $this->assertSame('<a color="red">', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->attribute('color', 'red')->empty(true);
        $this->assertSame('<a color="red" />', $method->invokeArgs($tag, []));
    }

    /**
     * Testing for the "getAttributes" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::getAttributes
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testGetAttributes(): void
    {
        $class = new ReflectionClass(Tag::class);
        $method = $class->getMethod('getAttributes');
        $method->setAccessible(true);

        $tag = (new Tag())->tag('a')->attribute(null, null);
        $this->assertSame('', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->attribute(null, 'red');
        $this->assertSame('', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->attribute('color', null);
        $this->assertSame('', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->attribute('color', 'red');
        $this->assertSame(' color="red"', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->attribute('color', 'red')->attribute('shape', 'round');
        $this->assertSame(' color="red" shape="round"', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->attribute('COLOR', 'red');
        $this->assertSame(' color="red"', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->attribute('COLOR', '& " \' > <');
        $this->assertSame(' color="&amp; &quot; &#039; &gt; &lt;"', $method->invokeArgs($tag, []));
    }

    /**
     * Testing for the "getContent" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::getContent
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testGetContent(): void
    {
        $class = new ReflectionClass(Tag::class);
        $method = $class->getMethod('getContent');
        $method->setAccessible(true);

        $tag = (new Tag())->tag('a')->content(null);
        $this->assertSame('', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->content(1);
        $this->assertSame('1', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->content('string');
        $this->assertSame('string', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->content(false);
        $this->assertSame('', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->content(new class {});
        $this->assertSame('', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->content(new class {
            public function __toString() { return 'string'; }
        });
        $this->assertSame('string', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->content([]);
        $this->assertSame('', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->content(['string']);
        $this->assertSame('string', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->content(['string'], fn($string) => strtoupper($string));
        $this->assertSame('STRING', $method->invokeArgs($tag, []));
    }

    /**
     * Testing for the "getCloseTag" method.
     *
     * @covers \Mireon\YandexTurbo\Helpers\Tag\Tag::getCloseTag
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public function testGetCloseTag(): void
    {
        $class = new ReflectionClass(Tag::class);
        $method = $class->getMethod('getCloseTag');
        $method->setAccessible(true);

        $tag = (new Tag())->tag('a')->empty(true);
        $this->assertSame('', $method->invokeArgs($tag, []));

        $tag = (new Tag())->tag('a')->empty(false);
        $this->assertSame('</a>', $method->invokeArgs($tag, []));
    }
}

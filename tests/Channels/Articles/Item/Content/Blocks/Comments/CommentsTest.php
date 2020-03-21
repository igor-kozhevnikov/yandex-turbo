<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Comments;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comments;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Comments" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Comments
 */
class CommentsTest extends TestCase
{
    /**
     * The URL for adding a comment.
     *
     * @var string|null
     */
    private $url = 'http://example.com';

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comments::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $comments = new Comments();
        $this->assertEmpty($comments->getItems());
        $this->assertNull($comments->getUrl());

        $comments = new Comments([new Comment()]);
        $this->assertNotEmpty($comments->getItems());
    }

    /**
     * Testing of the "url" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comments::setUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comments::hasURL
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comments::getUrl
     *
     * @return void
     */
    public function testUrl(): void
    {
        $comments = new Comments();
        $comments->setUrl($this->url);
        $this->assertSame($this->url, $comments->getUrl());
        $this->assertTrue($comments->hasURL());

        $comments = new Comments();
        $comments->setUrl('');
        $this->assertNull($comments->getUrl());
        $this->assertFalse($comments->hasURL());

        $comments = new Comments();
        $comments->setUrl(null);
        $this->assertNull($comments->getUrl());
        $this->assertFalse($comments->hasURL());

        $comments = new Comments();
        $comments->setUrl('url');
        $this->assertNull($comments->getUrl());
        $this->assertFalse($comments->hasURL());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comments::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $comments = Comments::create();
        $this->assertInstanceOf(Comments::class, $comments);
        $this->assertEmpty($comments->getItems());
        $this->assertNull($comments->getUrl());

        $comments = Comments::create([new Comment()]);
        $this->assertInstanceOf(Comments::class, $comments);
        $this->assertNotEmpty($comments->getItems());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $comments = (new Comments())->url($this->url);
        $this->assertInstanceOf(Comments::class, $comments);
        $this->assertSame($this->url, $comments->getUrl());
    }
}

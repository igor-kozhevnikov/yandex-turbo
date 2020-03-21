<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Comments;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comments;
use PHPUnit\Framework\TestCase;

/**
 * Testing of an item of the "Comments" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Comments
 */
class CommentTest extends TestCase
{
    /**
     * The author.
     *
     * @var string|null
     */
    private $author;

    /**
     * The author avatar.
     *
     * @var string|null
     */
    private $avatar;

    /**
     * The sub title.
     *
     * @var string|null
     */
    private $subTitle;

    /**
     * The header.
     *
     * @var string|null
     */
    private $header;

    /**
     * The content.
     *
     * @var string|null
     */
    private $content;

    /**
     * The comments.
     *
     * @var Comments|null
     */
    private $comments;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->author = 'author';
        $this->avatar = 'http://example.com';
        $this->subTitle = 'title';
        $this->header = 'header';
        $this->content = 'content';
        $this->comments = new Comments([new Comment()]);
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $comment = new Comment();
        $this->assertNull($comment->getAuthor());
        $this->assertFalse($comment->hasAuthor());
        $this->assertNull($comment->getAvatar());
        $this->assertFalse($comment->hasAvatar());
        $this->assertNull($comment->getSubTitle());
        $this->assertFalse($comment->hasSubTitle());
        $this->assertNull($comment->getContent());
        $this->assertFalse($comment->hasContent());
        $this->assertNull($comment->getComments());
        $this->assertFalse($comment->hasComments());

        $comment = new Comment($this->author, $this->content);
        $this->assertSame($this->author, $comment->getAuthor());
        $this->assertTrue($comment->hasAuthor());
        $this->assertSame($this->content, $comment->getContent());
        $this->assertTrue($comment->hasContent());
    }

    /**
     * Testing of the "author" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::setAuthor
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::getAuthor
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::hasAuthor
     *
     * @return void
     */
    public function testAuthor(): void
    {
        $comment = new Comment();
        $comment->setAuthor($this->author);
        $this->assertSame($this->author, $comment->getAuthor());
        $this->assertTrue($comment->hasAuthor());

        $comment = new Comment();
        $comment->setAuthor('');
        $this->assertNull($comment->getAuthor());
        $this->assertFalse($comment->hasAuthor());

        $comment = new Comment();
        $comment->setAuthor(null);
        $this->assertNull($comment->getAuthor());
        $this->assertFalse($comment->hasAuthor());
    }

    /**
     * Testing of the "avatar" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::setAvatar
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::getAvatar
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::hasAvatar
     *
     * @return void
     */
    public function testAvatar(): void
    {
        $comment = new Comment();
        $comment->setAvatar($this->avatar);
        $this->assertSame($this->avatar, $comment->getAvatar());
        $this->assertTrue($comment->hasAvatar());

        $comment = new Comment();
        $comment->setAvatar('');
        $this->assertNull($comment->getAvatar());
        $this->assertFalse($comment->hasAvatar());

        $comment = new Comment();
        $comment->setAvatar(null);
        $this->assertNull($comment->getAvatar());
        $this->assertFalse($comment->hasAvatar());

        $comment = new Comment();
        $comment->setAvatar('avatar');
        $this->assertNull($comment->getAvatar());
        $this->assertFalse($comment->hasAvatar());
    }

    /**
     * Testing of the "subTitle" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::setSubTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::getSubTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::hasSubTitle
     *
     * @return void
     */
    public function testSubTitle(): void
    {
        $comment = new Comment();
        $comment->setSubTitle($this->subTitle);
        $this->assertSame($this->subTitle, $comment->getSubTitle());
        $this->assertTrue($comment->hasSubTitle());

        $comment = new Comment();
        $comment->setSubTitle('');
        $this->assertNull($comment->getSubTitle());
        $this->assertFalse($comment->hasSubTitle());

        $comment = new Comment();
        $comment->setSubTitle(null);
        $this->assertNull($comment->getSubTitle());
        $this->assertFalse($comment->hasSubTitle());
    }

    /**
     * Testing of the "header" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::setHeader
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::getHeader
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::hasHeader
     *
     * @return void
     */
    public function testHeader(): void
    {
        $comment = new Comment();
        $comment->setHeader($this->header);
        $this->assertSame($this->header, $comment->getHeader());
        $this->assertTrue($comment->hasHeader());

        $comment = new Comment();
        $comment->setHeader('');
        $this->assertNull($comment->getHeader());
        $this->assertFalse($comment->hasHeader());

        $comment = new Comment();
        $comment->setHeader(null);
        $this->assertNull($comment->getHeader());
        $this->assertFalse($comment->hasHeader());
    }

    /**
     * Testing of the "content" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::setContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::getContent
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::hasContent
     *
     * @return void
     */
    public function testContent(): void
    {
        $comment = new Comment();
        $comment->setContent($this->content);
        $this->assertSame($this->content, $comment->getContent());
        $this->assertTrue($comment->hasContent());

        $comment = new Comment();
        $comment->setContent('');
        $this->assertNull($comment->getContent());
        $this->assertFalse($comment->hasContent());

        $comment = new Comment();
        $comment->setContent(null);
        $this->assertNull($comment->getContent());
        $this->assertFalse($comment->hasContent());
    }

    /**
     * Testing of the "comments" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::setComments
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::getComments
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::hasComments
     *
     * @return void
     */
    public function testComments(): void
    {
        $comment = new Comment();
        $comment->setComments($this->comments);
        $this->assertEquals($this->comments, $comment->getComments());
        $this->assertTrue($comment->hasComments());

        $comment = new Comment();
        $comment->setComments(null);
        $this->assertNull($comment->getComments());
        $this->assertFalse($comment->hasComments());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $comment = new Comment();
        $this->assertFalse($comment->isValid());

        $comment = new Comment();
        $comment->setAuthor($this->author);
        $comment->setContent($this->content);
        $this->assertTrue($comment->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $comment = Comment::create();
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertNull($comment->getAuthor());
        $this->assertNull($comment->getContent());

        $comment = Comment::create($this->author, $this->content);
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertSame($this->author, $comment->getAuthor());
        $this->assertSame($this->content, $comment->getContent());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $comment = (new Comment())->author($this->author);
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertSame($this->author, $comment->getAuthor());

        $comment = (new Comment())->avatar($this->avatar);
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertSame($this->avatar, $comment->getAvatar());

        $comment = (new Comment())->header($this->header);
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertSame($this->header, $comment->getHeader());

        $comment = (new Comment())->subTitle($this->subTitle);
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertSame($this->subTitle, $comment->getSubTitle());

        $comment = (new Comment())->content($this->content);
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertSame($this->content, $comment->getContent());

        $comment = (new Comment())->comments($this->comments);
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertEquals($this->comments, $comment->getComments());
    }
}

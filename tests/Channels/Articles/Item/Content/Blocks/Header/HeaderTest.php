<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Header;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link as BreadcrumbLink;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Link as MenuLink;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Header" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Header
 */
class HeaderTest extends TestCase
{
    /**
     * Testing of the "title" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::setTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::hasTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::getTitle
     *
     * @return void
     */
    public function testTitle(): void
    {
        // Init.
        $header = new Header();
        $this->assertNull($header->getTitle());
        $this->assertFalse($header->hasTitle());

        // Null.
        $header = new Header();
        $header->setTitle(null);
        $this->assertNull($header->getTitle());
        $this->assertFalse($header->hasTitle());

        // Empty.
        $header = new Header();
        $header->setTitle('');
        $this->assertNull($header->getTitle());
        $this->assertFalse($header->hasTitle());

        // String.
        $header = new Header();
        $header->setTitle('title');
        $this->assertSame('title', $header->getTitle());
        $this->assertTrue($header->hasTitle());
    }

    /**
     * Testing of the "subTitle" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::setSubTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::hasSubTitle
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::getSubTitle
     *
     * @return void
     */
    public function testSubTitle(): void
    {
        // Init.
        $header = new Header();
        $this->assertNull($header->getSubTitle());
        $this->assertFalse($header->hasSubTitle());

        // Null.
        $header = new Header();
        $header->setSubTitle(null);
        $this->assertNull($header->getSubTitle());
        $this->assertFalse($header->hasSubTitle());

        // Empty.
        $header = new Header();
        $header->setSubTitle('');
        $this->assertNull($header->getSubTitle());
        $this->assertFalse($header->hasSubTitle());

        // String.
        $header = new Header();
        $header->setSubTitle('title');
        $this->assertSame('title', $header->getSubTitle());
        $this->assertTrue($header->hasSubTitle());
    }

    /**
     * Testing of the "preview" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::setPreview
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::hasPreview
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::getPreview
     *
     * @return void
     */
    public function testPreview(): void
    {
        // Init.
        $header = new Header();
        $this->assertNull($header->getPreview());
        $this->assertFalse($header->hasPreview());

        // Null.
        $header = new Header();
        $header->setPreview(null);
        $this->assertNull($header->getPreview());
        $this->assertFalse($header->hasPreview());

        // Invalid.
        $header = new Header();
        $header->setPreview('example.com');
        $this->assertNull($header->getPreview());
        $this->assertFalse($header->hasPreview());

        // Valid.
        $header = new Header();
        $header->setPreview('http://example.com');
        $this->assertSame('http://example.com', $header->getPreview());
        $this->assertTrue($header->hasPreview());
    }

    /**
     * Testing of the "menu" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::setMenu
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::hasMenu
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::getMenu
     *
     * @return void
     */
    public function testMenu(): void
    {
        $header = new Header();
        $this->assertNull($header->getMenu());
        $this->assertFalse($header->hasMenu());

        $header = new Header();
        $header->setMenu(new Menu([new MenuLink()]));
        $this->assertInstanceOf(Menu::class, $header->getMenu());
        $this->assertTrue($header->hasMenu());

        $header = new Header();
        $header->setMenu(new Menu([new MenuLink()]));
        $header->setMenu(null);
        $this->assertNull($header->getMenu());
        $this->assertFalse($header->hasMenu());
    }

    /**
     * Testing of the "breadcrumbs" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::setBreadcrumbs
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::hasBreadcrumbs
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::getBreadcrumbs
     *
     * @return void
     */
    public function testBreadcrumbs(): void
    {
        $header = new Header();
        $this->assertNull($header->getBreadcrumbs());
        $this->assertFalse($header->hasBreadcrumbs());

        $header = new Header();
        $header->setBreadcrumbs(new Breadcrumbs([new BreadcrumbLink()]));
        $this->assertInstanceOf(Breadcrumbs::class, $header->getBreadcrumbs());
        $this->assertTrue($header->hasBreadcrumbs());

        $header = new Header();
        $header->setBreadcrumbs(new Breadcrumbs([new BreadcrumbLink()]));
        $header->setBreadcrumbs(null);
        $this->assertNull($header->getBreadcrumbs());
        $this->assertFalse($header->hasBreadcrumbs());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        // Invalid.
        $header = new Header();
        $this->assertFalse($header->isValid());

        // Valid.
        $header = new Header();
        $header->setTitle('title');
        $this->assertTrue($header->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        // Invalid.
        $header = Header::create();
        $this->assertInstanceOf(Header::class, $header);
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $title = 'title';
        $subTitle = 'sub-title';
        $preview = 'http://example.com';
        $menu = new Menu();
        $breadcrumbs = new Breadcrumbs();
        $header = new Header();

        // Title.
        $header = $header->title($title);
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame($title, $header->getTitle());

        // Sub title.
        $header = $header->subTitle($subTitle);
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame($subTitle, $header->getSubTitle());

        // Preview.
        $header = $header->preview($preview);
        $this->assertInstanceOf(Header::class, $header);
        $this->assertSame($preview, $header->getPreview());

        // Menu.
        $header = $header->menu($menu);
        $this->assertInstanceOf(Header::class, $header);
        $this->assertEquals($menu, $header->getMenu());

        // Breadcrumbs.
        $header = $header->breadcrumbs($breadcrumbs);
        $this->assertInstanceOf(Header::class, $header);
        $this->assertEquals($breadcrumbs, $header->getBreadcrumbs());
    }
}

<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Feedback;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item;
use PHPUnit\Framework\TestCase;

/**
 * Testing of an item of the "Feedback" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Feedback
 */
class ItemTest extends TestCase
{
    /**
     * The type.
     *
     * @var string|null
     */
    private $type;

    /**
     * The contact information.
     *
     * @var string|null
     */
    private $url;

    /**
     * The email for a message from a user.
     *
     * @var string|null
     */
    private $sendTo;

    /**
     * The company name.
     *
     * @var string|null
     */
    private $agreementCompany;

    /**
     * The link to feedback policy.
     *
     * @var string|null
     */
    private $agreementLink;

    /**
     * Initialize the environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->type = Item::TYPE_CALLBACK;
        $this->url = 'http://example.com';
        $this->sendTo = 'user@mail.com';
        $this->agreementCompany = 'company';
        $this->agreementLink = 'http://example.com';
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $item = new Item();
        $this->assertNull($item->getType());
        $this->assertFalse($item->hasType());
        $this->assertNull($item->getUrl());
        $this->assertFalse($item->hasUrl());
        $this->assertNull($item->getSendTo());
        $this->assertFalse($item->hasSendTo());
        $this->assertNull($item->getAgreementCompany());
        $this->assertFalse($item->hasAgreementCompany());
        $this->assertNull($item->getAgreementLink());
        $this->assertFalse($item->hasAgreementLink());

        $item = new Item($this->type, $this->url);
        $this->assertSame($this->type, $item->getType());
        $this->assertTrue($item->hasType());
        $this->assertSame($this->url, $item->getUrl());
        $this->assertTrue($item->hasUrl());
    }

    /**
     * Testing of the "type" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::setType
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::hasType
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::getType
     *
     * @return void
     */
    public function testType(): void
    {
        $item = new Item();
        $item->setType($this->type);
        $this->assertSame($this->type, $item->getType());
        $this->assertTrue($item->hasType());

        $item = new Item();
        $item->setType('');
        $this->assertNull($item->getType());
        $this->assertFalse($item->hasType());

        $item = new Item();
        $item->setType(null);
        $this->assertNull($item->getType());
        $this->assertFalse($item->hasType());

        $item = new Item();
        $item->setType('type');
        $this->assertNull($item->getType());
        $this->assertFalse($item->hasType());
    }

    /**
     * Testing of the "url" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::setUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::hasUrl
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::getUrl
     *
     * @return void
     */
    public function testUrl(): void
    {
        $item = new Item();
        $item->setUrl($this->url);
        $this->assertSame($this->url, $item->getUrl());
        $this->assertTrue($item->hasUrl());

        $item = new Item();
        $item->setUrl('');
        $this->assertNull($item->getUrl());
        $this->assertFalse($item->hasUrl());

        $item = new Item();
        $item->setUrl(null);
        $this->assertNull($item->getUrl());
        $this->assertFalse($item->hasUrl());
    }

    /**
     * Testing of the "sendTo" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::setSendTo
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::hasSendTo
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::getSendTo
     *
     * @return void
     */
    public function testSendTo(): void
    {
        $item = new Item();
        $item->setSendTo($this->sendTo);
        $this->assertSame($this->sendTo, $item->getSendTo());
        $this->assertTrue($item->hasSendTo());

        $item = new Item();
        $item->setSendTo('');
        $this->assertNull($item->getSendTo());
        $this->assertFalse($item->hasSendTo());

        $item = new Item();
        $item->setSendTo(null);
        $this->assertNull($item->getSendTo());
        $this->assertFalse($item->hasSendTo());

        $item = new Item();
        $item->setSendTo('email');
        $this->assertNull($item->getSendTo());
        $this->assertFalse($item->hasSendTo());
    }

    /**
     * Testing of the "agreementCompany" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::setAgreementCompany
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::hasAgreementCompany
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::getAgreementCompany
     *
     * @return void
     */
    public function testAgreementCompany(): void
    {
        $item = new Item();
        $item->setAgreementCompany($this->agreementCompany);
        $this->assertSame($this->agreementCompany, $item->getAgreementCompany());
        $this->assertTrue($item->hasAgreementCompany());

        $item = new Item();
        $item->setAgreementCompany('');
        $this->assertNull($item->getAgreementCompany());
        $this->assertFalse($item->hasAgreementCompany());

        $item = new Item();
        $item->setAgreementCompany(null);
        $this->assertNull($item->getAgreementCompany());
        $this->assertFalse($item->hasAgreementCompany());
    }

    /**
     * Testing of the "agreementLink" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::setAgreementLink
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::hasAgreementLink
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::getAgreementLink
     *
     * @return void
     */
    public function testAgreementLink(): void
    {
        $item = new Item();
        $item->setAgreementLink($this->agreementLink);
        $this->assertSame($this->agreementLink, $item->getAgreementLink());
        $this->assertTrue($item->hasAgreementLink());

        $item = new Item();
        $item->setAgreementLink('');
        $this->assertNull($item->getAgreementLink());
        $this->assertFalse($item->hasAgreementLink());

        $item = new Item();
        $item->setAgreementLink(null);
        $this->assertNull($item->getAgreementLink());
        $this->assertFalse($item->hasAgreementLink());

        $item = new Item();
        $item->setAgreementLink('url');
        $this->assertNull($item->getAgreementLink());
        $this->assertFalse($item->hasAgreementLink());
    }

    /**
     * Testing of the "agreement" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::setAgreement
     *
     * @return void
     */
    public function testAgreement(): void
    {
        $item = new Item();
        $item->setAgreement($this->agreementCompany, $this->agreementLink);
        $this->assertSame($this->agreementCompany, $item->getAgreementCompany());
        $this->assertSame($this->agreementLink, $item->getAgreementLink());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $item = new Item();
        $this->assertFalse($item->isValid());

        $item = new Item();
        $item->setType(Item::TYPE_CALLBACK);
        $item->setSendTo(null);
        $this->assertFalse($item->isValid());

        $item = new Item();
        $item->setType(Item::TYPE_CALLBACK);
        $item->setSendTo($this->sendTo);
        $this->assertTrue($item->isValid());

        $item = new Item();
        $item->setType(Item::TYPE_CALLBACK);
        $item->setSendTo($this->sendTo);
        $item->setAgreement($this->agreementCompany, $this->agreementLink);
        $this->assertTrue($item->isValid());

        $item = new Item();
        $item->setType(Item::TYPE_CALLBACK);
        $item->setSendTo($this->sendTo);
        $item->setAgreement(null, $this->agreementLink);
        $this->assertFalse($item->isValid());

        $item = new Item();
        $item->setType(Item::TYPE_CALLBACK);
        $item->setSendTo($this->sendTo);
        $item->setAgreement($this->agreementCompany, null);
        $this->assertFalse($item->isValid());

        $item = new Item();
        $item->setType(Item::TYPE_VIBER);
        $item->setUrl($this->url);
        $this->assertTrue($item->isValid());

        $item = new Item();
        $item->setType(Item::TYPE_VIBER);
        $item->setUrl(null);
        $this->assertFalse($item->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $item = Item::create();
        $this->assertInstanceOf(Item::class, $item);
        $this->assertNull($item->getType());
        $this->assertNull($item->getUrl());

        $item = Item::create($this->type, $this->url);
        $this->assertSame($this->type, $item->getType());
        $this->assertSame($this->url, $item->getUrl());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $item = (new Item())->type($this->type);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->type, $item->getType());

        $item = (new Item())->url($this->url);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->url, $item->getUrl());

        $item = (new Item())->sendTo($this->sendTo);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame( $this->sendTo, $item->getSendTo());

        $item = (new Item())->agreementCompany($this->agreementCompany);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->agreementCompany, $item->getAgreementCompany());

        $item = (new Item())->agreementLink($this->agreementLink);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->agreementLink, $item->getAgreementLink());

        $item = (new Item())->agreement($this->agreementCompany, $this->agreementLink);
        $this->assertInstanceOf(Item::class, $item);
        $this->assertSame($this->agreementCompany, $item->getAgreementCompany());
        $this->assertSame($this->agreementLink, $item->getAgreementLink());
    }
}

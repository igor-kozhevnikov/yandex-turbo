<?php


namespace Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Callback;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "Callback" block.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Item\Content\Blocks\Callback
 */
class CallbackTest extends TestCase
{
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
        $this->sendTo = 'user@mail.com';
        $this->agreementCompany = 'company';
        $this->agreementLink = 'http://example.com';
    }

    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $callback = new Callback();
        $this->assertNull($callback->getSendTo());
        $this->assertNull($callback->getAgreementCompany());
        $this->assertNull($callback->getAgreementLink());

        $callback = new Callback($this->sendTo);
        $this->assertSame($this->sendTo, $callback->getSendTo());
    }

    /**
     * Testing of the "sendTo" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::setSendTo
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::hasSendTo
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::getSendTo
     *
     * @return void
     */
    public function testSendTo(): void
    {
        $callback = new Callback();
        $callback->setSendTo($this->sendTo);
        $this->assertSame($this->sendTo, $callback->getSendTo());
        $this->assertTrue($callback->hasSendTo());

        $callback = new Callback();
        $callback->setSendTo('');
        $this->assertNull($callback->getSendTo());
        $this->assertFalse($callback->hasSendTo());

        $callback = new Callback();
        $callback->setSendTo(null);
        $this->assertNull($callback->getSendTo());
        $this->assertFalse($callback->hasSendTo());

        $callback = new Callback();
        $callback->setSendTo('email');
        $this->assertNull($callback->getSendTo());
        $this->assertFalse($callback->hasSendTo());
    }

    /**
     * Testing of the "agreementCompany" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::setAgreementCompany
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::hasAgreementCompany
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::getAgreementCompany
     *
     * @return void
     */
    public function testAgreementCompany(): void
    {
        $callback = new Callback();
        $callback->setAgreementCompany($this->agreementCompany);
        $this->assertSame($this->agreementCompany, $callback->getAgreementCompany());
        $this->assertTrue($callback->hasAgreementCompany());

        $callback = new Callback();
        $callback->setAgreementCompany('');
        $this->assertNull($callback->getAgreementCompany());
        $this->assertFalse($callback->hasAgreementCompany());

        $callback = new Callback();
        $callback->setAgreementCompany(null);
        $this->assertNull($callback->getAgreementCompany());
        $this->assertFalse($callback->hasAgreementCompany());
    }

    /**
     * Testing of the "agreementLink" variable.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::setAgreementLink
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::hasAgreementLink
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::getAgreementLink
     *
     * @return void
     */
    public function testAgreementLink(): void
    {
        $callback = new Callback();
        $callback->setAgreementLink($this->agreementLink);
        $this->assertSame($this->agreementLink, $callback->getAgreementLink());
        $this->assertTrue($callback->hasAgreementLink());

        $callback = new Callback();
        $callback->setAgreementLink('');
        $this->assertNull($callback->getAgreementLink());
        $this->assertFalse($callback->hasAgreementLink());

        $callback = new Callback();
        $callback->setAgreementLink(null);
        $this->assertNull($callback->getAgreementLink());
        $this->assertFalse($callback->hasAgreementLink());

        $callback = new Callback();
        $callback->setAgreementLink('link');
        $this->assertNull($callback->getAgreementLink());
        $this->assertFalse($callback->hasAgreementLink());
    }

    /**
     * Testing of the "setAgreement" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::setAgreement
     *
     * @return void
     */
    public function testSetAgreement(): void
    {
        $callback = new Callback();
        $callback->setAgreement($this->agreementCompany, $this->agreementLink);
        $this->assertSame($this->agreementCompany, $callback->getAgreementCompany());
        $this->assertTrue($callback->hasAgreementCompany());
        $this->assertSame($this->agreementLink, $callback->getAgreementLink());
        $this->assertTrue($callback->hasAgreementLink());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $callback = new Callback();
        $this->assertFalse($callback->isValid());

        $callback = new Callback();
        $callback->setSendTo($this->sendTo);
        $this->assertTrue($callback->isValid());

        $callback = new Callback();
        $callback->setAgreement($this->agreementCompany, $this->agreementLink);
        $this->assertFalse($callback->isValid());

        $callback = new Callback();
        $callback->setSendTo($this->sendTo);
        $callback->setAgreement($this->agreementCompany, $this->agreementLink);
        $this->assertTrue($callback->isValid());

        $callback = new Callback();
        $callback->setSendTo($this->sendTo);
        $callback->setAgreement(null, $this->agreementLink);
        $this->assertFalse($callback->isValid());

        $callback = new Callback();
        $callback->setSendTo($this->sendTo);
        $callback->setAgreement($this->agreementCompany, null);
        $this->assertFalse($callback->isValid());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $callback = Callback::create();
        $this->assertInstanceOf(Callback::class, $callback);
        $this->assertNull($callback->getSendTo());

        $callback = Callback::create($this->sendTo);
        $this->assertInstanceOf(Callback::class, $callback);
        $this->assertSame($this->sendTo, $callback->getSendTo());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $callback = (new Callback())->sendTo($this->sendTo);
        $this->assertInstanceOf(Callback::class, $callback);
        $this->assertSame($this->sendTo, $callback->getSendTo());

        $callback = (new Callback())->agreementCompany($this->agreementCompany);
        $this->assertInstanceOf(Callback::class, $callback);
        $this->assertSame($this->agreementCompany, $callback->getAgreementCompany());

        $callback = (new Callback())->agreementLink($this->agreementLink);
        $this->assertInstanceOf(Callback::class, $callback);
        $this->assertSame($this->agreementLink, $callback->getAgreementLink());

        $callback = (new Callback())->agreement($this->agreementCompany, $this->agreementLink);
        $this->assertInstanceOf(Callback::class, $callback);
        $this->assertSame($this->agreementCompany, $callback->getAgreementCompany());
        $this->assertSame($this->agreementLink, $callback->getAgreementLink());
    }
}

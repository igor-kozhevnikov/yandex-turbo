<?php

namespace Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\MailRu;

use Mireon\YandexTurbo\Channels\Articles\Analytic\MailRu\MailRu;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Analytics;
use PHPUnit\Framework\TestCase;

/**
 * Testing of the "MailRu" analytic.
 *
 * @package Mireon\YandexTurbo\Tests\Channels\Articles\Analytics\MailRu
 */
class MailRuTest extends TestCase
{
    /**
     * Testing of the "__construct" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\MailRu\MailRu::__construct
     *
     * @return void
     */
    public function testConstruct(): void
    {
        $mail = new MailRu();
        $this->assertTrue($mail->hasType());
        $this->assertSame('MailRu', $mail->getType());
        $this->assertNull($mail->getId());
        $this->assertFalse($mail->hasId());

        $mail = new MailRu(null);
        $this->assertNull($mail->getId());
        $this->assertFalse($mail->hasId());

        $mail = new MailRu('123456789');
        $this->assertSame('123456789', $mail->getId());
        $this->assertTrue($mail->hasId());
    }

    /**
     * Testing of the "id" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\MailRu\MailRu::hasId
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\MailRu\MailRu::getId
     *
     * @return void
     */
    public function testId(): void
    {
        $mail = new MailRu();
        $mail->setId(null);
        $this->assertNull($mail->getId());
        $this->assertFalse($mail->hasId());

        $mail = new MailRu();
        $mail->setId('');
        $this->assertNull($mail->getId());
        $this->assertFalse($mail->hasId());

        $mail = new MailRu();
        $mail->setId('123456789');
        $this->assertSame('123456789', $mail->getId());
        $this->assertTrue($mail->hasId());
    }

    /**
     * Testing of the fluent interface.
     *
     * @return void
     */
    public function testFluentInterface(): void
    {
        $mail = new MailRu();
        $mail = $mail->id('123456789');
        $this->assertInstanceOf(MailRu::class, $mail);
        $this->assertSame('123456789', $mail->getId());
    }

    /**
     * Testing of the "create" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\MailRu\MailRu::create
     *
     * @return void
     */
    public function testCreate(): void
    {
        $mail = MailRu::create();
        $this->assertInstanceOf(MailRu::class, $mail);
        $this->assertNull($mail->getId());

        $mail = MailRu::create('123456789');
        $this->assertInstanceOf(MailRu::class, $mail);
        $this->assertSame('123456789', $mail->getId());
    }

    /**
     * Testing of the "isValid" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\MailRu\MailRu::isValid
     *
     * @return void
     */
    public function testIsValid(): void
    {
        $mail = new MailRu();
        $this->assertFalse($mail->isValid());

        $mail = new MailRu();
        $mail->setId('123456789');
        $this->assertTrue($mail->isValid());
    }

    /**
     * Testing of the "appendTo" method.
     *
     * @covers \Mireon\YandexTurbo\Channels\Articles\Analytic\MailRu\MailRu::appendTo
     *
     * @return void
     */
    public function testAppendTo(): void
    {
        $analytics = new Analytics();
        $this->assertFalse($analytics->isNotEmpty());

        $mail = new MailRu();
        $mail->appendTo($analytics);
        $this->assertTrue($analytics->isNotEmpty());
    }
}

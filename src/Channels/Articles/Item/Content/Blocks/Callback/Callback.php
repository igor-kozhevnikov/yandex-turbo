<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block;

/**
 * The "Callback" block.
 *
 * @method self sendTo(?string $sendTo)
 *   Sets the email.
 * @method self agreementCompany(?string $company)
 *   Sets the company name.
 * @method self agreementLink(?string $link)
 *   Sets the link to feedback policy.
 * @method self agreement(?string $company, ?string $link)
 *   Sets the agreement data.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/fos-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback
 */
class Callback extends Block
{
    /**
     * The email for a message from a user.
     *
     * @var string|null
     */
    private ?string $sendTo = null;

    /**
     * The company name.
     *
     * @var string|null
     */
    private ?string $agreementCompany = null;

    /**
     * The link to feedback policy.
     *
     * @var string|null
     */
    private ?string $agreementLink = null;

    /**
     * Callback constructor.
     *
     * @param string|null $sendTo
     *   An email.
     */
    public function __construct(?string $sendTo = null)
    {
        $this->setRenderer(CallbackRender::class);
        $this->setSendTo($sendTo);
    }

    /**
     * Sets an email.
     *
     * @param string|null $sendTo
     *   An email.
     *
     * @return void
     */
    public function setSendTo(?string $sendTo): void
    {
        $this->sendTo = filter_var($sendTo, FILTER_VALIDATE_EMAIL) ? $sendTo : null;
    }

    /**
     * Indicates if a email is set.
     *
     * @return bool
     */
    public function hasSendTo(): bool
    {
        return !is_null($this->sendTo);
    }

    /**
     * Returns an email.
     *
     * @return string|null
     */
    public function getSendTo(): ?string
    {
        return $this->sendTo;
    }

    /**
     * Sets a company name.
     *
     * @param string|null $company
     *   A company name.
     *
     * @return void
     */
    public function setAgreementCompany(?string $company): void
    {
        $this->agreementCompany = $company ?: null;
    }

    /**
     * Indicates if a agreement company is set.
     *
     * @return bool
     */
    public function hasAgreementCompany(): bool
    {
        return !is_null($this->agreementCompany);
    }

    /**
     * Returns a company name.
     *
     * @return string|null
     */
    public function getAgreementCompany(): ?string
    {
        return $this->agreementCompany;
    }

    /**
     * Sets a lint to feedback policy.
     *
     * @param string|null $link
     *   A link to feedback policy.
     *
     * @return void
     */
    public function setAgreementLink(?string $link): void
    {
        $this->agreementLink = filter_var($link, FILTER_VALIDATE_URL) ? $link : null;
    }

    /**
     * Indicates if a lint to feedback policy is set.
     *
     * @return bool
     */
    public function hasAgreementLink(): bool
    {
        return !is_null($this->agreementLink);
    }

    /**
     * Returns a lint to feedback policy.
     *
     * @return string|null
     */
    public function getAgreementLink(): ?string
    {
        return $this->agreementLink;
    }

    /**
     * Sets a agreement data.
     *
     * @param string|null $company
     *   A company name.
     * @param string|null $link
     *   A link to feedback policy.
     *
     * @return void
     */
    public function setAgreement(?string $company, ?string $link): void
    {
        $this->setAgreementCompany($company);
        $this->setAgreementLink($link);
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        if (!$this->hasSendTo()) {
            return false;
        }

        return !(!$this->hasAgreementCompany() xor !$this->hasAgreementLink());
    }
}

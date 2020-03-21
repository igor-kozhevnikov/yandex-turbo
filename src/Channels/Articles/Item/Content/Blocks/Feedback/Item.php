<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockItemInterface;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;

/**
 * The "Feedback" block item.
 *
 * @method self type(?string $type)
 *   Sets the type.
 * @method self url(?string $url)
 *   Sets the contact information.
 * @method self sendTo(?string $sendTo)
 *   Sets the email.
 * @method self agreementCompany(?string $company)
 *   Sets the company name.
 * @method self agreementLink(?string $link)
 *   Sets the link to feedback policy.
 * @method self agreement(?string $company, ?string $link)
 *   Sets the agreement data.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback
 */
class Item extends BlockIterableItem implements BlockItemInterface
{
    /**
     * The "call" type.
     */
    public const TYPE_CALL = 'call';

    /**
     * The "Chat" type.
     */
    public const TYPE_CHAT = 'chat';

    /**
     * The "mail" type.
     */
    public const TYPE_MAIL = 'mail';

    /**
     * The "callback" type.
     */
    public const TYPE_CALLBACK = 'callback';

    /**
     * The "Facebook" type.
     */
    public const TYPE_FACEBOOK = 'facebook';

    /**
     * The "Google" type.
     */
    public const TYPE_GOOGLE = 'google';

    /**
     * The "Odnoklassniki" type.
     */
    public const TYPE_ODNOKLASSNIKI = 'odnoklassniki';

    /**
     * The "Telegram" type.
     */
    public const TYPE_TELEGRAM = 'telegram';

    /**
     * The "Twitter" type.
     */
    public const TYPE_TWITTER = 'twitter';

    /**
     * The "Viber" type.
     */
    public const TYPE_VIBER = 'viber';

    /**
     * The "Vkontakte" type.
     */
    public const TYPE_VKONTAKTE = 'vkontakte';

    /**
     * The "Whatapp" type.
     */
    public const TYPE_WHATAPP = 'whatapp';

    /**
     * The type.
     *
     * @var string|null
     */
    private ?string $type = null;

    /**
     * The contact information.
     *
     * @var string|null
     */
    private ?string $url = null;

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
     * The constructor.
     *
     * @param string|null $type
     *   A type.
     * @param string|null $url
     *   A contact information.
     */
    public function __construct(?string $type = null, ?string $url = null) {
        $this->setType($type);
        $this->setUrl($url);
    }

    /**
     * Sets a type.
     *
     * @param string|null $type
     *   A type.
     *
     * @return void
     */
    public function setType(?string $type): void
    {
        switch ($type) {
            case self::TYPE_CALL:
            case self::TYPE_CHAT:
            case self::TYPE_MAIL:
            case self::TYPE_CALLBACK:
            case self::TYPE_FACEBOOK:
            case self::TYPE_GOOGLE:
            case self::TYPE_ODNOKLASSNIKI:
            case self::TYPE_TELEGRAM:
            case self::TYPE_TWITTER:
            case self::TYPE_VIBER:
            case self::TYPE_VKONTAKTE:
            case self::TYPE_WHATAPP:
                $this->type = $type;
                break;
            default:
                $this->type = null;
        }
    }

    /**
     * Indicates if a type is set.
     *
     * @return bool
     */
    public function hasType(): bool
    {
        return !is_null($this->type);
    }

    /**
     * Returns a type.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets a contact information.
     *
     * @param string|null $url
     *   A contact information.
     *
     * @return void
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url ?: null;
    }

    /**
     * Indicates if a URL is set.
     *
     * @return bool
     */
    public function hasUrl(): bool
    {
        return !is_null($this->url);
    }

    /**
     * Returns a contact information.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
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
     * Sets a lint to feedback policy.
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
        if (!$this->hasType()) {
            return false;
        }

        if ($this->type === self::TYPE_CALLBACK) {
            if (!$this->hasSendTo()) {
                return false;
            }

            return !($this->hasAgreementLink() xor $this->hasAgreementCompany());
        }

        return $this->hasUrl();
    }
}

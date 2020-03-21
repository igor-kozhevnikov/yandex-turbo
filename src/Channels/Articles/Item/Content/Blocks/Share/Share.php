<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Block;

/**
 * The "Share" block.
 *
 * @method self networks(?array $networks)
 *   Sets networks.
 * @method self network(?string $network)
 *   Add a network.
 *
 * @see https://yandex.ru/dev/turbo/doc/rss/elements/share-docpage/
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share
 */
class Share extends Block
{
    /**
     * The "Facebook" network.
     */
    public const NETWORK_FACEBOOK = 'facebook';

    /**
     * The "Odnoklassniki" network.
     */
    public const NETWORK_ODNOKLASSNIKI = 'odnoklassniki';

    /**
     * The "Telegram" network.
     */
    public const NETWORK_TELEGRAM = 'telegram';

    /**
     * The "Twitter" network.
     */
    public const NETWORK_TWITTER = 'twitter';

    /**
     * The "Vkontakte" network.
     */
    public const NETWORK_VKONTAKTE = 'vkontakte';

    /**
     * The listing of networks.
     *
     * @var string[]
     */
    protected array $networks = [];

    /**
     * The constructor.
     *
     * @param array|null $networks
     *   A list of networks.
     */
    public function __construct(?array $networks = null)
    {
        $this->setRenderer(ShareRender::class);
        $this->setNetworks($networks);
    }

    /**
     * Sets networks.
     *
     * @param array|null $networks
     *   A list networks.
     *
     * @return void
     */
    public function setNetworks(?array $networks): void
    {
        $this->reset();

        if (empty($networks)) {
            return;
        }

        foreach ($networks as $network) {
            $this->addNetwork($network);
        }
    }

    /**
     * Adds a network.
     *
     * @param string|null $network
     *   A network.
     *
     * @return void
     */
    public function addNetwork(?string $network): void
    {
        if ($this->check($network) && !in_array($network, $this->networks)) {
            $this->networks[] = $network;
        }
    }

    /**
     * Indicates if a networks is set.
     *
     * @return bool
     */
    public function hasNetworks(): bool
    {
        return !empty($this->networks);
    }

    /**
     * Returns a list of networks.
     *
     * @return string[]
     */
    public function getNetworks(): array
    {
        return $this->networks;
    }

    /**
     * Check if a network is valid.
     *
     * @param string|null $network
     *   A network.
     *
     * @return bool
     */
    private function check(?string $network): bool
    {
        switch ($network) {
            case self::NETWORK_FACEBOOK:
            case self::NETWORK_ODNOKLASSNIKI:
            case self::NETWORK_TELEGRAM:
            case self::NETWORK_TWITTER:
            case self::NETWORK_VKONTAKTE:
                return true;
            default:
                return false;
        }
    }

    /**
     * Reset networks.
     *
     * @return void
     */
    public function reset(): void
    {
        $this->networks = [];
    }

    /**
     * @inheritDoc
     */
    public function isValid(): bool
    {
        return $this->hasNetworks();
    }
}

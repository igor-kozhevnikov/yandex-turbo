<?php

namespace Mireon\YandexTurbo\Channels;

/**
 * The contract for a channel.
 *
 * @package Mireon\YandexTurbo\Contracts
 */
interface ChannelInterface
{
    /**
     * Render the channel.
     *
     * @return string|null
     */
    public function render(): ?string;
}

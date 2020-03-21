<?php

namespace Mireon\YandexTurbo\Channels\Articles;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the channel of articles.
 *
 * @package Mireon\YandexTurbo\Channels\Articles
 */
class ArticlesRender
{
    /**
     * Renders the channel of articles.
     *
     * @param Articles $articles
     *   A channel of articles.
     *
     * @codeCoverageIgnore
     *
     * @return string
     */
    public function render(Articles $articles): string
    {
        $header = '<?xml version="1.0" encoding="UTF-8"?>';

        $rss = Tag::create('rss')
            ->attribute('xmlns:yandex', 'http://news.yandex.ru')
            ->attribute('xmlns:media', 'http://search.yahoo.com/mrss/')
            ->attribute('xmlns:turbo', 'http://turbo.yandex.ru')
            ->attribute('version', '2.0');

        $channel = Tag::create('channel')->appendTo($rss);

        if ($articles->hasTitle()) {
            Tag::create('title')->content($articles->getTitle())->appendTo($channel);
        }

        if ($articles->hasDescription()) {
            Tag::create('description')->content($articles->getDescription())->appendTo($channel);
        }

        if ($articles->hasLink()) {
            Tag::create('link')->content($articles->getLink())->appendTo($channel);
        }

        if ($articles->hasLanguage()) {
            Tag::create('language')->content($articles->getLanguage())->appendTo($channel);
        }

        if ($articles->hasAds()) {
            $channel->content($articles->getAds()->render());
        }

        if ($articles->hasAnalytics()) {
            $channel->content($articles->getAnalytics()->render());
        }

        if ($articles->hasItems()) {
            $channel->content($articles->getItems()->render());
        }

        return $header . $rss->render();
    }
}

# Yandex.Turbo

[![PHP](https://img.shields.io/badge/php-7.4-green.svg?color=red)](https://github.com/Mireon/yandex-turbo)
[![Size](https://img.shields.io/github/repo-size/mireon/yandex-turbo?color=green)](https://github.com/Mireon/yandex-turbo)
[![License](https://img.shields.io/github/license/mireon/yandex-turbo?color=green)](https://github.com/Mireon/yandex-turbo)
[![Release](https://img.shields.io/github/v/release/mireon/yandex-turbo?color=red)](https://github.com/Mireon/yandex-turbo)

- [Официальная документация](https://yandex.ru/dev/turbo/doc/concepts/index-docpage/)
- Требуемая версия PHP: >= [7.4](https://www.php.net/releases/7_4_0.php)
        
## Установка

Установка с помощью [Composer](https://getcomposer.org/):

```sh
$ composer require igor-kozhevnikov/yandex-turbo
```
        
## Кодинг

#### Текучий интерфейс
Все примеры создания классов приведены с использованием текучего интерфейса, но вы можете использовать классический стиль.

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Articles;

// Fluent interface.
Articles::create()
    ->title('Название канала')
    ->description('Краткое описание канала')
    ->link('http://www.example.com/')
    ->language('ru');

// Classic style.
$channel = new Articles();
$channel->setTitle('Название канала');
$channel->setDescription('Краткое описание канала');
$channel->setLink('http://www.example.com/');
$channel->setLanguage('ru');

```

#### Фабричные методы
Почти каждый класс имеет 3 фабричных метода:
1. `Class:create()` - Создает экземпляр класса, передавая аргументы в конструктор.
2. `Class:createFromArray()` - Создает экземпляр класса и присваивает свойствам класса значения. В качестве аргумента принимает ассоциативный массив, где ключ это имя свойства класса, а значение - значение для этого свойства. 
3. `Class:createFromClosure()` - Создает экземпляр класса и применяет, заданную в качестве аргумента, функцию. В заданную функцию передается вновь созданный экземпляр класса.

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex;

Yandex::create('id', 'params');

Yandex::createFromArray([
    'id' => '123456',
    'params' => "{ 'time' : 'now()' }",
]);

Yandex::createFromClosure(function (Yandex $yandex) {
    $yandex->id('123456');
    $yandex->params("{ 'time' : 'now()' }");
});

```

## Создание канала

- [Разметки канала](https://yandex.ru/dev/turbo/doc/rss/markup-docpage/)
- [Пример канала](https://yandex.ru/dev/turbo/doc/rss/example-docpage/)

### Базовая информация

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Articles;

Articles::create()
    ->title('Название канала')
    ->description('Краткое описание канала')
    ->link('http://www.example.com/')
    ->language('ru');
```

### Рекламные блоки

Рекламные блоки можно добавлять двумя способами:
1. По одному экземпляру с помощью метода `Articles::ad()`. В качестве аргумента принимается экземпляр класса с реализованным интерфейсом `AdInterface`.
2. Набором с помощью метода `Articles::ads()`. В качестве аргумента принимается экземпляр класса с реализованным интерфейсом `AdsInterface`.

[Официальная документация](https://yandex.ru/dev/turbo/doc/settings/ads-in-content-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Articles;
use Mireon\YandexTurbo\Channels\Articles\Ad\Ads;
use Mireon\YandexTurbo\Channels\Articles\Ad\YandexAdNetwork\YandexAdNetwork;
use Mireon\YandexTurbo\Channels\Articles\Ad\AdFox\AdFox;

Articles::create()
    ->ad(YandexAdNetwork::create('id', 'turbo-ad-id'))
    ->ad(AdFox::create('turbo-ad-id', 'content'));

Articles::create()
    ->ads(Ads::create([
        YandexAdNetwork::create('id', 'turbo-ad-id'),
        AdFox::create('turbo-ad-id', 'content'),
    ]));
```

### Аналитические системы

Системы аналитики можно добавлять двумя способами:
1. По одному экземпляру с помощью метода `Articles::analytic()`. В качестве аргумента принимается экземпляр класса с реализованным интерфейсом `AnalyticInterface`.
2. Набором с помощью метода `Articles::analytics()`. В качестве аргумента принимается экземпляр класса с реализованным интерфейсом `AnalyticsInterface`.

[Официальная документация](https://yandex.ru/dev/turbo/doc/settings/analytics-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Articles;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Custom\Custom;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Google\Google;
use Mireon\YandexTurbo\Channels\Articles\Analytic\LiveInternet\LiveInternet;
use Mireon\YandexTurbo\Channels\Articles\Analytic\MailRu\MailRu;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Mediascope\Mediascope;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Rambler\Rambler;
use Mireon\YandexTurbo\Channels\Articles\Analytic\Yandex\Yandex;

Articles::create()
    ->analytic(Custom::create('url'))
    ->analytic(Google::create('id'))
    ->analytic(LiveInternet::create('params'))
    ->analytic(MailRu::create('id'))
    ->analytic(Mediascope::create('id'))
    ->analytic(Rambler::create('id'))
    ->analytic(Yandex::create('id', 'params'));

Articles::create()
    ->analytics(Analytics::create([
        Custom::create('url'),
        Google::create('id'),
        LiveInternet::create('params'),
        MailRu::create('id'),
        Mediascope::create('id'),
        Rambler::create('id'),
        Yandex::create('id', 'params'),
    ]));
```

### Добавление информации о статьях

Элементы с информацией о статьях можно добавлять двумя способами:
1. По одному экземпляру с помощью метода `Articles::item()`. В качестве аргумента принимается экземпляр класса с реализованным интерфейсом `ItemInterface`.
2. Набором с помощью метода `Articles::items()`. В качестве аргумента принимается экземпляр класса с реализованным интерфейсом `ItemsInterface`.

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Articles;
use Mireon\YandexTurbo\Channels\Articles\Item\Item;
use Mireon\YandexTurbo\Channels\Articles\Item\Items;

Articles::create()
    ->item(Item::create('link', 'content'))
    ->item(Item::create('link', 'content'))
    ->item(Item::create('link', 'content'));

Articles::create()
    ->items(Items::create([
        Item::create('link', 'content'),   
        Item::create('link', 'content'),   
        Item::create('link', 'content'),
    ]));

Articles::create()
    ->items(Items::createFromClosure(function (Items $items) {
        Item::create('link', 'content')->appendTo($items);
        Item::create('link', 'content')->appendTo($items);
        Item::create('link', 'content')->appendTo($items);
    }));
```

## Информация о статье

Помимо базовых данных о статье таких как `автор` или `ссылка` стоит обратить внимание на метод `Item::relatedLinks`. Этот метод добавляет ссылки на другие ресурсы. В RSS-ленте ссылки выводятся в тегах `<yandex:related type="infinity"></yandex:related>` и `<yandex:related></yandex:related>` Подробнее в [Разметка RSS-канала](https://yandex.ru/dev/turbo/doc/rss/example-docpage/).

Содержимое страницы передается в метод `Item::content()`. Для этого используйте класс `Content` как показанно в примере ниже. Основными элементами этого класса являются блоки. Подробнее о блоках ниже.

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Item;
use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Metrics;
use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Breadcrumb;
use Mireon\YandexTurbo\Channels\Articles\Item\Metrics\Yandex\Yandex;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\RelatedLinks;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\Infinity\Link as InfinityLink;
use Mireon\YandexTurbo\Channels\Articles\Item\RelatedLinks\External\Link as ExternalLink;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Content;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header;

Item::create()
    ->turbo(true)
    ->link('url')
    ->source('url')
    ->topic('topic')
    ->pubDate('date')
    ->author('author')
    ->metrics(Metrics::create()
        ->metric(Yandex::create()
            ->id('123456')
            ->breadcrumb(Breadcrumb::create('text', 'url'))
            ->breadcrumb(Breadcrumb::create('text', 'url'))
        )
    )
    ->relatedLinks(RelatedLinks::create()
        ->link(InfinityLink::create('url'))
        ->link(ExternalLink::create('text', 'url', 'url'))
    )
    ->content(Content::create()
        ->block(Header::create()->title('title')->preview('url'))
        ->html('<div>Text</div>')
    );
```

## Блоки для содержимого статьи 

Все блоки размещаются в контентной части элемента.

### Блок "Шапка страницы"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/header-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Header;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Menu;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Menu\Link as MenuLink;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Breadcrumbs;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Header\Breadcrumbs\Link as BreadcrumbsLink;

Header::create()
    ->title('text')
    ->subTitle('text')
    ->preview('url')
    ->menu(Menu::create()
        ->link(MenuLink::create('text', 'url'))
        ->link(MenuLink::create('text', 'url'))
        ->link(MenuLink::create('text', 'url'))
    )
    ->breadcrumbs(Breadcrumbs::create()
        ->link(BreadcrumbsLink::create('text', 'url'))
        ->link(BreadcrumbsLink::create('text', 'url'))
        ->link(BreadcrumbsLink::create('text', 'url'))
    );
```

### Блок "Аккордеон"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/accordion-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Accordion;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Accordion\Item;

Accordion::create()
    ->item(Item::create('title', 'content'))
    ->item(Item::create('title', 'content'))
    ->item(Item::create('title', 'content'));
```

### Блок "Аудио"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/audio-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Audio\Audio;

Audio::create()->src('url');
```

### Блок "Слайдер"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/slider-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Slider;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Ad\Ad;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Image\Image;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Slider\Video\Video;

Slider::create()
    ->view(Slider::VIEW_LANDSCAPE)
    ->header('text')
    ->item(Ad::create()->turboAdId('turbo-ad-id'))
    ->item(Image::create()->image('url')->caption('text'))
    ->item(Video::create()
       ->width(400)
       ->height(200)
       ->source('url')
       ->type('mp4')
       ->duration(5)
       ->title('text')
       ->preview('url')
       ->caption('text')
    );
```

### Блок "Карточки" с вертикальной прокруткой

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/cards-docpage/#card)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Cards;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Cards\Item;

Cards::create()
    ->item(Item::create()
        ->headerImage('url')
        ->headerTitle('text')
        ->content('text')
        ->footerUrl('url')
        ->footerText('text')
        ->moreUrl('url')
        ->moreText('text')
    );
```

### Блок "Карточки" с горизонтальной прокруткой

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/cards-docpage/#carousel)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Carousel;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Carousel\Item;

Carousel::create()
    ->header('text')
    ->item(Item::create()->title('text')->image('url')->url('url'));
```

### Блок "Читать еще"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/fold-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Fold\Fold;
use Mireon\YandexTurbo\Converter\StripTags;

Fold::create()->content('text')->converters([StripTags::class]);
```

### Блок "Читать также"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/read-also-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Feed;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feed\Item;

Feed::create()
    ->layout(Feed::LAYOUT_VERTICAL)
    ->title('text')
    ->item(Item::create()
        ->title('text')
        ->description('text')
        ->href('url')
        ->thumb('url')
        ->thumbPosition(Item::POSITION_RIGHT)
        ->thumbRatio(Item::RATIO_4x3)
    );
```

### Рекламный блок в контенте

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/ads-docpage/#in-content)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInContent;

AdInContent::create()->turboAdId('id')->mobile(true)->desktop(true);
```

### Рекламный блок "InPage"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/ads-docpage/#inpage)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Ad\AdInPage;

AdInPage::create()->turboAdId('id')->turboInPageAdId('id');
```

### Блок "Кнопка"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/buttons-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Button\Button;

Button::create()
    ->formaction('action')
    ->text('text')
    ->background('color')
    ->color('color')
    ->turbo(true)
    ->primary(false)
    ->disabled(false);
```

### Блок "Поиск"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/search-block-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Search\Search;

Search::create()->action('action')->name('name')->placeholder('text');
```

### Блок "Рейтинг"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/rating-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Rating\Rating;

Rating::create()->value(5)->best(10);
```

### Блок "Обратная связь"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/feedback-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Feedback;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Feedback\Item;

Feedback::create()
    ->title('text')
    ->stick(Feedback::STICK_RIGHT)
    ->item(Item::create()
        ->type(Item::TYPE_CALLBACK)
        ->url('url')
        ->sendTo('email')
        ->agreementCompany('company')
        ->agreementLink('url')
    );
```

### Блок "Поделиться"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/share-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Share\Share;

Share::create()
    ->network(Share::NETWORK_FACEBOOK)
    ->network(Share::NETWORK_ODNOKLASSNIKI)
    ->network(Share::NETWORK_TELEGRAM)
    ->network(Share::NETWORK_TWITTER)
    ->network(Share::NETWORK_VKONTAKTE);
```

### Блок "Комментарии"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/comments-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comments;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Comments\Comment;

Comments::create()
    ->url('url')
    ->item(Comment::create()
        ->author('text')
        ->subTitle('text')
        ->header('text')
        ->content('text')
        ->avatar('url')
    );
```

### Блок "Обратная связь"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/fos-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Callback\Callback;

Callback::create()
    ->sendTo('email')
    ->agreement('company', 'url');
```

### Блок "Динамическая форма"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/dynamic-form-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\DynamicForm;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox\Checkbox;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input\Input;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Radio;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio\Option as RadioOption;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Select;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select\Option as SelectOption;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea\Textarea;

DynamicForm::create()
    ->endPoint('url')
    ->item(Checkbox::create()
        ->name('text')
        ->value('text')
        ->content('text')
    )
    ->item(Input::create()
        ->type(Input::TYPE_TEXT)
        ->name('text')
        ->label('text')
        ->placeholder('text')
        ->required(true)
    )
    ->item(Radio::create()
        ->name('text')
        ->label('text')
        ->option(RadioOption::create()->label('text')->value('text')->meta('text')->checked(true))
        ->option(RadioOption::create()->label('text')->value('text')->meta('text'))
        ->option(RadioOption::create()->label('text')->value('text')->meta('text'))
    )
    ->item(Select::create()
        ->name('text')
        ->label('text')
        ->value('text')
        ->option(SelectOption::create()->text('text')->value('text'))
        ->option(SelectOption::create()->text('text')->value('text'))
        ->option(SelectOption::create()->text('text')->value('text'))
    )
    ->item(Textarea::create()
        ->name(Input::TYPE_TEXT)
        ->label('text')
        ->placeholder('text')
        ->required('text')
    );
```

### Блок "Гистограмма"

[Официальная документация](https://yandex.ru/dev/turbo/doc/rss/elements/histogram-docpage/)

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Histogram;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Histogram\Item;

Histogram::create()
    ->item(Item::create()
        ->title('text')
        ->value(10)
        ->height(50)
        ->icon('url')
        ->color('color')
    );
```

### Блок HTML разметки

Блок принимает любые данные в виде строки. К этой строке можно применить обработчики. Например, обработчик `StripTag` удаляет все теги. Создавайте свои собственные обработчики реализуя интерфейс `ConverterInterface`.

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\Html\Html;
use Mireon\YandexTurbo\Converter\StripTags;
use Mireon\YandexTurbo\Converter\WrapP;

Html::create()
    ->html('<div>Hello world!</div>')
    ->converters([StripTags::class, WrapP::class]);
```

## Вывод канала

Метод `Articles::render()` возвращает канал в виде строки.

```php
<?php

use Mireon\YandexTurbo\Channels\Articles\Articles;

header('Content-Type: text/xml; charset=utf-8');

print Articles::create()->render();
```

## Тесты

```sh
$ composer test
```

## Лицензия

Все содержимое этого пакета лицензируется в соответствии с [MIT license](https://opensource.org/licenses/MIT).

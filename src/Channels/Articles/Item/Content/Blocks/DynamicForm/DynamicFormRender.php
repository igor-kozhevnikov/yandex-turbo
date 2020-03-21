<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm;

use Mireon\YandexTurbo\Helpers\Tag\Tag;

/**
 * The renderer for the "DynamicForm" block.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm
 */
class DynamicFormRender
{
    /**
     * Renders the "DynamicForm" block.
     *
     * @param DynamicForm $data
     *   The "DynamicForm" block.
     *
     * @codeCoverageIgnore
     *
     * @return string|null
     */
    public function render(DynamicForm $data): ?string
    {
        $form = Tag::create('form')
            ->attribute('data-type', 'dynamic-form')
            ->attribute('end_point', $data->getEndPoint());

        Tag::create('div')
            ->attribute('type', 'input-block')
            ->content($data->getItems(), fn(ItemInterface $item) => $item->isValid() ? $item->render() : null)
            ->appendTo($form);

        Tag::create('div')
            ->attribute('type', 'result-block')
            ->content(Tag::create('span')->attribute('type', 'text')->attribute('field', 'description'))
            ->content(Tag::create('span')->attribute('type', 'link')->attribute('field', 'link'))
            ->appendTo($form);

        return $form;
    }
}

<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\ItemInterface;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The "Checkbox" item of the "Dynamic form" block.
 *
 * @method self name(?string $name)
 *   Sets the name.
 * @method self value(?string $value)
 *   Sets the value.
 * @method self content(?string $content)
 *   Sets the content.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Checkbox
 */
 class Checkbox extends BlockIterableItem implements ItemInterface
{
    use Renderer;

     /**
      * The name.
      *
      * @var string|null
      */
     private ?string $name = null;

     /**
      * The content.
      *
      * @var string|null
      */
     private ?string $content = null;

     /**
      * The value.
      *
      * @var string|null
      */
     public ?string $value = null;

     /**
      * The constructor.
      *
      * @param string|null $name
      *   A name.
      * @param string|null $value
      *   A value.
      */
     public function __construct(?string $name = null, ?string $value = null)
     {
         $this->setRenderer(CheckboxRender::class);
         $this->setName($name);
         $this->setValue($value);
     }

     /**
      * Sets a name.
      *
      * @param string|null $name
      *   A name.
      *
      * @return void
      */
     public function setName(?string $name): void
     {
         $this->name = $name ?: null;
     }

     /**
      * Indicates if a name is set.
      *
      * @return bool
      */
     public function hasName(): bool
     {
         return !is_null($this->name);
     }

     /**
      * Returns a name.
      *
      * @return string|null
      */
     public function getName(): ?string
     {
         return $this->name;
     }

     /**
      * Sets a content.
      *
      * @param string|null $content
      *   A content.
      *
      * @return void
      */
     public function setContent(?string $content): void
     {
         $this->content = $content ?: null;
     }

     /**
      * Indicates if a content is set.
      *
      * @return bool
      */
     public function hasContent(): bool
     {
         return !is_null($this->content);
     }

     /**
      * Returns a content.
      *
      * @return string|null
      */
     public function getContent(): ?string
     {
         return $this->content;
     }

     /**
      * Sets a value.
      *
      * @param string|null $value
      *   A value.
      *
      * @return void
      */
     public function setValue(?string $value): void
     {
         $this->value = $value ?: null;
     }

     /**
      * Indicates if a value is set.
      *
      * @return bool
      */
     public function hasValue(): bool
     {
         return !is_null($this->value);
     }

     /**
      * Returns a value.
      *
      * @return string|null
      */
     public function getValue(): ?string
     {
         return $this->value;
     }

     /**
      * @inheritDoc
      */
     public function isValid(): bool
     {
         return $this->hasName() && $this->hasValue();
     }
 }

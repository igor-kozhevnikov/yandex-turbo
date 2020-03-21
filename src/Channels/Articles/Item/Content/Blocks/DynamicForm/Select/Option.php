<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select;

use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;

/**
 * The option of the item "Select" of the "Dynamic form" block.
 *
 * @method self text(?string $text)
 *   Sets the text.
 * @method self value(?string $value)
 *   Sets the value.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Select
 */
 class Option
{
    use Creator;
    use MagicSetter;

     /**
      * The text.
      *
      * @var string|null
      */
     private ?string $text = null;

     /**
      * The value.
      *
      * @var string|null
      */
     private ?string $value = null;

     /**
      * The constructor.
      *
      * @param string|null $text
      *   A text.
      * @param string|null $value
      *   A value.
      */
     public function __construct(?string $text = null, ?string $value = null)
     {
         $this->setText($text);
         $this->setValue($value);
     }

     /**
      * Sets a text.
      *
      * @param string|null $text
      *   A text.
      *
      * @return void
      */
     public function setText(?string $text): void
     {
         $this->text = $text ?: null;
     }

     /**
      * Indicates if a text is set.
      *
      * @return bool
      */
     public function hasText(): bool
     {
         return !is_null($this->text);
     }

     /**
      * Returns a text.
      *
      * @return string|null
      */
     public function getText(): ?string
     {
         return $this->text;
     }

     /**
      * Sets value.
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
      * Indicates if an option is valid.
      *
      * @return bool
      */
     public function isValid(): bool
     {
         return $this->hasText() && $this->hasValue();
     }

     /**
      * Adds an option.
      *
      * @param Select $select
      *   A "Select" item of the "Dynamic form" block.
      *
      * @return void
      */
     public function appendTo(Select $select): void
     {
         $select->addOption($this);
     }
 }

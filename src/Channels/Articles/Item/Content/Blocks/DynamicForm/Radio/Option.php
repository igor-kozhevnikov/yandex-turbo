<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio;

use Mireon\YandexTurbo\Traits\Creator;
use Mireon\YandexTurbo\Traits\MagicSetter;

/**
 * The option of the item "Radio" of the "Dynamic form" block.
 *
 * @method self value(?string $value)
 *   Sets the value.
 * @method self label(?string $label)
 *   Sets the label.
 * @method self meta(?string $meta)
 *   Sets the meta.
 * @method self checked(bool $isChecked)
 *   Sets the checked.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio
 */
 class Option
{
    use Creator;
    use MagicSetter;

     /**
      * The value.
      *
      * @var string|null
      */
     private ?string $value = null;

     /**
      * The label.
      *
      * @var string|null
      */
     private ?string $label = null;

     /**
      * The meta.
      *
      * @var string|null
      */
     private ?string $meta = null;

     /**
      * The checked.
      *
      * @var bool
      */
     private bool $checked = false;

     /**
      * The constructor.
      *
      * @param string|null $value
      *   A value.
      * @param string|null $label
      *   A label.
      * @param string|null $meta
      *   A meta.
      */
     public function __construct(?string $value = null, ?string $label = null, ?string $meta = null) {
         $this->setValue($value);
         $this->setLabel($label);
         $this->setMeta($meta);
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
      * Sets a label.
      *
      * @param string|null $label
      *   A label.
      *
      * @return void
      */
     public function setLabel(?string $label): void
     {
         $this->label = $label ?: null;
     }

     /**
      * Indicates if a label is set.
      *
      * @return bool
      */
     public function hasLabel(): bool
     {
         return !is_null($this->label);
     }

     /**
      * Returns a label.
      *
      * @return string|null
      */
     public function getLabel(): ?string
     {
         return $this->label;
     }

     /**
      * Sets a meta.
      *
      * @param string|null $meta
      *   A meta.
      *
      * @return void
      */
     public function setMeta(?string $meta): void
     {
         $this->meta = $meta ?: null;
     }

     /**
      * Indicates if a meta is set.
      *
      * @return bool
      */
     public function hasMeta(): bool
     {
         return !is_null($this->meta);
     }

     /**
      * Returns a meta.
      *
      * @return string|null
      */
     public function getMeta(): ?string
     {
         return $this->meta;
     }

     /**
      * Sets a checked.
      *
      * @param bool $checked
      *   A checked.
      *
      * @return void
      */
     public function setChecked(bool $checked): void
     {
         $this->checked = $checked;
     }

     /**
      * Indicates if a checked is set.
      *
      * @return bool
      */
     public function isChecked(): bool
     {
         return $this->checked;
     }

     /**
      * Returns a checked.
      *
      * @return string|null
      */
     public function getChecked(): ?string
     {
         return $this->checked ? 'true' : 'false';
     }

     /**
      * Indicates if an option is valid.
      *
      * @return bool
      */
     public function isValid(): bool
     {
         return $this->hasValue() && $this->hasLabel() && $this->hasMeta();
     }

     /**
      * Adds an option.
      *
      * @param Radio $radio
      *   A "Radio" item of the "Dynamic form" block.
      *
      * @return void
      */
     public function appendTo(Radio $radio): void
     {
         $radio->addOption($this);
     }
 }

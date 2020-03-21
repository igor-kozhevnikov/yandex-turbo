<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\ItemInterface;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The "Textarea" item of the "Dynamic form" block.
 *
 * @method self name(?string $name)
 *   Sets the name.
 * @method self label(?string $label)
 *   Sets the label.
 * @method self required(bool $required)
 *   Sets the required input.
 * @method self placeholder(?string $placeholder)
 *   Sets the placeholder.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Textarea
 */
 class Textarea extends BlockIterableItem implements ItemInterface
{
    use Renderer;

     /**
      * The name.
      *
      * @var string|null
      */
     private ?string $name = null;

     /**
      * The label.
      *
      * @var string|null
      */
     private ?string $label = null;

     /**
      * The placeholder.
      *
      * @var string|null
      */
     private ?string $placeholder = null;

     /**
      * Indicates if an input is required.
      *
      * @var bool
      */
     public bool $required = true;

     /**
      * The constructor.
      *
      * @param string|null $name
      *   A name.
      * @param string|null $label
      *   A label.
      */
     public function __construct(?string $name = null, ?string $label = null) {
         $this->setRenderer(TextareaRender::class);
         $this->setName($name);
         $this->setLabel($label);
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
      * Sets placeholder.
      *
      * @param string|null $placeholder
      *   A placeholder.
      *
      * @return void
      */
     public function setPlaceholder(?string $placeholder): void
     {
         $this->placeholder = $placeholder ?: null;
     }

     /**
      * Indicates if a place holder is set.
      *
      * @return bool
      */
     public function hasPlaceholder(): bool
     {
         return !is_null($this->placeholder);
     }

     /**
      * Returns a placeholder.
      *
      * @return string|null
      */
     public function getPlaceholder(): ?string
     {
         return $this->placeholder;
     }

     /**
      * Sets a required input.
      *
      * @param bool $required
      *   A required input.
      *
      * @return void
      */
     public function setRequired(bool $required): void
     {
         $this->required = $required;
     }

     /**
      * Indicates if a required is set.
      *
      * @return bool
      */
     public function isRequired(): bool
     {
         return $this->required;
     }

     /**
      * Returns a required input.
      *
      * @return string
      */
     public function getRequired(): string
     {
         return $this->required ? 'true' : 'false';
     }

     /**
      * @inheritDoc
      */
     public function isValid(): bool
     {
         return $this->hasName() && $this->hasLabel();
     }
 }

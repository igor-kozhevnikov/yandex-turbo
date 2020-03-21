<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input;

use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\ItemInterface;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The "Input" item of the "Dynamic form" block.
 *
 * @method self type(?string $type)
 *   Sets the input type.
 * @method self name(?string $name)
 *   Sets the name.
 * @method self label(?string $label)
 *   Sets the label.
 * @method self required(bool $required)
 *   Sets the required input.
 * @method self placeholder(?string $placeholder)
 *   Sets the placeholder.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Input
 */
 class Input extends BlockIterableItem implements ItemInterface
{
    use Renderer;

     /**
      * The "text" input type.
      */
    public const TYPE_TEXT = 'text';

     /**
      * The "date" input type.
      */
     public const TYPE_DATE = 'date';

     /**
      * The "number" input type.
      */
     public const TYPE_NUMBER = 'number';

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
      * The input type.
      *
      * Options:
      *   - text (default)
      *   - date
      *   - number
      *
      * @var string
      */
     private string $type = self::TYPE_TEXT;

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
      * @param string|null $type
      *   A input type.
      * @param string|null $name
      *   A name
      * @param string|null $label
      *   A label.
      */
     public function __construct(?string $type = null, ?string $name = null, ?string $label = null) {
         $this->setRenderer(InputRender::class);
         $this->setType($type);
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
      * Sets a input type.
      *
      * @param string|null $type
      *   A input type.
      *
      * @return void
      */
     public function setType(?string $type): void
     {
         switch ($type) {
             case self::TYPE_TEXT:
             case self::TYPE_DATE:
             case self::TYPE_NUMBER:
                 $this->type = $type;
                 break;
             default:
                 $this->type = self::TYPE_TEXT;
         }
     }

     /**
      * Indicates if a input type is set.
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
      * @return string
      */
     public function getType(): string
     {
         return $this->type;
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
      * Indicates if a placeholder is set.
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
         return $this->hasName() && $this->hasLabel() && $this->hasType();
     }
}

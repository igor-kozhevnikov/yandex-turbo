<?php

namespace Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio;

use ArrayIterator;
use IteratorAggregate;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\BlockIterableItem;
use Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\ItemInterface;
use Mireon\YandexTurbo\Traits\Renderer;

/**
 * The "Radio" item of the "Dynamic form" block.
 *
 * @method self name(?string $name)
 *   Sets the name.
 * @method self label(?string $label)
 *   Sets the label.
 * @method self options(?array $options)
 *   Sets the list of options.
 * @method self option(?Option $option)
 *   Add an options to the list.
 *
 * @package Mireon\YandexTurbo\Channels\Articles\Item\Content\Blocks\DynamicForm\Radio
 */
 class Radio extends BlockIterableItem implements ItemInterface, IteratorAggregate
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
      * The list of options.
      *
      * @var Option[]
      */
     private array $options = [];

     /**
      * The constructor.
      *
      * @param string|null $name
      *   A name.
      * @param string|null $label
      *   A label.
      * @param array|null $options
      *   An array of options.
      */
     public function __construct(?string $name = null, ?string $label = null, ?array $options = null)
     {
         $this->setRenderer(RadioRender::class);
         $this->setName($name);
         $this->setLabel($label);
         $this->setOptions($options);
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
      * Sets options.
      *
      * @param Option[]|null $options
      *   A list of options.
      *
      * @return void
      */
     public function setOptions(?array $options): void
     {
         $this->options = [];

         if (empty($options)) {
             return;
         }

         foreach ($options as $option) {
             $this->addOption($option);
         }
     }

     /**
      * Adds an option.
      *
      * @param Option|null $option
      *   An option.
      *
      * @return void
      */
     public function addOption(?Option $option): void
     {
         if (!is_null($option)) {
             $this->options[] = $option;
         }
     }

     /**
      * Indicates if options is set.
      *
      * @return bool
      */
     public function hasOptions(): bool
     {
         return !empty($this->options);
     }

     /**
      * Returns a list of options.
      *
      * @return Option[]
      */
     public function getOptions(): array
     {
         return $this->options;
     }

     /**
      * @inheritDoc
      */
     public function isValid(): bool
     {
         return $this->hasName() && $this->hasLabel() && $this->hasOptions();
     }

     /**
      * @inheritDoc
      */
     public function getIterator()
     {
         return new ArrayIterator($this->options);
     }
 }

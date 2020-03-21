<?php

namespace Mireon\YandexTurbo\Helpers\Tag;

use Closure;
use Mireon\YandexTurbo\Helpers\Str;
use Mireon\YandexTurbo\Traits\Creator;

/**
 * The tag.
 *
 * @package Mireon\YandexTurbo\Helpers
 */
class Tag
{
    use Creator;

    /**
     * The tag.
     *
     * @var string|null $tag
     */
    private ?string $tag = null;

    /**
     * The associative array of attributes.
     *
     * @var array $attributes
     */
    private array $attributes = [];

    /**
     * The content list.
     *
     * @var array $content
     */
    private array $content = [];

    /**
     * The type tag.
     *
     * @var bool $isEmptyTag
     *   If false, the tag must have a closing tag.
     */
    private bool $isEmptyTag = false;

    /**
     * The constructor.
     *
     * @param string|null $tag
     *   A tag.
     */
    public function __construct(?string $tag = null)
    {
        $this->tag($tag);
    }

    /**
     * Sets the title.
     *
     * @param string|null $tag
     *   A tag.
     *
     * @return self
     */
    public function tag(?string $tag): self
    {
        $this->tag = !empty($tag) ? Str::lower($tag) : null;

        return $this;
    }

    /**
     * Adds an attribute.
     *
     * @param string|null $name
     *   A name of an attribute.
     * @param string|null $value
     *   A value of an attribute.
     * @param bool $isAdd
     *   An additional parameter to allow adding. If true, an attribute is added to the tag.
     *
     * @return self
     */
    public function attribute(?string $name, ?string $value, bool $isAdd = true): self
    {
        if (!$isAdd) { return $this; }
        if (empty($name) || empty($value)) { return $this; }

        $name = Str::lower($name);
        $value = Str::e($value);

        $this->attributes[$name] = $value;

        return $this;
    }

    /**
     * Adds an item of content to tag.
     *
     * @param mixed $content
     *   A content of tag.
     * @param Closure|null $function
     *   A function for process an item from an array.
     *
     * @return self
     */
    public function content($content, ?Closure $function = null): self
    {
        if (is_scalar($content)) {
            $this->content[] = (string) $content;
        } elseif (is_object($content) && method_exists($content, '__toString')) {
            $this->content[] = $content;
        } elseif (is_array($content) && !empty($content)) {
            foreach ($content as $item) {
                is_null($function) ? $this->content($item) : $this->content($function($item));
            }
        }

        return $this;
    }

    /**
     * Sets a tag type.
     *
     * @param bool $isEmptyTag
     *   A tag type.
     *
     * @return self
     */
    public function empty(bool $isEmptyTag = true): self
    {
        $this->isEmptyTag = $isEmptyTag;

        return $this;
    }

    /**
     * Adds this tag to other tag.
     *
     * @param Tag|Group|string $container
     *   A container for this tag.
     *
     * @return self
     */
    public function appendTo(&$container): self
    {
        if ($container instanceof Tag) {
            $container->content($this);
        } elseif ($container instanceof Group) {
            $container->tag($this);
        } elseif (is_string($container) || is_null($container)) {
            $container .= $this;
        }

        return $this;
    }

    /**
     * Renders a tag.
     *
     * @return string|null
     */
    public function render(): ?string
    {
        if (empty($this->tag)) { return null; }

        $open = $this->getOpenTag();
        $content = $this->getContent();
        $close = $this->getCloseTag();

        return $open . $content . $close;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->render() ?? '';
    }

    /**
     * Returns the opening tag.
     *
     * @return string
     */
    private function getOpenTag(): string
    {
        $start = "<$this->tag";
        $attributes = $this->getAttributes();
        $closer = $this->isEmptyTag ? ' />' : '>';

        return $start . $attributes . $closer;
    }

    /**
     * Returns attributes.
     *
     * @return string
     */
    private function getAttributes(): string
    {
        if (empty($this->attributes)) {
            return '';
        }

        $attributes = array_map(function ($name, $value) {
            return "$name=\"$value\"";
        }, array_keys($this->attributes), $this->attributes);

        return ' ' . implode(' ', $attributes);
    }

    /**
     * Returns the content.
     *
     * @return string
     */
    private function getContent(): string
    {
        if (empty($this->content) || $this->isEmptyTag) {
            return '';
        }

        return array_reduce($this->content, fn($output, $content) => $output . $content);
    }

    /**
     * Returns the closing tag.
     *
     * @return string
     */
    private function getCloseTag(): string
    {
        return $this->isEmptyTag ? '' : "</$this->tag>";
    }
}

<?php

namespace Mireon\YandexTurbo\Traits;

/**
 * This feature makes it possible to render an object.
 *
 * @package Mireon\YandexTurbo\Traits
 */
trait Renderer
{
    /**
     * The renderer.
     *
     * @var mixed $renderer
     */
    private $renderer;

    /**
     * Sets the renderer.
     *
     * @param mixed $renderer
     *   A renderer.
     *
     * @return void
     */
    public function setRenderer($renderer): void
    {
        if (is_string($renderer) && class_exists($renderer)) {
            $renderer = new $renderer();
        }

        $this->renderer = is_object($renderer) && method_exists($renderer, 'render') ? $renderer : null;
    }

    /**
     * Checks if the renderer is assigned.
     *
     * @return bool
     */
    public function hasRenderer(): bool
    {
        return !is_null($this->renderer);
    }

    /**
     * Returns the renderer.
     *
     * @return mixed
     */
    public function getRenderer()
    {
        return $this->renderer;
    }

    /**
     * Renders an object.
     *
     * @return string|null
     */
    public function render(): ?string
    {
        if (!$this->hasRenderer()) {
            return null;
        }

        return $this->renderer->render($this);
    }
}

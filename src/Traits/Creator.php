<?php

namespace Mireon\YandexTurbo\Traits;

use Closure;
use Mireon\YandexTurbo\Helpers\Str;

/**
 * The factory methods for the class.
 *
 * @package Mireon\YandexTurbo\Traits
 */
trait Creator
{
    /**
     * Creates an instance class.
     *
     * @param array $arguments
     *   An array of arguments.
     *
     * @return static
     */
    public static function create(...$arguments): self
    {
        return new static(...$arguments);
    }

    /**
     * Creates an instance of the class and sets data.
     *
     * @param array|null $arguments
     *   An associative array of properties and their values.
     *
     * @return static
     */
    public static function createFromArray(?array $arguments): self
    {
        $class = new static();

        if (empty($arguments)) {
            return $class;
        }

        foreach ($arguments as $key => $value) {
            $method = 'set' . Str::studly($key);

            if (method_exists($class, $method)) {
                $class->$method($value);
            }
        }

        return $class;
    }

    /**
     * Creates an instance of the class and uses a function for the newly created class.
     *
     * @param Closure|null $function
     *   The function to applying to the instance.
     *
     * @return static
     */
    public static function createFromClosure(?Closure $function): self
    {
        $class = new static();

        if (is_null($function)) {
            return $class;
        }

        $function($class);

        return $class;
    }
}

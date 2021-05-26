<?php

namespace dynamikaweb\fc;

class FactoryComponent
{
    /**
     * @param string $class
     * @param Closure $closure
     * @return Closure
     */
    public static function build($class, $closure)
    {
        return function () use ($class, $closure) {
            $class = new $class(call_user_func($closure));
            return $class;
        };
    }
}
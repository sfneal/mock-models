<?php

namespace Sfneal\Testing\Utils\Traits;

trait InterfaceTest
{
    // todo: add tests

    use AssertInterface;

    /**
     * Retrieve the interface class that should be tested.
     *
     * @return string
     */
    abstract public function interface(): string;

    /**
     * Retrieve an array of classes that should implement the interface.
     *
     * @return array
     */
    abstract public function classes(): array;

    /**
     * Retrieve an array of method names that should exist in the interface.
     *
     * @return array
     */
    abstract public function methods(): array;
}

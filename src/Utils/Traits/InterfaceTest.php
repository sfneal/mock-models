<?php

namespace Sfneal\Testing\Utils\Traits;

trait InterfaceTest
{
    // todo: add tests

    /** @test */
    public function interface_exist()
    {
        $this->assertTrue(interface_exists($this->interface()));
    }

    /** @test */
    public function interface_is_implemented()
    {
        foreach ($this->classes() as $class) {
            $this->assertArrayHasKey($this->interface(), class_implements($class));
        }
    }

    /** @test */
    public function interface_methods_exist()
    {
        foreach ($this->methods() as $method) {
            $this->assertTrue(method_exists($this->interface(), $method));
        }
    }

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

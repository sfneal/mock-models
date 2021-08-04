<?php

namespace Sfneal\Testing\Utils\Traits;

trait AssertInterface
{
    /** @test */
    public function interface_exist()
    {
        $this->assertTrue(
            interface_exists($this->interface()),
            "The interface '{$this->interface()}' does not exist"
        );
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
            $this->assertTrue(
                method_exists($this->interface(), $method),
                "The interface '{$this->interface()}' does not have the method '{$method}'"
            );
        }
    }
}

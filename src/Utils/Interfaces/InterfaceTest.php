<?php


namespace Sfneal\Testing\Utils\Interfaces;


interface InterfaceTest
{
    // todo: add tests

    /** @test */
    public function interface_exist();

    /** @test */
    public function interface_is_implemented();

    /** @test */
    public function interface_methods_exist();

    /**
     * Retrieve an array of classes that should implement the interface.
     *
     * @return array
     */
    public function classes(): array;

    /**
     * Retrieve an array of method names that should exist in the interface.
     *
     * @return array
     */
    public function methods(): array;
}

<?php


namespace Sfneal\Testing\Tests;


use Sfneal\Testing\Utils\Interfaces\MiddlewareEnabler;
use Sfneal\Testing\Utils\Traits\InterfaceTest;

class InterfaceTestTest extends TestCase
{
    use InterfaceTest;

    /**
     * Retrieve the interface class that should be tested.
     *
     * @return string
     */
    public function interface(): string
    {
        return MiddlewareEnabler::class;
    }

    /**
     * Retrieve an array of classes that should implement the interface.
     *
     * @return array
     */
    public function classes(): array
    {
        return [
            MiddlewareEnablerTest::class
        ];
    }

    /**
     * Retrieve an array of method names that should exist in the interface.
     *
     * @return array
     */
    public function methods(): array
    {
        return [
            'enableMiddleware'
        ];
    }
}

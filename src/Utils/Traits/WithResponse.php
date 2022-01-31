<?php

namespace Sfneal\Testing\Utils\Traits;

use Illuminate\Testing\TestResponse;

trait WithResponse
{
    /**
     * @var string Name of the route
     */
    protected $routeName;

    /**
     * @var array Params to pass to the route
     */
    protected $routeParams = [];

    /**
     * @var TestResponse
     */
    protected $response;


    /**
     * Retrieve a 'GET' response using route & params
     *
     * @return TestResponse
     */
    protected function getResponse(): TestResponse
    {
        return $this->get(route($this->routeName, $this->routeParams));
    }
}

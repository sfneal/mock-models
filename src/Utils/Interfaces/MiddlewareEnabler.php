<?php

namespace Sfneal\Testing\Utils\Interfaces;

interface MiddlewareEnabler
{
    /**
     * Enable TrackTraffic middleware.
     *
     * @param array|string|null $middleware
     * @param string $uri
     * @param string $response
     * @return \Illuminate\Routing\Route
     */
    public function enableMiddleware($middleware, string $uri = '/', string $response = 'OK'): \Illuminate\Routing\Route;
}

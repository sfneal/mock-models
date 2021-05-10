<?php


namespace Sfneal\Testing\Utils\Traits;


use Illuminate\Support\Facades\Route;

trait EnableMiddleware
{
    /**
     * Enable TrackTraffic middleware.
     *
     * @param array|string|null $middleware
     * @param string $uri
     * @param string $response
     * @return \Illuminate\Routing\Route
     */
    public function enableMiddleware($middleware, string $uri = '/', string $response = 'OK'): \Illuminate\Routing\Route
    {
        return Route::middleware($middleware)
            ->any($uri, function () use ($response) {
                return $response;
            });
    }
}

<?php

namespace Sfneal\Testing\Tests;

use Illuminate\Routing\Route;
use PHPUnit\Framework\Attributes\Test;
use Sfneal\Testing\Tests\Mocks\MockMiddleware;
use Sfneal\Testing\Utils\Interfaces\MiddlewareEnabler;
use Sfneal\Testing\Utils\Traits\EnableMiddleware;

class MiddlewareEnablerTest extends TestCase implements MiddlewareEnabler
{
    use EnableMiddleware;

    #[Test]
    public function middleware_can_be_enabled()
    {
        $uri = '/';
        $response = 'OK';
        $route = $this->enableMiddleware(MockMiddleware::class, $uri, $response);

        $this->assertNotNull($route);
        $this->assertInstanceOf(Route::class, $route);

        $testResponse = $this->get($uri);
        $testResponse->assertSee($response);
    }
}

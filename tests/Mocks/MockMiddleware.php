<?php

namespace Sfneal\Testing\Tests\Mocks;

use Closure;
use Illuminate\Http\Request;

class MockMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Return the response
        return $next($request);
    }
}

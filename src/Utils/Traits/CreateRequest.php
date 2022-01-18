<?php

namespace Sfneal\Testing\Utils\Traits;

use Illuminate\Http\Request;

trait CreateRequest
{
    /**
     * Create a Request to be used in test methods.
     *
     * @param  array  $headers
     * @param  array  $parameters
     * @param  array  $cookies
     * @param  array  $files
     * @param  array  $server
     * @param  null  $content
     * @return Request
     */
    public function createRequest(array $headers = [],
                                  array $parameters = [],
                                  array $cookies = [],
                                  array $files = [],
                                  array $server = [],
                                  $content = null): Request
    {
        $request = Request::create('/', 'GET', $parameters, $cookies, $files, $server, $content);

        foreach ($headers as $header => $value) {
            $request->headers->set($header, $value);
        }

        return $request;
    }
}

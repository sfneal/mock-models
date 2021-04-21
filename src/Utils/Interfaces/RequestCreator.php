<?php


namespace Sfneal\Testing\Utils\Interfaces;


use Illuminate\Http\Request;

interface RequestCreator
{
    /**
     * Create a Request to be used in test methods.
     *
     * @param array $headers
     * @param array $parameters
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null $content
     * @return Request
     */
    public function createRequest(array $headers = [],
                                  array $parameters = [],
                                  array $cookies = [],
                                  array $files = [],
                                  array $server = [],
                                  $content = null): Request;
}

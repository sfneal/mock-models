<?php

namespace Sfneal\Testing\Tests;

use Illuminate\Http\Request;
use Sfneal\Testing\Utils\Interfaces\RequestCreator;
use Sfneal\Testing\Utils\Traits\CreateRequest;

class CreateRequestTest extends TestCase implements RequestCreator
{
    use CreateRequest;

    /** @test */
    public function request_can_be_created()
    {
        $request = $this->createRequest();

        $this->assertNotNull($request);
        $this->assertInstanceOf(Request::class, $request);
    }
}

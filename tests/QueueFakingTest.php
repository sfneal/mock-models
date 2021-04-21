<?php

namespace Sfneal\Testing\Tests;

use Illuminate\Support\Facades\Queue;
use Sfneal\Testing\Utils\Traits\QueueFaker;

class QueueFakingTest extends TestCase
{
    use QueueFaker;

    /** @test */
    public function events_can_be_faked()
    {
        $this->queueFaker();

        Queue::assertNothingPushed();
    }
}

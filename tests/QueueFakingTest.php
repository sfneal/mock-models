<?php

namespace Sfneal\Testing\Tests;

use Illuminate\Support\Facades\Queue;
use PHPUnit\Framework\Attributes\Test;
use Sfneal\Testing\Utils\Traits\QueueFaker;

class QueueFakingTest extends TestCase
{
    use QueueFaker;

    #[Test]
    public function events_can_be_faked()
    {
        $this->queueFaker();

        Queue::assertNothingPushed();
    }
}

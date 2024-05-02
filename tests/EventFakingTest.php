<?php

namespace Sfneal\Testing\Tests;

use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\Test;
use Sfneal\Testing\Utils\Traits\EventFaker;

class EventFakingTest extends TestCase
{
    use EventFaker;

    #[Test]
    public function events_can_be_faked()
    {
        $this->eventFaker();

        Event::assertNothingDispatched();
    }
}

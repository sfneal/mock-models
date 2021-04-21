<?php

namespace Sfneal\Testing\Tests;

use Sfneal\Testing\Utils\Traits\EventFaker;

class EventFakingTest extends TestCase
{
    use EventFaker;

    /** @test */
    public function events_can_be_faked()
    {
        $this->eventFaker();
    }
}

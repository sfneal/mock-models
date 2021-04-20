<?php

namespace Sfneal\Testing\Utils\Traits;

use Illuminate\Support\Facades\Event;

trait EventFaker
{
    /**
     * Setup Event faking.
     *
     * @param  array|string  $eventsToFake
     * @return void
     */
    protected function eventFaker($eventsToFake = []): void
    {
        // Enable event faking
        Event::fake($eventsToFake);

        // Assert that no events were dispatched...
        Event::assertNothingDispatched();
    }
}

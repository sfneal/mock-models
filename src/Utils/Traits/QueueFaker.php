<?php

namespace Sfneal\Testing\Utils\Traits;

use Illuminate\Support\Facades\Queue;

trait QueueFaker
{
    /**
     * Setup Queue faking.
     *
     * @return void
     */
    protected function eventFaker(): void
    {
        // Enable queue faking
        Queue::fake();

        // Assert that no jobs were pushed...
        Queue::assertNothingPushed();
    }
}

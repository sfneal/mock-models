<?php

namespace Sfneal\Testing\Utils\Traits;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

trait WithMemoryDbConnection
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        DB::purge('testing');
        DB::setDefaultConnection('testing');

        Artisan::call('migrate');

        foreach ($this->seeders() as $seeder) {
            // Instantiated seeder class (likely with constructor params)
            if ($seeder instanceof Seeder) {
                $seeder->run();
            }

            // Seeder class string to be used in Artisan command
            else {
                $this->seed($seeder);
            }
        }
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between setUp() and test.
     *
     * @return void
     */
    protected function assertPreConditions(): void
    {
        $this->assertEquals('testing', DB::getDefaultConnection());
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        $this->beforeApplicationDestroyed(function () {
            DB::disconnect('testing');
        });

        parent::tearDown();
    }

    /**
     * Retrieve an array of Seeders to be run within the `setUp()` method.
     *
     * @return array
     */
    abstract protected function seeders(): array;
}

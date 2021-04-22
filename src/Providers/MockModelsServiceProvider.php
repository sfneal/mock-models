<?php

namespace Sfneal\Testing\Providers;

use Illuminate\Support\ServiceProvider;
use Sfneal\Address\Providers\AddressServiceProvider;

class MockModelsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any MockModel services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish migration file (if not already published)
        if (! class_exists('CreatePeopleTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_people_table.php.stub' => database_path(
                    'migrations/'.date('Y_m_d_His', time()).'_create_people_table.php'
                ),
            ], 'migration');
        }
    }

    /**
     * Register any MockModel services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(AddressServiceProvider::class);
    }
}

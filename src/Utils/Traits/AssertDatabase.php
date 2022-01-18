<?php

namespace Sfneal\Testing\Utils\Traits;

use Illuminate\Database\Eloquent\Model;

trait AssertDatabase
{
    /**
     * Assert that an array of records exists in the database.
     *
     * @param  Model|string  $table
     * @param  array[]  $records
     */
    protected function assertDatabaseHasMany($table, array $records)
    {
        foreach ($records as $data) {
            $this->assertDatabaseHas($table, $data);
        }
    }

    /**
     * Assert that an array of records is missing in the database.
     *
     * @param  Model|string  $table
     * @param  array[]  $records
     */
    protected function assertDatabaseMissingMany($table, array $records)
    {
        foreach ($records as $data) {
            $this->assertDatabaseMissing($table, $data);
        }
    }
}

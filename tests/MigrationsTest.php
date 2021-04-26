<?php

namespace Sfneal\Testing\Tests;

use Sfneal\Testing\Models\People;
use Sfneal\Testing\Utils\Traits\ModelAttributeAssertions;

class MigrationsTest extends TestCase
{
    use ModelAttributeAssertions;

    /** @test */
    public function people_table_is_accessible()
    {
        // Expected data
        $data = [
            'name_first' => 'Johnny',
            'name_last' => 'Tsunami',
            'email' => 'johnny.tsunami@example.com',
            'age' => 22,
        ];

        // Save a new Address
        $person = People::query()->create($data);

        // Retrieve the new Address
        $newPerson = People::query()->find($person->person_id);

        // Assert Jokes are the same
        $this->assertModelAttributesSame($data, $newPerson);
    }
}

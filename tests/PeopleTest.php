<?php

namespace Sfneal\Testing\Tests;

use Sfneal\Address\Models\Address;
use Sfneal\Testing\Models\People;
use Sfneal\Testing\Utils\Interfaces\CrudModelTest;

class PeopleTest extends TestCase implements CrudModelTest
{
    /** @test */
    public function records_can_be_created()
    {
        // Create a new Model
        $person = People::factory()
            ->has(Address::factory(), 'address')
            ->create();

        $this->assertInstanceOf(People::class, $person);
        $this->assertInstanceOf(Address::class, $person->address);
    }

    /** @test */
    public function records_can_be_updated()
    {
        // Find a random People model
        $person = People::query()->first();

        // Update the People model
        $person->update([
            'name_first' => 'Tom',
            'name_last' => 'Brady',
        ]);

        // Update the People's Address model
        $person->address->update([
            'city' => 'Brookline',
            'state' => 'MASSACHUSETTS',
        ]);

        // Find the update person
        $updatedPerson = People::query()
            ->with('address')
            ->find($person->getKey());

        $this->assertInstanceOf(People::class, $updatedPerson);
        $this->assertInstanceOf(Address::class, $updatedPerson->address);
        $this->assertSame($person->getKey(), $updatedPerson->getKey());
        $this->assertSame($person->address->getKey(), $updatedPerson->address->getKey());
        $this->assertSame('Tom', $updatedPerson->name_first);
        $this->assertSame('Brady', $updatedPerson->name_last);
        $this->assertSame('Brookline', $updatedPerson->address->city);
        $this->assertSame('MASSACHUSETTS', $updatedPerson->address->state);
    }

    /** @test */
    public function records_can_be_deleted()
    {
        // Find a random People model
        $person = People::query()->first();

        // Delete the model
        $person->delete();

        $this->assertInstanceOf(People::class, $person);
        $this->assertTrue($person->wasDeleted());
        $this->assertNull(People::query()->find($person->getKey()));
    }
}

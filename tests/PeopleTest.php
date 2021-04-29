<?php

namespace Sfneal\Testing\Tests;

use Database\Factories\PeopleFactory;
use Sfneal\Address\Models\Address;
use Sfneal\Builders\QueryBuilder;
use Sfneal\Testing\Models\People;
use Sfneal\Testing\Utils\Interfaces\CrudModelTest;
use Sfneal\Testing\Utils\Interfaces\ModelBuilderTest;
use Sfneal\Testing\Utils\Interfaces\ModelFactoryTest;
use Sfneal\Testing\Utils\Interfaces\ModelRelationshipsTest;

class PeopleTest extends TestCase implements
    CrudModelTest,
                                             ModelBuilderTest,
                                             ModelFactoryTest,
                                             ModelRelationshipsTest
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

    /** @test */
    public function builder_is_accessible()
    {
        $builder = People::query();

        $this->assertInstanceOf(QueryBuilder::class, $builder);
        $this->assertIsString($builder->toSql());
    }

    /** @test */
    public function factory_is_accessible()
    {
        $factory = People::factory();

        $this->assertInstanceOf(PeopleFactory::class, $factory);
    }

    /** @test */
    public function relationships_are_accessible()
    {
        // Find a random People model
        $person = People::query()->first();

        $this->assertNotNull($person->address);
        $this->assertInstanceOf(Address::class, $person->address);
    }
}

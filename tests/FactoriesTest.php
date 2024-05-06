<?php

namespace Sfneal\Testing\Tests;

use PHPUnit\Framework\Attributes\Test;
use Sfneal\Testing\Models\People;
use Sfneal\Testing\Utils\Interfaces\Factory\AttributesTest;
use Sfneal\Testing\Utils\Interfaces\Factory\FillablesTest;
use Sfneal\Testing\Utils\Interfaces\Factory\RelationshipAttributesTest;
use Sfneal\Testing\Utils\Interfaces\Factory\RelationshipFillablesTest;

class FactoriesTest extends TestCase implements
    AttributesTest,
    FillablesTest,
    RelationshipAttributesTest,
    RelationshipFillablesTest
{
    /**
     * @var People
     */
    public $model;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        // Retrieve the People model from an Address model
        $this->model = People::query()->get()->shuffle()->first();
    }

    #[Test]
    public function fillables_are_correct_types()
    {
        $this->assertIsString($this->model->name_first);
        $this->assertIsString($this->model->name_last);
        $this->assertStringContainsString('@', $this->model->email);
        $this->assertIsInt($this->model->age);
    }

    #[Test]
    public function attributes_are_correct_types()
    {
        // Name attributes
        $this->assertIsString($this->model->name_full);
        $this->assertStringContainsString(', ', $this->model->getNameLastFirstAttribute());
        $this->assertStringContainsString($this->model->name_first, $this->model->name_full);
        $this->assertStringContainsString($this->model->name_last, $this->model->name_full);
    }

    #[Test]
    public function relationship_fillables_are_correct_types()
    {
        $this->assertIsString($this->model->address->address_1);
        $this->assertIsString($this->model->address->address_2);
        $this->assertIsString($this->model->address->city);
        $this->assertIsString($this->model->address->state);
        $this->assertIsString($this->model->address->zip);
    }

    #[Test]
    public function relationship_attributes_are_correct_types()
    {
        // Address attributes
        $this->assertIsString($this->model->address->address_full);
        $this->assertStringContainsString(', ', $this->model->address->address_full);
        $this->assertStringContainsString($this->model->address->address_1, $this->model->address->address_full);
        $this->assertStringContainsString($this->model->address->city, $this->model->address->address_full);
        $this->assertStringContainsString($this->model->address->state, $this->model->address->address_full);
        $this->assertStringContainsString($this->model->address->zip, $this->model->address->address_full);
    }
}

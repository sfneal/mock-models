<?php

namespace Sfneal\Testing\Utils\Interfaces;

interface CrudModelTest
{
    /** @test */
    public function records_can_be_created();

    /** @test */
    public function records_can_be_updated();

    /** @test */
    public function records_can_be_deleted();
}

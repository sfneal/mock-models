<?php

namespace Sfneal\Testing\Utils\Interfaces;

use PHPUnit\Framework\Attributes\Test;

interface CrudModelTest
{
    #[Test]
    public function records_can_be_created();

    #[Test]
    public function records_can_be_updated();

    #[Test]
    public function records_can_be_deleted();
}

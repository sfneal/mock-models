<?php

namespace Sfneal\Testing\Utils\Interfaces\Factory;

use PHPUnit\Framework\Attributes\Test;

interface RelationshipFillablesTest
{
    #[Test]
    public function relationship_fillables_are_correct_types();
}

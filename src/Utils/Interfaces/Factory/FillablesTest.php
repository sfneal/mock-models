<?php

namespace Sfneal\Testing\Utils\Interfaces\Factory;

use PHPUnit\Framework\Attributes\Test;

interface FillablesTest
{
    #[Test]
    public function fillables_are_correct_types();
}

<?php

namespace Sfneal\Testing\Utils\Interfaces\Factory;

use PHPUnit\Framework\Attributes\Test;

interface AttributesTest
{
    #[Test]
    public function attributes_are_correct_types();
}

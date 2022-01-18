<?php

namespace Sfneal\Testing\Utils\Traits;

trait AssertModelBuilder
{
    /**
     * Assert that a Model's QueryBuilder is accessible & expected type.
     *
     * @param  QueryBuilder  $builder
     * @param  string  $expected
     */
    protected function assertBuilderIsAccessible(QueryBuilder $builder, string $expected = QueryBuilder::class)
    {
        $this->assertInstanceOf($expected, $builder);
        $this->assertIsString($builder->toSql());
    }
}

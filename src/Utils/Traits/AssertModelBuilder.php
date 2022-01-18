<?php

namespace Sfneal\Testing\Utils\Traits;

use Illuminate\Database\Query\Builder;
use Sfneal\Builders\QueryBuilder;

trait AssertModelBuilder
{
    /**
     * Assert that a Model's QueryBuilder is accessible & expected type.
     *
     * @param  QueryBuilder|Builder|mixed  $builder
     * @param  string  $expected
     */
    protected function assertBuilderIsAccessible($builder, string $expected = QueryBuilder::class)
    {
        $this->assertInstanceOf($expected, $builder);
        $this->assertIsString($builder->toSql());
    }
}

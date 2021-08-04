<?php

namespace Sfneal\Testing\Utils\Traits;

use Illuminate\Database\Eloquent\Model;

trait AssertModelAttributes
{
    // todo: add tests

    /**
     * Assert model attributes are same.
     *
     * @param array $data
     * @param Model $model
     * @param array|null $ignoredAttributes
     * @return void
     */
    public static function assertModelAttributesSame(array $data, Model $model, array $ignoredAttributes = null): void
    {
        self::assertModelAttributes($data, $model, $ignoredAttributes, 'assertSame');
    }

    /**
     * Assert model attributes are equal.
     *
     * @param array $data
     * @param Model $model
     * @param array|null $ignoredAttributes
     * @return void
     */
    public static function assertModelAttributesEqual(array $data, Model $model, array $ignoredAttributes = null): void
    {
        self::assertModelAttributes($data, $model, $ignoredAttributes, 'assertEquals');
    }

    /**
     * Assert model attributes.
     *
     * @param array $data
     * @param Model $model
     * @param array|null $ignoredAttributes
     * @param string $method
     * @return void
     */
    private static function assertModelAttributes(array  $data,
                                                  Model  $model,
                                                  array  $ignoredAttributes = null,
                                                  string $method = 'assertSame'): void
    {
        // Remove ignore attributes
        if (isset($ignoredAttributes)) {
            foreach ($ignoredAttributes as $attribute) {
                unset($data[$attribute]);
            }
        }

        // Execute assertions on each attribute
        foreach ($data as $attribute => $value) {
            self::{$method}($value, $model->{$attribute});
        }
    }
}

<?php

namespace Sfneal\Testing\Utils\Traits;

use Illuminate\Database\Eloquent\Model;

trait ModelAttributeAssertions
{
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
        // Remove ignore attributes
        if (isset($ignoredAttributes)) {
            foreach ($ignoredAttributes as $attribute) {
                unset($data[$attribute]);
            }
        }

        // Execute assertions on each attribute
        foreach ($data as $attribute => $value) {
            self::assertSame($value, $model->{$attribute});
        }
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
        // Remove ignore attributes
        if (isset($ignoredAttributes)) {
            foreach ($ignoredAttributes as $attribute) {
                unset($data[$attribute]);
            }
        }

        // Execute assertions on each attribute
        foreach ($data as $attribute => $value) {
            self::assertEquals($value, $model->{$attribute});
        }
    }
}

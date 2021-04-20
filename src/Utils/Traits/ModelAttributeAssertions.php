<?php


namespace Sfneal\Testing\Utils\Traits;


use Illuminate\Database\Eloquent\Model;

trait ModelAttributeAssertions
{
    /**
     * Execute model assertions.
     *
     * @param array $data
     * @param Model $model
     * @param string $assertionMethod
     * @return void
     */
    private function modelAttributeAssertions(array $data, Model $model, string $assertionMethod = 'assertSame'): void
    {
        foreach ($data as $attribute => $value) {
            $this->{$assertionMethod}($value, $model->{$attribute});
        }
    }
}

<?php

namespace Sfneal\Testing\Utils\Traits;

use Illuminate\Support\Collection;

trait ModelProvider
{
    /**
     * Retrieve an array of models to be used as test params.
     *
     * @param  string  $modelClass
     * @param  int|null  $limit
     * @return array
     */
    protected function modelsProvider(string $modelClass, int $limit = null): array
    {
        $this->refreshApplication();

        return $modelClass::query()
            ->get()
            ->when(isset($limit), function (Collection $collection) use ($limit) {
                return $collection->shuffle()->take($limit);
            })
            ->map(function ($model) {
                return [$model];
            })
            ->toArray();
    }
}

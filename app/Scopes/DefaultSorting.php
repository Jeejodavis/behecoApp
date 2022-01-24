<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class DefaultSorting implements Scope
{

    protected $orderByKeys = [];

    public function __construct(array $keys)
    {
        $this->orderByKeys = $keys;
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        foreach ($this->orderByKeys as $key => $value) {
            $builder->orderBy($key, $value);
        }
    }

}

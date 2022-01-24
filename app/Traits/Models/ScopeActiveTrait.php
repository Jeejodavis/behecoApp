<?php

namespace App\Traits\Models;

trait ScopeActiveTrait
{

    /**
     * Scope a query to only include active data.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {

        return $query->where('status', 'active');
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->status == 'active';
    }
}

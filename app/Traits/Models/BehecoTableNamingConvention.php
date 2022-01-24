<?php
namespace App\Traits\Models;

use Illuminate\Support\Str;

trait BehecoTableNamingConvention
{
/**
 * Get the table associated with the model.
 *
 * @return string
 */
    public function getTable()
    {
        return $this->table ?? 'beheco_' . Str::snake(Str::studly(class_basename($this)));
    }

}

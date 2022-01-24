<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;

use App\Models\Country;

class State extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    public function country()
    {
    	return $this->belongsTo(Country::class);
    }
}

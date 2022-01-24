<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;

use App\Models\UserBusiness;

class Subcategory extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    public function userBusiness()
    {
    	return $this->hasMany(UserBusiness::class)->where('status', 'active');
    }
}

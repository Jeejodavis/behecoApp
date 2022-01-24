<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;

use App\Models\UserBusiness;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    public function userBusiness()
    {
    	return $this->hasMany(UserBusiness::class)->where('status', 'active');
    }

    public function subcategory()
    {
    	return $this->hasMany(Subcategory::class)->where('status', 'active');
    }

    public function offers()
    {
        return $this->hasMany(UserBusiness::class)->
        join('beheco_business_offers', 'beheco_business_offers.business_id', 'beheco_user_business.id')
        ->where('beheco_user_business.status', 'active');
    }
}

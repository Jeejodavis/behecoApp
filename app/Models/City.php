<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;

use App\Models\UserBusiness;
use App\Models\State;

class City extends Model
{
    use HasFactory, BehecoTableNamingConvention;

    public function userBusiness()
    {
    	return $this->hasMany(UserBusiness::class)->where('status', 'active');
    }

    public function state()
    {
    	return $this->belongsTo(State::class);
    }

    public function offers()
    {
    	return $this->hasMany(UserBusiness::class)->
    	join('beheco_business_offers', 'beheco_business_offers.business_id', 'beheco_user_business.id')
    	->where('beheco_user_business.status', 'active');
    }
}

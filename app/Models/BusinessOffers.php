<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;

use App\Models\UserBusiness;

class BusinessOffers extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    protected $fillable = [
        'business_id',
        'offer_image',
        'heading',
        'location',
        'description'
    ];

    public function business()
    {
    	return $this->belongsTo(UserBusiness::class, 'business_id');
    }
}

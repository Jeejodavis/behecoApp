<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;

use App\Models\UserFreelancers;

class FreelancerOffers extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    protected $fillable = [
        'freelancer_id',
        'offer_image',
        'heading',
        'location',
        'description'
    ];

    public function freelancer()
    {
    	return $this->belongsTo(UserFreelancers::class, 'freelancer_id');
    }
}

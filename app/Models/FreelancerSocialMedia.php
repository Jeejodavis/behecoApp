<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;

use App\Models\SocialMedia;

class FreelancerSocialMedia extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    protected $fillable = [
        'freelancer_id',
        'social_media',
        'url',
        'created_at',
        'updated_at'
    ];

    public function socialMediaData()
    {
        return $this->belongsTo(SocialMedia::class, 'social_media');
    }
}

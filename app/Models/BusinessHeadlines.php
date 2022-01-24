<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;

use App\Models\Headlines;

class BusinessHeadlines extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    protected $fillable = [
        'business_id',
        'headline',
        'content'
    ];

    public function headlineData()
    {
    	return $this->belongsTo(Headlines::class, 'headline');
    }
}

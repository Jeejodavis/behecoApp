<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;
use App\Scopes\DefaultSorting;

class BusinessReview extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    protected $fillable = [
        'business_id',
        'user_id',
        'rating',
        'remarks',
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;

class BusinessKeywords extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    protected $fillable = [
        'business_id',
        'keyword_id'
    ];
}

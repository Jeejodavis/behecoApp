<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;

class Headlines extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    protected $fillable = [
        'headline_name',
        'status',
        'created_at'
    ];
}

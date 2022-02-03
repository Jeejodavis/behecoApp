<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;
use App\Scopes\DefaultSorting;

class FreelancerQuestions extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    protected $fillable = [
        'freelancer_id',
        'user_id',
        'question',
        'created_at',
        'updated_at',
        'answer',
        'answered_by'
    ];

    /**
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new DefaultSorting(['beheco_freelancer_questions.id' => 'desc']));
    }
}

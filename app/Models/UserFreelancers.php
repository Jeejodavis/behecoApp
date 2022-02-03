<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;
use Illuminate\Support\Facades\DB;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\FreelancerOffers;
use App\Models\FreelancerPhotos;
use App\Models\FreelancerKeywords;
use App\Models\FreelancerHeadlines;
use App\Models\FreelancerReview;
use App\Models\FreelancerQuestions;
use App\Models\FreelancerSocialMedia;

class UserFreelancers extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    protected $fillable = [
        'user_id',
        'freelancer_name',
        'category_id',
        'subcategory_id',
        'street',
        'area',
        'city_id',
        'landmark',
        'pincode',
        'country',
        'state',
        'office_number',
        'tollfree_number',
        'whatsapp_number',
        'mobile_number',
        'email_id',
        'website',
        'location',
        'profile_photo',
        'cover_photo',
        'about',
        'timing',
        'timing_value',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function stateData()
    {
        return $this->belongsTo(State::class, 'state');
    }

    public function countryData()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    public function photos()
    {
        return $this->hasMany(FreelancerPhotos::class, 'freelancer_id');
    }

    public function review()
    {
        return $this->hasMany(FreelancerReview::class, 'freelancer_id');
    }

    public function questions()
    {
        return $this->hasMany(FreelancerQuestions::class, 'freelancer_id')
            ->join('beheco_users', 'beheco_users.id', 'beheco_freelancer_questions.user_id')
            ->select('beheco_freelancer_questions.id as ques_id', 'question', 'answer', 'answered_by', 'first_name', 'last_name');
    }

    public function ratingAvg()
    {
        return $this->hasMany(FreelancerReview::class, 'freelancer_id')->select(DB::raw("ROUND(avg(rating),1) as rating_avg"))->groupBy('freelancer_id');
    }

    public function rating($freelancerId)
    {
        return FreelancerReview::where('freelancer_id', $freelancerId)
        ->select(DB::raw("ROUND(avg(rating),1) as rating_avg, count(id) as count, count(case when rating=5 then 1 end) as five_rating, count(case when rating>=4 and rating<5 then 1 end) as four_rating, count(case when rating>=3 and rating<4 then 1 end) as three_rating, count(case when rating>=2 and rating<3 then 1 end) as two_rating, count(case when rating>=1 and rating<2 then 1 end) as one_rating, count(case when remarks<>'' then 1 end) as review_count"))->first();
    }

    public function keywords()
    {
        return $this->hasMany(FreelancerKeywords::class, 'freelancer_id');
    }

    public function headlines()
    {
        return $this->hasMany(FreelancerHeadlines::class, 'freelancer_id');
    }

    public function offers()
    {
        return $this->hasMany(FreelancerOffers::class, 'freelancer_id');
    }

    public function socialMedia()
    {
        return $this->hasMany(FreelancerSocialMedia::class, 'freelancer_id');
    }
}

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
use App\Models\BusinessOffers;
use App\Models\BusinessPhotos;
use App\Models\BusinessKeywords;
use App\Models\BusinessHeadlines;
use App\Models\BusinessReview;
use App\Models\BusinessQuestions;
use App\Models\BusinessSocialMedia;

class UserBusiness extends Model
{
    use HasFactory, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    protected $fillable = [
        'user_id',
        'business_name',
        'category_id',
        'subcategory_id',
        'year_of_establishment',
        'name_of_founder',
        'building',
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
    	return $this->hasMany(BusinessPhotos::class, 'business_id');
    }

    public function review()
    {
    	return $this->hasMany(BusinessReview::class, 'business_id');
    }

    public function questions()
    {
    	return $this->hasMany(BusinessQuestions::class, 'business_id')
    		->join('beheco_users', 'beheco_users.id', 'beheco_business_questions.user_id')
    		->select('beheco_business_questions.id as ques_id', 'question', 'answer', 'answered_by', 'first_name', 'last_name');
    }

    public function ratingAvg()
    {
    	return $this->hasMany(BusinessReview::class, 'business_id')->select(DB::raw("ROUND(avg(rating),1) as rating_avg"))->groupBy('business_id');
    }

    public function rating($businessId)
    {
    	return BusinessReview::where('business_id', $businessId)
    	->select(DB::raw("ROUND(avg(rating),1) as rating_avg, count(id) as count, count(case when rating=5 then 1 end) as five_rating, count(case when rating>=4 and rating<5 then 1 end) as four_rating, count(case when rating>=3 and rating<4 then 1 end) as three_rating, count(case when rating>=2 and rating<3 then 1 end) as two_rating, count(case when rating>=1 and rating<2 then 1 end) as one_rating, count(case when remarks<>'' then 1 end) as review_count"))->first();
    }

    public function keywords()
    {
        return $this->hasMany(BusinessKeywords::class, 'business_id');
    }

    public function headlines()
    {
        return $this->hasMany(BusinessHeadlines::class, 'business_id');
    }

    public function offers()
    {
        return $this->hasMany(BusinessOffers::class, 'business_id');
    }

    public function socialMedia()
    {
        return $this->hasMany(BusinessSocialMedia::class, 'business_id');
    }
}

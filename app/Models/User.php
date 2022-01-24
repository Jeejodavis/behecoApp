<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Models\BehecoTableNamingConvention;
use App\Traits\Models\ScopeActiveTrait;

use App\Models\UserSavedItems;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, BehecoTableNamingConvention;
    use ScopeActiveTrait;

    protected $table = 'beheco_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'google_id',
        'facebook_id',
        'gender',
        'dob',
        'email',
        'contact_no',
        'profile_img',
        'banner_img',
        'role_id',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function savedItems()
    {
        return $this->hasMany(UserSavedItems::class, 'user_id');
    }
}

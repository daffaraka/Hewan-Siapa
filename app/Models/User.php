<?php

namespace App\Models;

use App\Models\Product\Adopsi;
use App\Models\Product\Pemacakan;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
  
    protected $guard_name = 'web';
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

  
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  
    protected $appends = [
        'profile_photo_url',
    ];


    public function postAdopsi() {
        return $this->hasMany(Adopsi::class,'owner-adopsi_id','id');
    }
    public function postPemacakan() {
        return $this->hasMany(Pemacakan::class);
    }
}

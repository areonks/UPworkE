<?php

namespace App\Models;

use App\Traits\HasLikes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasFactory, Notifiable, HasApiTokens, HasLikes;

    protected $fillable = [
        'username',
        'email',
        'password',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['likes'];

    public function getLikesAttribute()
    {
        return $this->likedUsers()->count();
    }

    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class);
    }

    public function vacancyResponses()
    {
        return $this->hasMany(VacancyResponse::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed user_id
 * @property mixed id
 */
class JobVacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vacancyResponse()
    {
        return $this->hasMany( VacancyResponse::class);
    }


}

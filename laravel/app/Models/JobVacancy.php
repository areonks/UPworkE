<?php

namespace App\Models;

use App\Traits\HasLikes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed user_id
 * @property mixed id
 */
class JobVacancy extends Model
{
    use HasFactory, HasLikes;

    protected $fillable = [
        'title',
        'description',
    ];

    protected $withCount = ['likedUsers'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vacancyResponses()
    {
        return $this->hasMany( VacancyResponse::class, 'vacancy_id');
    }


}

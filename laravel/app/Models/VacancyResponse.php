<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed user_id
 * @property mixed post_id
 */
class VacancyResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class, 'vacancy_id');
    }

}

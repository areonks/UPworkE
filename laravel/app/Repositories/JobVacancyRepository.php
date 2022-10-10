<?php

namespace App\Repositories;

use App\Models\JobVacancy;
use Illuminate\Support\Facades\Auth;

class JobVacancyRepository implements JobVacancyRepositoryInterface
{

    public function getAll($searchParams)
    {
        $standardFields = [
            'sort_field' => 'id',
            'sort_order' => 'DESC',
            'start_date' => '2000-01-01',
            'end_date' => date("Y-m-d", strtotime("+1 day"))
        ];
        $standardFields = array_merge($standardFields, $searchParams);
        $query = JobVacancy::withQueryParams($searchParams)
            ->orderBy($standardFields['sort_field'], $standardFields['sort_order'])
            ->whereDate('created_at', '>=', $standardFields['start_date'])
            ->whereDate('created_at', '<=', $standardFields['end_date']);

        return $query->paginate(10);

    }

}

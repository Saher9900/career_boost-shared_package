<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Override;

class JobVacancy extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_vacancies';

    protected $fillable = [
        'title',
        'description',
        'location',
        'salary',
        'view_count',
        'type',
        'company_id',
        'job_category_id',
    ];

    #[Override]
    protected function casts()
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id', 'id');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'job_vacancy_id', 'id');
    }
    // public function companyOwner() {
    //     return JobVacancy
    // }
}

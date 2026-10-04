<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Override;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'industry',
        'address',
        'website',
        'owner_id',
    ];

    #[Override]
    protected function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class, 'company_id', 'id');
    }

    public function jobApplications()
    {
        return $this->hasManyThrough(JobApplication::class, JobVacancy::class, 'company_id', 'job_vacancy_id', 'id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Override;

class JobApplication extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_applications';

    protected $fillable = [
        'ai_score',
        'ai_feedback',
        'status',
        'user_id',
        'resume_id',
        'job_vacancy_id',
    ];

    #[Override]
    protected function casts()
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'id');
    }

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancy_id', 'id');
    }
}

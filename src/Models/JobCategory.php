<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Override;

class JobCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_categories';

    protected $fillable = [
        'title',
    ];

    #[Override]
    protected function casts()
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class, 'job_category_id', 'id');
    }
}

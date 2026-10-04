<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Override;

class Resume extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'resumes';

    protected $fillable = [
        'file_name',
        'file_url',
        'contact_details',
        'education',
        'summary',
        'skills',
        'experience',
        'user_id',
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

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'resume_id', 'id');
    }
}

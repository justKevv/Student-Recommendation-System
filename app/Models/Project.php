<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'title',
        'description',
        'github_link',
        'live_link',
        'project_skills',
        'project_image',
    ];

    protected $casts = [
        'project_skills' => 'array',
    ];

    /**
     * Get the student that owns the project.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

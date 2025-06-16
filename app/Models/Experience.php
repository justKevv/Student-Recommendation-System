<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /** @use HasFactory<\Database\Factories\ExperienceFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'title',
        'employment_type',
        'company',
        'start_date',
        'end_date',
        'is_currently_working_here',
        'type',
        'description',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_currently_working_here' => 'boolean',
        'description' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

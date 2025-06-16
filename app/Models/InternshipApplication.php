<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipApplication extends Model
{
    /** @use HasFactory<\Database\Factories\InternshipApplicationFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'internship_id',
        'status',
        'supervisor_id',
        'feedback',
        'admin_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisors::class);
    }

    public function logs()
    {
        return $this->hasMany(StudentLog::class, 'application_id');
    }
}

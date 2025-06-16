<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLog extends Model
{
    /** @use HasFactory<\Database\Factories\StudentLogFactory> */
    use HasFactory;

    protected $fillable = [
        'application_id',
        'log_date',
        'description',
        'supervisor_feedback',
        'media_path'
    ];

    protected $casts = [
        'log_date' => 'date'
    ];

    public function application()
    {
        return $this->belongsTo(InternshipApplication::class);
    }
}

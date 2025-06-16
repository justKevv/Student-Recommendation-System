<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /** @use HasFactory<\Database\Factories\CertificateFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'title',
        'issuer',
        'issue_date',
        'description',
        'certificate_link',
        'certificate_image',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}

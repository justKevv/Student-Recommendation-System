<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'industry_field',
        'address',
        'city',
        'province',
        'postal_code',
        'website',
        'email',
        'nice_to_have',
        'profile_picture'
    ];

    protected $casts = [
        'nice_to_have' => 'array',
    ];

    public function internships()
    {
        return $this->hasMany(Internship::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisors extends Model
{
    /** @use HasFactory<\Database\Factories\SupervisorsFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nidn',
        'expertise_areas',
        'research_interests'
    ];

    protected $casts = [
        'expertise_areas' => 'array',
        'research_interests' => 'array'
    ];

    // Inverse relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

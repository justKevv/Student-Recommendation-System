<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Internship extends Model
{
    /** @use HasFactory<\Database\Factories\InternshipFactory> */
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'requirements',
        'eligibility_criteria',
        'responsibilities',
        'type',
        'location',
        'open_until',
        'start_date',
        'end_date',
        'internship_picture',
    ];

    protected $casts = [
        'requirements' => 'array',
        'eligibility_criteria' => 'array',
        'responsibilities' => 'array',
        'open_until' => 'datetime',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get the company that owns the internship.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Generate a slug from the title, ID, and company name.
     */
    public function getSlugAttribute()
    {
        $companySlug = Str::slug($this->company->name);
        return Str::slug($this->title) . '-' . $this->id . '-' . $companySlug;
    }

    /**
     * Find internship by slug.
     */
    public static function findBySlug($slug)
    {
        // Extract ID from slug (format: title-id-company)
        $parts = explode('-', $slug);
        
        // Find the numeric ID in the slug parts
        $id = null;
        foreach ($parts as $part) {
            if (is_numeric($part)) {
                $id = (int) $part;
                break;
            }
        }
        
        if (!$id) {
            abort(404, 'Invalid slug format');
        }
        
        // Find internship by ID and verify slug matches
        $internship = static::with('company')->find($id);
        
        if (!$internship || $internship->slug !== $slug) {
            abort(404, 'Internship not found');
        }
        
        return $internship;
    }

    /**
     * Get the remaining time until the application deadline.
     * This is an Accessor.
     */
    public function getRemainingTimeAttribute()
    {
        if ($this->open_until->isPast()) {
            return 'Closed';
        }

        $now = Carbon::now();

        $months = floor($now->diffInMonths($this->open_until));
        if ($months > 0) {
            return $months . ' ' . str('month')->plural($months) . ' left';
        }

        // This part only runs if $months is 0
        $days = floor($now->diffInDays($this->open_until));
        if ($days > 0) {
            return $days . ' ' . str('day')->plural($days) . ' left';
        }

        // This part only runs if $days is also 0
        $hours = floor($now->diffInHours($this->open_until));
        if ($hours > 0) {
            return $hours . ' ' . str('hour')->plural($hours) . ' left';
        }

        $minutes = floor($now->diffInMinutes($this->open_until));
        if ($minutes > 0) {
            return $minutes . ' ' . str('minute')->plural($minutes) . ' left';
        }

        return 'Less than a minute left';
    }
}

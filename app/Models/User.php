<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'profile_picture',
        'first_login'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'first_login' => 'boolean',
        ];
    }

    public function supervisor() {
        return $this->hasOne(Supervisors::class, 'user_id', 'id');
    }

    public function student() {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }

    public function admin() {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0] ?? '';
    }

    public function getLastNameAttribute()
    {
        $nameParts = explode(' ', $this->name);
        return isset($nameParts[1]) ? implode(' ', array_slice($nameParts, 1)) : '';
    }
}

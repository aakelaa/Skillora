<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

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
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

        // ---- Role helpers ----
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isClient(): bool
    {
        return $this->role === 'client';
    }

    public function isFreelancer(): bool
    {
        return $this->role === 'freelancer';
    }

    // ---- Relationships ----

    // Client hasMany Jobs (one-to-many)
    public function jobs()
    {
        return $this->hasMany(Job::class, 'client_id');
    }

    // Freelancer hasOne Profile (one-to-one)
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Freelancer belongsToMany Jobs via applications pivot (many-to-many)
    public function appliedJobs()
    {
        return $this->belongsToMany(Job::class, 'applications', 'freelancer_id', 'job_id')
            ->withPivot('cover_letter', 'status')
            ->withTimestamps();
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'freelancer_id');
    }
}

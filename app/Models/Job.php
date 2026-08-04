<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_posts';

    protected $fillable = [
        'client_id', 'category_id', 'title', 'description',
        'budget', 'deadline', 'status', 'attachment_path',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'datetime',
        ];
    }

    // ---- Relationships ----

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Job belongsToMany Freelancer via applications pivot (many-to-many)
    public function freelancers()
    {
        return $this->belongsToMany(User::class, 'applications', 'job_id', 'freelancer_id')
            ->withPivot('cover_letter', 'status')
            ->withTimestamps();
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    // Query scope
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

}

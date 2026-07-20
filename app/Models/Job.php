<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model

{
    use SoftDeletes;
    protected $table = 'job_posts';
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'budget',
        'deadline',
        'attachment',
        'status',
        'client_id',

    ];

    //categoryy
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //client
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    //Job belongsToMany Freelancer via applications pivot (many-to-many)
    public function freelancer()
    {
        return $this->belongsToMany(User::class, 'applications', 'job_id', 'freelancer_id')
        ->withPivot('cover_letter')
        ->withTimestamps();

    }

    public function applications()
    {

        return $this->hasMany(Application::class);
    }

    //query open scope
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

}

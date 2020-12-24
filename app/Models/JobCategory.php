<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class JobCategory extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'jobs_categories';
    protected $guarded = [];

    protected $appends = [
        'delete_url',
        'edit_url',
        'update_url',
        'link',
        'excerpt'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function jobs() 
    {
        return $this->hasMany(Job::class, 'category_id');
    }

    public function getDeleteUrlAttribute()
    {
        return route('admin.jobs.categories.destroy', $this->id);
    }

    public function getEditUrlAttribute()
    {
        return route('admin.jobs.categories.edit', $this->id);
    }

    public function getUpdateUrlAttribute()
    {
        return route('admin.jobs.categories.update', $this->id);
    }

    public function getLinkAttribute()
    {
        return route('jobs.category.show', $this->slug);
    }

    public function getExcerptAttribute()
    {
        return substr($this->description, 0, 50) . '...';
    }
}

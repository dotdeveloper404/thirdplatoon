<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = "blogs";
    protected $guarded = [];

    protected $appends = [
        'status_url',
        'delete_url',
        'edit_url',
        'update_url',
        'image_path',
        'excerpt',
        'link',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getStatusUrlAttribute()
    {
        return route('admin.blog.status', $this->id);
    }

    public function getDeleteUrlAttribute()
    {
        return route('admin.blog.destroy', $this->id);
    }

    public function getEditUrlAttribute()
    {
        return route('admin.blog.edit', $this->id);
    }

    public function getUpdateUrlAttribute()
    {
        return route('admin.blog.update', $this->id);
    }

    public function getImagePathAttribute()
    {
        if($this->image) {
            return asset('storage/blog/' . $this->image);
        } else {
            return asset('assets/images/placeholder.png');
        }
        
    }

    public function getExcerptAttribute()
    {
        return substr($this->description, 0, 50) . '...';
    }

    public function getLinkAttribute()
    {
        return route('blog.show', [$this->slug]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
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

    protected $table = 'categories';
    protected $guarded = [];

    public function scopeAds($query) 
    {
        return $query->where('category_type', 'ads');
    }

    public function scopeParents($query) 
    {
        return $query->where('parent_id', 0);
    }

    public function image() {
        return asset('storage/categories/' . $this->image);
    }

    public function path() {
        return route('ads.index') . '?category='.$this->id;
    }
}

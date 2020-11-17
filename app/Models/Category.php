<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory;

    use Sluggable;

    protected $guarded = [];

    protected $table = "cateogries";

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function hasChild()
    {
        return $this->categories;
    }
}

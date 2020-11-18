<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Ads extends Model
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

    protected $table = 'ads';
    protected $guarded = [];

    public function category() 
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function user() 
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function image() {
        return asset('storage/ads/' . $this->image);
    }

    public function price() {
        return number_format($this->price, 2);
    }
}

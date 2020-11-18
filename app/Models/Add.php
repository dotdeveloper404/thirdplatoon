<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Add extends Model
{
    use HasFactory;


    use Sluggable;

    protected $table = "adds";

    protected $guarded = [];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function category()
    {
        $this->belongsTo(Category::class);
    }
}

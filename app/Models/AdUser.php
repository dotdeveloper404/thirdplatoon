<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdUser extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'ad_users';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ad()
    {
        return $this->belongsTo(Ads::class, 'ad_id');
    }

    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->format('Y-m-d');
    // }
}

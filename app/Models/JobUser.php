<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobUser extends Model
{
    use HasFactory;

    protected $table = 'jobs_users';
    protected $guarded = [];

    protected $appends = [
    	'attachment_path',
    	'user_data',
    	'status_url',
    ];

    public function job() {
    	return $this->belongsTo(Job::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function getAttachmentPathAttribute() {
    	if($this->attachment) {
            return asset('storage/apply_job/' . $this->attachment);
        }

        return false;
    }

    public function getUserDataAttribute() {
    	return $this->user;
    }

    public function getStatusUrlAttribute() {
    	return route('admin.jobs.applied.status', [$this->job->id, $this->id]);
    }
}

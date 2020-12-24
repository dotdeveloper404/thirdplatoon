<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $guarded = [];

    protected $dates = ['valid_till'];

    protected $appends = [
        'applied_url',
        'status_url',
        'delete_url',
        'edit_url',
        'update_url',
        'show_url',
        'company_logo_path',
        'type',
        'deadline_date',
        'valid_till_format',
        'application_ends',
        'pay_per',
        'pay_start_format',
        'pay_end_format',
        'link',
        'apply_url',
        'save_apply_url',
        'job_user'
    ];

    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }

    public function job_users()
    {
        return $this->hasMany(JobUser::class, 'job_id');
    }

    public function getAppliedUrlAttribute()
    {
        return route('admin.jobs.applied', $this->id);
    }

    public function getStatusUrlAttribute()
    {
        return route('admin.jobs.status', $this->id);
    }

    public function getDeleteUrlAttribute()
    {
        return route('admin.jobs.destroy', $this->id);
    }

    public function getEditUrlAttribute()
    {
        return route('admin.jobs.edit', $this->id);
    }

    public function getUpdateUrlAttribute()
    {
        return route('admin.jobs.update', $this->id);
    }

    public function getShowUrlAttribute()
    {
        return route('admin.jobs.show', [$this->id]);
    }

    public function getCompanyLogoPathAttribute()
    {
        if($this->company_logo) {
            return asset('storage/jobs/' . $this->company_logo);
        } else {
            return asset('assets/images/placeholder.png');
        }
        
    }

    public function getTypeAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->job_type));
    }

    public function getDeadlineDateAttribute()
    {
        return $this->valid_till->format('M d, Y');
    }

    public function getValidTillFormatAttribute()
    {
        return $this->valid_till->format('Y-m-d');
    }

    public function getApplicationEndsAttribute()
    {
        if($this->valid_till > date('Y-m-d H:i:s')) {
            return true;
        }

        return false;
    }

    public function getPayPerAttribute()
    {
        return 'pre ' . str_replace('ly', '', $this->pay_type);
    }

    public function getPayStartFormatAttribute()
    {
        return price_format($this->pay_start, $this->currency);
    }

    public function getPayEndFormatAttribute()
    {
        return price_format($this->pay_end, $this->currency);
    }

    public function getLinkAttribute()
    {
        return route('jobs.show', [$this->category->slug, $this->id]);
    }

    public function getApplyUrlAttribute()
    {
        return route('jobs.apply', [$this->category->slug, $this->id]);
    }

    public function getJobUserAttribute()
    {
        if (Auth::check()) {
            return $this->job_users()->where('user_id', auth()->user()->id)->first();
        }

        return false;
    }

    public function getSaveApplyUrlAttribute()
    {
        return route('jobs.save_apply', [$this->category->slug, $this->id]);
    }

    public function scopeApplicationAvail($query)
    {
        return $query->where('valid_till', '>', date('Y-m-d H:i:s'));;
    }
}

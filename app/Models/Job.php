<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model 
{
    use HasFactory;

    protected $table = 'job_listings';
    // protected $fillable = ['employer_id', 'title', 'salary'];
    // Reduce security, but allow for less needed customization for input fields (Guard nothing - [])
    protected $guarded = [];

    public function employer() {
        return $this->belongsTo(Employer::class);
    }

    public function tags() {
        // Update second arg because it doesn't match with just jobs
        return $this->belongsToMany(Tag::class, foreignPivotKey:'job_listing_id');
    }
}
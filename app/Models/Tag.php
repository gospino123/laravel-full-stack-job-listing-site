<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function jobs() {
        // Update second arg because it doesn't match with just jobs
        return $this->belongsToMany(Job::class, relatedPivotKey:'job_listing_id');
    }
}

// $tag->jobs()->attach(7);
// $tag->jobs()->attach(App\Models\Job::find(7));

// $tag->jobs()->get();
// $tag->jobs()->get()->pluck('title');
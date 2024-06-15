<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model 
{
    use HasFactory;

    protected $table = 'job_listings';
    protected $fillable = ['title', 'salary'];

    public function employer() {
        return $this->belongsTo(Employer::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, foreignPivotKey:'job_listing_id');
    }
}

/*
c71e316 (HEAD -> main) Lesson12(pivot_table):Create,config db pivot
d8142f0 Lesson12.1(pivot_tables):Prep laravel side
4b98640 (practice-has-belongs-to-06152024) Lesson 11(model,db):Part2 - belongsTo,has relation
94bc919 Lesson10(models,factories,db):Create part 1
*/
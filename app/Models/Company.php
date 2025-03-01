<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'logo', 'about',
    ];

    // one-to-many relationship with JobPosting
    public function jobPostings()
    {
        return $this->hasMany(JobPosting::class);
    }
}

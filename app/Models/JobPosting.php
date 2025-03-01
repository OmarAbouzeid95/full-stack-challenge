<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'company_id', 'type', 'salary', 'location', 'description',
    ];

    // many-to-one relationship with Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}


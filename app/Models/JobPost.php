<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skill;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'experience',
        'salary',
        'location',
        'extra_info',
        'company_name',
        'company_logo',
    ];


    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}

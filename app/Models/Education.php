<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    /** @use HasFactory<\Database\Factories\EducationFactory> */
    use HasFactory;

    protected $fillable =[
    'profile_id',
    'degree',
    'institute',
    'grade',
    'start_date',
    'end_date',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    protected $casts = [
    'start_date' => 'datetime',
    'end_date' => 'datetime',
];
}

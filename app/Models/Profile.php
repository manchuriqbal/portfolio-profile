<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Education;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    protected $fillable = [
    'user_id',
    'avatar',
    'gender',
    'hobbies',
    'age',
    'email',
    'phone',
    'city',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

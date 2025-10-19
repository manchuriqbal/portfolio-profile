<?php

namespace App\Models;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
    'profile_id',
    'user_id',
    'comment_text',
    'comment_image',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

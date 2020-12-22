<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment',
        'user_id',
        'post_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the comments's post.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the comments's user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

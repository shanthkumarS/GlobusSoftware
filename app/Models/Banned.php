<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banned extends Model
{
    use HasFactory;

    public $table = 'banned';

    protected $fillable = [
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
        return $this->hasOne(Post::class, 'id');
    }

    /**
     * Get the comments's post.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
}

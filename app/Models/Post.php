<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Share;


class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image', 'caption'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
         return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function shares() {
        return $this->hasMany(Share::class);
    }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['content', 'commentable_id','commentable_type','user_id'];

    public function commentable() {
        return $this->morphTo();
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes() {
        return $this->morphMany(UserLike::class, 'likeable');
    }

    public function isLiked() {
        return $this->morphMany(UserLike::class, 'likeable')->where('user_id', auth()->user()->id);
    }

    protected $withCount = ['likes', 'isLiked'];
}

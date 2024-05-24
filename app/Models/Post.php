<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = ['title', 'content', 'category_id', 'user_id', 'department_id'];

    protected $table = "posts";


    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes() {
        return $this->morphMany(UserLike::class, 'likeable');
    }



    public function isLiked() {
        return $this->morphMany(UserLike::class, 'likeable')->where('user_id', auth()->user()->id ?? -1);
    }


    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $withCount = ['likes', 'isLiked'];


}

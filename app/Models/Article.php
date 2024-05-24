<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;
    use Filterable;

    protected $fillable = ['title', 'content',  'user_id'];

    protected $table = "articles";



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

    protected $withCount = ['likes', 'isLiked','comments'];


}

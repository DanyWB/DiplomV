<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLike extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function liked() {
        return belongsTo(Post::class);
    }

      public function entity() {
        return $this->morphTo();
    }
    public function user() {
        return $this->belongsTo(User::class);
    }


}

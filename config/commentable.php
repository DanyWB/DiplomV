<?php

use App\Models\Guid;
use App\Models\Post;
use App\Models\Article;
use App\Models\Comment;

return [
    'post' => Post::class,
    'comment' => Comment::class,
    'article' => Article::class,
    'guid' => Guid::class,
];

<?php

use App\Models\Guid;
use App\Models\Post;
use App\Models\User;
use App\Models\Article;


return [
    'post' => Post::class,
    'user' => User::class,
    'article' => Article::class,
    'guid' => Guid::class,
];

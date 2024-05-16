<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\UserLike;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Filters\PostFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;

class IndexController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(FilterRequest $request)
    {
            $data = $request->validated();

            $filter = app()->make(PostFilter::class, ['queryParams'=> array_filter($data)]);

            $posts = Post::filter($filter)->orderBy('created_at', 'asc')->get();

            $relatedPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->get()->take(4);

        return view('forum.index', compact('posts', 'relatedPosts'));
    }

}

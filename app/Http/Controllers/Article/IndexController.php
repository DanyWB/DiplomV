<?php

namespace App\Http\Controllers\Article;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\UserLike;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Filters\ArticleFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\FilterRequest;

class IndexController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();


        $filter = app()->make(ArticleFilter::class, ['queryParams'=> array_filter($data)]);

        $articles = Article::filter($filter)->paginate(10);



       $relatedPosts = Post::orderBy('created_at', 'desc')->get()->take(4);



        return view('article.index', compact('articles', 'relatedPosts'));
    }

}

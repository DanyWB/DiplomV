<?php

namespace App\Http\Controllers\Guid;

use App\Models\Tag;
use App\Models\Game;
use App\Models\Guid;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\UserLike;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Filters\GuidFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guid\FilterRequest;

class IndexController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();


        $filter = app()->make(GuidFilter::class, ['queryParams'=> array_filter($data)]);

        $guids = Guid::filter($filter)->paginate(10);



       $relatedPosts = Post::orderBy('created_at', 'desc')->get()->take(4);

       $games = array_values(Game::all()->pluck('title')->toArray());


        session()->put('games', $games);


        return view('guid.index', compact('guids', 'relatedPosts','games'));
    }

}

<?php

namespace App\Http\Controllers\Home;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\UserLike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {




        // $data['user_id'] = auth()->user()->id;


        // $model->likes()->save(UserLike::make($data));
        // $model->refresh();
        // dd($model);
        // return redirect()->back();



        // $posts = Post::query()->with('tags')->get();



        return view('home.index');
    }

}

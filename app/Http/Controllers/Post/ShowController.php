<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Post $post)
    {


        return view('forum.show', compact('post'));
    }

}

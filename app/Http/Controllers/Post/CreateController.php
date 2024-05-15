<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {




        return view('forum.create',);
    }

}

<?php

namespace App\Http\Controllers\Comment;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;


class testController extends Controller
{


    public function __invoke(Request $request)
    {


        dd($request->test);




    }

}

<?php

namespace App\Http\Controllers\Comment;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;


class StoreController extends Controller
{


    public function __invoke(CommentRequest $request , $id )
    {



        $model = $request->checkCommentable();



        $data = $request->only('content');
        $data['user_id'] = auth()->user()->id;


        $model->comments()->save(Comment::make($data));


        return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers\Like;

use App\Models\Post;
use App\Models\Comment;
use App\Models\UserLike;
use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;
use App\Http\Controllers\Controller;



class StoreController extends Controller
{

    public function __invoke(LikeRequest $request  )
    {
    $model = $request->checkLikeable();

    $data['user_id'] = auth()->user()->id;

       if($model->isLiked->count()) {

            $model->isLiked()->delete();

       } else {

        $model->likes()->save(UserLike::make($data));

       }

        return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers\Image;

use App\Models\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;


class StoreController extends Controller
{


    public function __invoke(ImageRequest $request  )
    {

        $model = $request->checkImageable();
        $pathToFile = $request->file('user_profile_image');


        if($model->getMedia('avatar')->count())
        {
            $model -> getMedia('avatar')[0]->delete();
        }



        $model->addMedia($pathToFile)->toMediaCollection('avatar');
        
        return redirect()->back();
    }

}

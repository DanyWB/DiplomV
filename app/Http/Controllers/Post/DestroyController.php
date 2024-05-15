<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Admin\Post\UpdateRequest;

class DestroyController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Post $post)
    {

        if(1) {
            $post->delete();

            return redirect()->route('admin.post.index');
            }

            throw ValidationException::withMessages([
                'title' => 'Delete all posts with that category',
            ]);

            return redirect()->back();
        }


    }



<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\UpdateRequest;

class UpdateController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $this->service->update($data,$post);

        return redirect()->route('admin.post.index');

    }

}

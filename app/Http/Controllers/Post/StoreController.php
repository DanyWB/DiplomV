<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        $this->service->store($data);








       return redirect()->route('admin.post.index');

    }

}

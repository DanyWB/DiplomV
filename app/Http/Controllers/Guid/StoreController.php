<?php

namespace App\Http\Controllers\Guid;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Guid\StoreRequest;

class StoreController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(StoreRequest $request)
    {



        $data = $request->validated();

        $request->checkImageable();

        $guid = $this->service->store($data);




        try{
            DB::beginTransaction();


            $pathToFile = $request->file('guid_image');



            $guid->addMedia($pathToFile)->toMediaCollection('guid_prewiew');


            DB::commit();
        } catch (Exception $exception) {
            abort('500');
            DB::rollback();
        }


       return redirect()->route('guid.index');

    }

}

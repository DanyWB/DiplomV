<?php

namespace App\Service;

use Exception;
use App\Models\Guid;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class GuidService {


    public function store($data) {
        try{
            DB::beginTransaction();

            $data['user_id'] = auth()->user()->id;



            $guid = Guid::Create($data);

             DB::commit();
            return $guid;
        } catch (Exception $exception) {
            abort('500');
            DB::rollback();
        }

    }

    public function update($data,$post) {

        try{

        DB::beginTransaction();

        if(isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
        }

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
        }

        $tags = $data['tags'] ?? [];
        $post->update($data);

        $post = $post->fresh();
        $post->tags()->sync($tags);

        DB::commit();

        } catch(Exception $exception) {
            abort('500');
            DB::rollback();
        }

    }
}

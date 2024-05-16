<?php

namespace App\Service;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class UserService {


    public function store($data) {
        try{
            DB::beginTransaction();

            User::firstOrCreate($data);

             DB::commit();
        } catch (Exception $exception) {
            abort('500');
            DB::rollback();
        }

    }

    public function update($data,$user) {

        try{

        DB::beginTransaction();

            $user->update($data);

        DB::commit();

        } catch(Exception $exception) {
            abort('500');
            DB::rollback();
        }

    }
}

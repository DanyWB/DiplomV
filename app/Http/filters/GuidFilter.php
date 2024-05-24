<?php


namespace App\Http\Filters;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class GuidFilter extends AbstractFilter
{

    public const GUID_CATEGORY_ID = 'guid_category_id';
    public const GAME_ID = 'game_id';


    protected function getCallbacks(): array
    {
        return [
            self::GUID_CATEGORY_ID => [$this, 'guidCategoryId'],
            self::GAME_ID => [$this, 'gameId'],
        ];
    }



    public function guidCategoryId(Builder $builder, $value)
    {


        if($value == 1) {

            $builder->orderBy('created_at', 'desc');

        }
        if($value == 2) {

            $builder->withCount('likes')->orderBy('likes_count', 'desc');

        }
        if($value == 3) {
            $builder->withCount('comments')->orderBy('comments_count', 'desc');
        }

    }


    public function gameId(Builder $builder, $value)
    {
        $game = DB::table('games')->select('id')->where('title', '=', $value);
        $builder->where('game_id' , $game);

    }
}

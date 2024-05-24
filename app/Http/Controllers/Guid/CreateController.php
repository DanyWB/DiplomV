<?php

namespace App\Http\Controllers\Guid;

use App\Models\Tag;
use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {


        $games = Game::orderBy('title', 'ASC')->get();

        return view('guid.create', compact('games'));
    }

}

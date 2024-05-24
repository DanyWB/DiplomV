<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class GameController extends Controller
{
    /**
     * Display the user's profile form.
     */


    /**
     * Update the user's profile information.
     */


    /**
     * Delete the user's account.
     */
    public function __invoke()
    {

        $games = Game::all()->pluck('title');


        return response()->json($games);
    }
}

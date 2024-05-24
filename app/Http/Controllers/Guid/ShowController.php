<?php

namespace App\Http\Controllers\Guid;

use App\Models\Tag;
use App\Models\Guid;
use App\Models\Post;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Guid $guid)
    {

        $comments = $guid->comments;

        function getChildComments($item) {
            if($item->comments->count() > 0) {
                $item->childComments = $item->comments;
                foreach ($item->comments as $comment) {
                    getChildComments($comment);
                }
            }
        }

        $comments->each(function ($item) {

            getChildComments($item);
        });

        $comments = $comments->paginate(10)->withQueryString();

        $relatedPosts = Guid::get()->random(3);



            if (($count = $relatedPosts->count()) > 1) {
                if($count > 4) {
                    $count = 4;
                }
                $relatedPosts = $relatedPosts->random($count);
            } else {
                $relatedPosts = [];
            }



        return view('guid.show', compact('guid', 'comments', 'relatedPosts'));
    }

}

<?php

namespace App\Http\Controllers\Article;

use App\Models\Tag;
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
    public function __invoke(Article $article)
    {

        $comments = $article->comments;

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
        $comments->paginate(10);

        $comments = $comments->paginate(1)->withQueryString();


        $relatedPosts = Article::get()->random(3);



            if (($count = $relatedPosts->count()) > 1) {
                if($count > 4) {
                    $count = 4;
                }
                $relatedPosts = $relatedPosts->random($count);
            } else {
                $relatedPosts = [];
            }



        return view('article.show', compact('article', 'comments', 'relatedPosts'));
    }

}

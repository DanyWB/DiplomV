<?php

namespace App\Http\Controllers\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Post $post)
    {

        $comments = $post->comments;

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

        $user_image_avatar = $post->user->getMedia('avatar')->first() ?? '';

        $relatedPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->get()->take(4);

        $relatedPosts = Post::where('department_id', $post->department_id)
            ->where('id' ,'!=' ,$post->id)
            ->get();


            if (($count = $relatedPosts->count()) > 1) {
                if($count > 4) {
                    $count = 4;
                }
                $relatedPosts = $relatedPosts->random($count);
            } else {
                $relatedPosts = [];
            }



        return view('forum.show', compact('post', 'comments','user_image_avatar' , 'relatedPosts'));
    }

}

<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ArticleFilter extends AbstractFilter
{

    public const ARTICLE_CATEGORY_ID = 'article_category_id';
    public const ARTICLE_CONTENT = 'article_content';




    protected function getCallbacks(): array
    {
        return [
            self::ARTICLE_CATEGORY_ID => [$this, 'articleCategoryId'],
            self::ARTICLE_CONTENT => [$this, 'articleContent']
        ];
    }



    public function articleCategoryId(Builder $builder, $value)
    {

        if($value == 1) {

            $builder->orderBy('created_at', 'desc');
           // dd($builder);
        }
        if($value == 2) {

            $builder->withCount('likes')->orderBy('likes_count', 'desc');

        }
        if($value == 3) {
            $builder->withCount('comments')->orderBy('comments_count', 'desc');
        }

    }

    public function articleContent(Builder $builder, $value)
    {

        $builder->where('title', 'like', "%{$value}%");

    }
}

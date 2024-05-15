<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const DEPARTMENT_ID = 'department_id';
    public const CATEGORY_ID = 'category_id';


    protected function getCallbacks(): array
    {
        return [
            self::DEPARTMENT_ID => [$this, 'departmentId'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    public function departmentId(Builder $builder, $value)
    {
        $builder->where('department_id',  $value);
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
}

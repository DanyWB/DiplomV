<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.simple-default');
        Carbon::setlocale('ru_RU');



        Collection::macro('paginate', function ($perPage = 15, $pageName = 'page', $page = null, $options = []) {

            // Resolve current page from request
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            // dd(LengthAwarePaginator::path());
            // Paginate the Collection
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $this->count(),
                $perPage,
                $page,
                $options
            );

          });


    }
}

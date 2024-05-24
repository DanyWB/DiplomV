<?php

namespace App\Http\Controllers\Article;


use App\Service\ArticleService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public $service;

    public function __construct(ArticleService $service) {

        $this->service = $service;
    }

}

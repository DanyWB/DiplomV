<?php

namespace App\Http\Controllers\Guid;


use App\Service\GuidService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public $service;

    public function __construct(GuidService $service) {

        $this->service = $service;
    }

}

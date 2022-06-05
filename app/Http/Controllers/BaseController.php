<?php

namespace App\Http\Controllers;

use App\Service\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    private $service;

    public function __construct(BaseService $baseService)
    {
        $this->service = $baseService;

    }


    private function setModel($url) {
        $routes = array_keys(config('routes'));
        foreach($routes as $route) {
            if(str_contains($url, $route)) {
                $this->service->setModel(config('routes.'.$route));
                break;
            }
        }
    }

    public function getAll(Request $request) {

        $this->setModel($request->url());
        return $this->service->getAll();
    }

    public function getFiltered(Request $request) {
        $this->setModel($request->url());


        return $this->service->filter(json_decode($request->getContent(), true));
    }

    public function search(Request $request, $value) {
        $this->setModel($request->url());

        return $this->service->search($value);
    }
}

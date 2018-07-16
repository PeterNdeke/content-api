<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;

class ViewImageController extends BaseController
{
    //
     public function index()
    {
        $products = Content::all();


        return $this->sendResponse($products->toArray(), 'Products retrieved successfully.');
    }
}

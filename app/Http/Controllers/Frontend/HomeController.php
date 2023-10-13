<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Service;
use App\Models\TyperTitle;

class HomeController extends Controller
{
    //
    public function index()
    {
        $hero = Hero::first();
        $typerTitles = json_encode(TyperTitle::pluck('title')->toArray());
        $services = Service::all();
        
        return view('frontend.home', compact(
            'hero', 
            'typerTitles',
            'services'
        ));
    }
}

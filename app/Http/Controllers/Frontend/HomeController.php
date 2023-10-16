<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Hero;
use App\Models\Service;
use App\Models\TyperTitle;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\Category;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
use App\Models\Experience;

class HomeController extends Controller
{
    //
    public function index()
    {
        $hero = Hero::first();
        $typerTitles = json_encode(TyperTitle::pluck('title')->toArray());
        $services = Service::all();
        $about = About::first();

        // portfolio
        $portfolioTitle = PortfolioSectionSetting::first();
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::all();
        $skill = SkillSectionSetting::first();
        $skillItems = SkillItem::all();
        $experience = Experience::first();
        
        return view('frontend.home', compact(
            'hero', 
            'typerTitles',
            'services',
            'about',
            'portfolioTitle',
            'portfolioCategories',
            'portfolioItems',
            'skill',
            'skillItems',
            'experience',
        ));
    }

    public function showPortfolio($id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio-details', compact('portfolioItem'));
    }
}

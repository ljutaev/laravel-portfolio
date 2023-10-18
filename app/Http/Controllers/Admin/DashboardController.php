<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
    	$portfolioCount = PortfolioItem::count();

        return view('admin.dashboard', compact('portfolioCount'));
    }
}

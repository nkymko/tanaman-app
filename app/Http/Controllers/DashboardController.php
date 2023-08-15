<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Plant;
use App\Models\Location;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'style' => 'dashboard',
            'plant' => Plant::all()->count(),
            'category' => Category::all()->count(),
            'location' => Location::all()->count(),
            'user' => User::all()->count()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = Service::where('is_active', true)
            ->orderBy('category')
            ->orderBy('name')
            ->take(6)
            ->get();

        $categories = Service::where('is_active', true)
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('home', compact('services', 'categories'));
    }
}
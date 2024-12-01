<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Page;

class IndexController extends Controller
{
    public function index()
{
    $slides = Slide::all();

        return view('index', [
            'slides' => $slides,
        ]);
}

	
    public function page($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('page', ['page' => $page]);
    }
    
    public function contacts()
    {
        return view('contacts');
    }
    
    public function about()
    {
        return view('about');
    }
}

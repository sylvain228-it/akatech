<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\ImageCarousel;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $imagesCarousel = ImageCarousel::orderByDesc('created_at')->get();
        return view('frontend.home', compact('imagesCarousel'));
    }
    public function about()
    {
        return view('frontend.about');
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Exibe a página inicial
     */
    public function index()
    {
        // Produtos em destaque (is_featured = true)
        $featuredProducts = Product::where('is_active', true)
            ->where('is_featured', true)
            ->with('category')
            ->limit(6)
            ->get();

        // Serviços em destaque
        $featuredServices = Service::where('is_active', true)
            ->where('is_featured', true)
            ->with('category')
            ->limit(4)
            ->get();

        // Avaliações recentes (aprovadas)
        $recentReviews = Review::where('is_approved', true)
            ->with('user')
            ->latest()
            ->limit(3)
            ->get();

        return view('home.index', compact(
            'featuredProducts',
            'featuredServices',
            'recentReviews'
        ));
    }
}
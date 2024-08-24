<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    public function index(Request $request) {
        $products = Product::all();
        if ($request->categorie) {
            $products = Product::whereHas('categories',function ($q) use($request) {
                $q->where('categorie_id',$request->categorie);
            })->get();
        }
        $categories = Category::all();
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function filtreProduct(Request $request) {
        if ($request->categorie == 'all') {
            return Product::all();
        }
        $products = Product::whereHas('categories', function ($q) use ($request) {
            $q->where('categories.id', $request->categorie);
        })->get();
        return $products ;
    }
}

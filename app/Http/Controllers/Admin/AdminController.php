<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function createProduct() {
        
    }

    public function listProduct() {
        $products = Product::all();

        return Inertia::render('Admin/Product',compact('products'));

    }

    public function dashboard() {
        return Inertia::render('Admin/Dashboard');
    }
}

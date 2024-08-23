<?php

namespace App\Http\Controllers\Admin;

use Stripe\Price;
use Stripe\Stripe;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Product as StripeProduct;
use Illuminate\Support\Facades\Storage;

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



    public function create(Request $request) {
        // Définir la clé secrète Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));
        // Créer un produit
        $product = StripeProduct::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Créer un prix pour le produit
        $price = Price::create([
            'product' => $product->id,
            'unit_amount' => $request->price * 100, // Le montant en centimes (par exemple, 10,00 € => 1000)
            'currency' => 'eur', // Définissez la devise souhaitée
        ]);

        $product = StripeProduct::retrieve($product->id);
       
        $prices = \Stripe\Price::all(['product' => $product->id]);

        // Extraire les IDs des prix
        $priceIds = array_map(function($price) {
            return $price->id;
        }, $prices->data);



        $image = $this->storageFile($request->base64);
        
        Product::create([
            'name' => $image["name"],
            'description' => $request->description,
            'price' => $request->price * 100 ,
            'type'=> $image["extension"],
            'is_free' => $request->is_free ? $request->is_free : false,
            'product_id' => $product->id,
            'price_id' => $priceIds[0],
        ]);
        // Retourner les identifiants du produit et du prix
        return redirect()->route('admin.allproduct');
    }

    public function delete() {
        
    }

    public function update() {
        
    }

    

    
}

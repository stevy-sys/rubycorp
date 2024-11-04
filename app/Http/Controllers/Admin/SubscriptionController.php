<?php

namespace App\Http\Controllers\Admin;

use Stripe\Price;
use Stripe\Stripe;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\SubscribProduct;
use App\Http\Controllers\Controller;
use Stripe\Product as StripeProduct;
use Illuminate\Support\Facades\Storage;

class SubscriptionController extends Controller
{

    public function listSubscription() {
        $subscribes = SubscribProduct::all(); 
        return Inertia::render('Admin/Subscription',compact('subscribes'));
    }

    public function delete(Request $request) {
        $subscribe = SubscribProduct::find($request->subscribe_id);
        $subscribe->delete();

        return response()->json(['message'=>'deleted success']);
    }

    public function create(Request $request) {
        // if (!$request->is_free) {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        // Créer un produit
        $stripeProduct = StripeProduct::create([
            'name' => $request->titre,
            'description' => $request->description,
        ]);

        // Créer un prix pour le produit
        $stripePrice = Price::create([
            'product' => $stripeProduct->id,
            'unit_amount' => $request->price * 100, // Montant en centimes
            'currency' => 'eur',
            'recurring' => ['interval' => 'month'], // Exemple pour un abonnement mensuel
        ]);

        $product = SubscribProduct::create([
            'name' => $request->titre,
            'description' => $request->description,
            'product_id' => $stripeProduct->id,
            'price_id' => $stripePrice->id,
            'price' => $request->price,
        ]);
        return $product;
    }
}

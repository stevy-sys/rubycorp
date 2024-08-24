<?php

namespace App\Http\Controllers\User;

use Stripe\Stripe;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function gallerie() {
        $products = Product::whereHas('users',function ($q) {
            $q->where('users.id',Auth::id());
        })->get();
        return Inertia::render('User/Gallerie',compact('products'));
    }

    public function facture() {
        try {
            // Assurez-vous d'utiliser la clé secrète de Stripe
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $factures = [];

            // if (Auth::user()->stripe_id) {
            //     // Récupère toutes les factures associées à l'utilisateur
            //     $factures = Auth::user()->invoices();
            //     dd($factures);
            // }

            // Passez les factures à la vue
            return Inertia::render('User/Facture', ['factures' => $factures]);

        } catch (\Exception $e) {
            // Log the exception or display an error message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}

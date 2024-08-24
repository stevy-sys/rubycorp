<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use Inertia\Inertia;
use Stripe\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function getOneProduct(Request $request) {
        $product = Product::find($request->product_id);
        return Inertia::render('Media',compact('product'));
    }
    
    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $user = Auth::user(); // Assurez-vous d'ajuster cette partie selon votre logique d'authentification et de récupération d'utilisateur
            if (!$user->stripe_id) {
                // Créez un client Stripe et associez-le à l'utilisateur
                $customer = Customer::create([
                    'email' => $user->email,
                ]);
    
                // Enregistrez le stripe_id pour l'utilisateur
                $user->stripe_id = $customer->id;
                $user->save();
            }
            
            $stripeId = $user->stripe_id;
            $product = Product::find($request->product_id);
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price' => $product->price_id, // Utilisez price_id si vous avez un prix spécifique à utiliser
                    'quantity' => 1,
                ]],
                'metadata' => [
                    'company' => 'Aphrodite', // Ajoutez des métadonnées personnalisées
                ],
                'locale' => 'auto',
                'mode' => 'payment',
                'customer' => $stripeId, // Associe le client Stripe à l'utilisateur
                'success_url' => route('checkout.success',['media' => $request->product_id]),
                'cancel_url' => url('media/'. $request->product_id)
            ]);

            return response()->json(['id' => $session->id]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

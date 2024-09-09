<?php

namespace App\Http\Controllers\User;

use Stripe\Stripe;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Message;
use App\Models\Product;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function gallerie() {
        $products = Product::whereHas('users',function ($q) {
            $q->where('users.id',Auth::id());
        })->get();
        return Inertia::render('User/Gallerie',compact('products'));
    }

    public function notification() {
        return Inertia::render('User/Notification');
    }

    public function chat() {
        $conversations = Conversation::with(['messages'])->where('talker_id',Auth::id())->first();
        if (!isset($conversations)) {
            $conversations = Conversation::create(['name' => 'chat','talker_id' => Auth::id()]);
            $conversations->load('messages');
        }
        return Inertia::render('User/Message',compact('conversations'));
    }

    public function sendMessage(Request $request) {
        if (Auth::user()->is_admin == true) {
            return '' ;
        }

        $conversation = Conversation::where('talker_id',Auth::id())->first();
        if (!isset($conversations)) {
            $conversation = Conversation::create(['name' => 'chat','talker_id' => Auth::id()]);
        }

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        return response()->json([
            'message' => $message
        ]);
    }

    public function facture() {
        try {
            // Assurez-vous d'utiliser la clé secrète de Stripe
            // Stripe::setApiKey(env('STRIPE_SECRET'));

            // $factures = [];

            // if (Auth::user()->stripe_id) {
            //     // Récupère toutes les factures associées à l'utilisateur
            //     $factures = Auth::user()->invoices();
            //     dd($factures);
            // }

            // Passez les factures à la vue
            $factures = Invoice::with(['user','product'])->where('user_id',Auth::id())->get();
            return Inertia::render('User/Facture', ['factures' => $factures]);

        } catch (\Exception $e) {
            // Log the exception or display an error message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}

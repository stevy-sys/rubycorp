<?php

namespace App\Http\Controllers\User;

use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\Like;
use App\Models\User;
use Inertia\Inertia;
use Stripe\Customer;
use App\Models\Media;
use App\Models\Config;
use App\Models\Invoice;
use App\Models\Message;
use App\Models\Product;
use App\Models\Conversation;
use App\Models\InvoiceToken;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Models\SubscribProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Cashier\Exceptions\IncompletePayment;

class UserController extends Controller
{

    public function handleStripeWebhook(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Payload invalide
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Signature invalide
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Gérer l'événement checkout.session.completed
        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $customerId = $session->customer;

            $priceId = $session->metadata->price_id;
            // Récupérer l'utilisateur en fonction de stripe_id
            $user = \App\Models\User::where('stripe_id', $customerId)->first();

            if ($user) {
                try {
                    $subscription = new \Laravel\Cashier\Subscription([
                        'user_id' => $user->id,
                        'type' => 'default', // Nom de l'abonnement
                        'stripe_id' => $session->subscription, // ID de l'abonnement Stripe
                        'stripe_status' => 'active', // Statut de l'abonnement
                        'stripe_price' => $priceId, // ID du prix Stripe
                        'quantity' => 1, // Quantité d'abonnements
                        'trial_ends_at' => null, // Pas de période d'essai si c'est un abonnement payé
                        'ends_at' => now()->addMonth(), // Date de fin de l'abonnement
                    ]);
    
                    // Enregistrez l'abonnement dans la base de données
                    $subscription->save();


                    // $user->newSubscription('default', $priceId)->create($session->payment_method);
                } catch (IncompletePayment $exception) {
                    // Gérer l'abonnement incomplet
                    return response()->json(
                        ['error' => 'Incomplete payment',
                        'message' => $exception->getMessage()
                    ], 400);
                }
            }
        }

        return response()->json(['status' => 'success']);
    }


    public function gallerie()
    {
        $products = Product::whereHas('users', function ($q) {
            $q->where('users.id', Auth::id());
        })->get();
        return Inertia::render('User/Gallerie', compact('products'));
    }

    public function paymentToken(Request $request)
    {
        $produit = Product::find($request->product_id);
        $user = Auth::user();
        $user->token = $user->token - $produit->token;
        $user->save();
        $user->products()->attach($produit->id);
        return response()->json(['message' => "paymnet avec success"]);
    }


    public function sessionToken(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Achat de token',
                    ],
                    'unit_amount' => $request->amount * 100, // Montant en centimes
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success.token', ['token' => $request->token]),
            'cancel_url' => route('checkout.cancel.token'),
        ]);

        return response()->json(['url' => $session->url]);
    }

    public function successToken(Request $request)
    {
        $user = Auth::user();
        $user->token = $user->token + $request->token;
        $user->save();
        InvoiceToken::create([
            'user_id' => $user->id,
            'token' => $request->token,
            'total' => Config::first()->price_token * $request->token
        ]);
        return Inertia::render('User/Token', [
            'newToken' => $user->token,
            'payment' => true
        ]);
    }

    public function cancelToken()
    {
        return Inertia::render('User/Token');
    }

    public function component()
    {
        return Inertia::render('User/Component');
    }

    public function notification()
    {
        return Inertia::render('User/Notification');
    }

    public function chat()
    {
        $conversations = Conversation::with(['messages.mediable'])->where('talker_id', Auth::id())->first();
        if (!isset($conversations)) {
            $conversations = Conversation::create(['name' => 'chat', 'talker_id' => Auth::id()]);
            $conversations->load(['messages.mediable']);
        }

        $count = Message::where('conversation_id', $conversations->id)->get()->count();

        $media = Media::whereHasMorph('mediable', [Message::class], function ($q) use ($conversations) {
            $q->where('conversation_id', $conversations->id);
        })->get();

        return Inertia::render('User/Message', compact('conversations', 'count', 'media'));
    }

    public function sendComments(Request $request)
    {
        $product = Product::find($request->product_id);

        $comments = $product->comments()->create([
            'user_id' => Auth::id(),
            'description' => $request->description
        ]);

        return response()->json([
            'data' =>  $comments->load('user')
        ]);
    }

    public function showToken(Request $request)
    {
        $user = Auth::user();
        return Inertia::render('User/Token', compact('user'));
    }



    public function likeProduct(Request $request)
    {
        $product = Product::find($request->product_id);
        $like = Like::where('product_id', $product->id)->where('user_id', Auth::id())->first();
        if (isset($like)) {
            Like::where('product_id', $product->id)->where('user_id', Auth::id())->delete();
        } else {
            $product->likes()->create([
                'user_id' => Auth::id()
            ]);
        }

        return response()->json([
            'data' =>  $product->load('likes')
        ]);
    }

    public function createSessionSubscribeUser(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $user = Auth::user();
            if (!$user->stripe_id) {
                $customer = Customer::create([
                    'email' => $user->email,
                ]);

                $user->stripe_id = $customer->id;
                $user->save();
            }

            $stripeId = $user->stripe_id;
            $product = SubscribProduct::find($request->product_id);

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price' => $product->price_id,
                    'quantity' => 1,
                ]],
                'metadata' => [
                    'company' => 'Aphrodite',
                    'price_id' => $product->price_id,
                ],
                'locale' => 'auto',
                'mode' => 'subscription', // Utilisation d'un abonnement
                'customer' => $stripeId,
                'success_url' => route('user.subscribe.sucess', [
                    'user' => $user
                ]),
                'cancel_url' => route('home')
            ]);

            return response()->json(['id' => $session->id]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function sucessSubscribe()
    {
        $user = Auth::user();
        $user->is_subscribe = true;
        $user->save();
        return redirect()->route('home');
    }


    public function sendMessage(Request $request)
    {
        if (Auth::user()->is_admin == true) {
            return '';
        }

        $conversation = Conversation::where('talker_id', Auth::id())->first();

        if (!$conversation->id) {
            $conversation = Conversation::create(['name' => 'chat', 'talker_id' => Auth::id()]);
        }

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        if (isset($request->file)) {
            $image = $this->storageFile($request->file);
            $message->mediable()->create([
                'name' => $image['name'],
                'type' => $image['extension']
            ]);
        }

        return response()->json([
            'message' => $message
        ]);
    }

    public function storageFile($base64, $storage = "image")
    {

        try {
            // Vérifie si le base64 commence par le préfixe 'data:image/'
            if (preg_match('/^data:(image|video)\/(\w+);base64,/', $base64, $matches)) {
                $extension = $matches[2]; // Extrait l'extension de l'image
                $extensionType = $matches[1]; // Extrait l'extension de l'image
            } else {
                throw new \Exception('Le base64 fourni n\'est pas valide.');
            }

            // Nettoie la chaîne base64 pour extraire les données brutes
            $replace = substr($base64, 0, strpos($base64, ',') + 1);
            $image = str_replace($replace, '', $base64);
            $image = str_replace(' ', '+', $image);

            // Crée un nom de fichier aléatoire avec l'extension appropriée
            $imageName = \Str::random(10) . '.' . $extension;

            // Enregistre l'image dans le stockage
            $path = Storage::disk($storage)->put($imageName, base64_decode($image));

            // if (!$path) {
            //     throw new \Exception('Échec de l\'enregistrement du fichier.');
            // }

            return [
                'name' => $imageName,
                'extension' => $extension,
                'extensionType' => $extensionType
            ];
        } catch (\Throwable $th) {
            dd($th->getMessage());
            // Ajoutez des logs ou des messages d'erreur détaillés
            // Log::error($th->getMessage());
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function facture()
    {
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
            $factures = Invoice::with(['user', 'product'])->where('user_id', Auth::id())->get();
            return Inertia::render('User/Facture', ['factures' => $factures]);
        } catch (\Exception $e) {
            // Log the exception or display an error message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

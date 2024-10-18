<?php

use Stripe\Stripe;
use Inertia\Inertia;
use App\Models\Invoice;
use App\Models\Product;
use Stripe\InvoiceItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::post('/filtre', [IndexController::class, 'filtreProduct'])->name('home.filtre');
Route::get('/component', [UserController::class, 'component'])->name('component');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    })->name('app.dashboard');

    Route::get('/media/{product_id}', [ProductController::class, 'getOneProduct'])->name('media');

    Route::get('/create-checkout-session', [ProductController::class, 'createCheckoutSession']);

    Route::get('/success-checkout-session', function (Request $request) {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $user = Auth::user();
        $user->products()->attach($request->media);

        Invoice::create([
            'product_id' => $request->media,
            'user_id' => Auth::id()
        ]);

        // // Récupérez les détails du produit
        // $product = Product::find($request->media);
        // $amount = 9000.00; // Montant total en cents
        // $currency = 'eur'; // Devise

        // // Créez un élément de facture (Invoice Item)
        // $invoiceItem = InvoiceItem::create([
        //     'customer' => $user->stripe_id,
        //     'amount' => $amount, // Montant total en cents
        //     'currency' => $currency, // Devise
        //     'description' => $product->name, // Description du produit
        // ]);

        // // Créez la facture basée sur cet élément de facture
        // $invoice = Invoice::create([
        //     'customer' => $user->stripe_id,
        //     'auto_advance' => true, // Finalise automatiquement la facture
        // ]);

        // // Finalisez la facture
        // $invoice->finalizeInvoice();

        // // Récupérez l'URL du PDF de la facture
        // $invoicePdfUrl = $invoice->invoice_pdf;

        // dd([
        //     'invoiceItem' => $invoiceItem,
        //     'invoice' => $invoice,
        //     'invoicePdfUrl' => $invoicePdfUrl
        // ]);
        return redirect()->route('user.gallerie.index');
    })->name('checkout.success');
    Route::get('/abort-checkout-session', function () {
        dd('annuler');
    })->name('checkout.cancel');



    //user
    Route::get('/user/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('user.dashboard');

    Route::get('/user/gallerie', [UserController::class, 'gallerie'])->name('user.gallerie.index');
    Route::get('/user/facture', [UserController::class, 'facture'])->name('user.facture.index');
    Route::get('/user/chat', [UserController::class, 'chat'])->name('user.chat.index');
    Route::post('/user/sendMessage', [UserController::class, 'sendMessage'])->name('user.chat.send');
    Route::get('/user/notification', [UserController::class, 'notification'])->name('user.notification.index');
    Route::get('/user/like', [UserController::class, 'likeProduct'])->name('user.like.store');
    Route::post('/user/sendComments', [UserController::class, 'sendComments'])->name('user.comments.store');
    Route::get('/user/token', [UserController::class, 'showToken'])->name('user.token.index');

    //
    Route::post('/create-checkout-session-token', [UserController::class, 'sessionToken']);
    Route::get('/checkout/success-token', [UserController::class, 'successToken'])->name('checkout.success.token');
    Route::get('/checkout/cancel-token', [UserController::class, 'cancelToken'])->name('checkout.cancel.token');


    Route::post('/payment/token', [UserController::class, 'paymentToken'])->name('payment.create.token');
    


    //admin
    
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/facture', [AdminController::class, 'adminFacture'])->name('admin.facture.index');
    Route::get('/admin/product', [AdminController::class, 'listProduct'])->name('admin.allproduct');
    Route::post('/admin/deleteProduct', [AdminController::class, 'deleteProduct'])->name('admin.deleteProduct');
    Route::post('/admin/create-product', [AdminController::class, 'create'])->name('admin.store.product');
    Route::get('/admin/config', [ConfigController::class, 'allConfig'])->name('admin.config.index');
    Route::post('/admin/updateConfig', [ConfigController::class, 'updateConfig'])->name('admin.config.update');
    Route::get('/admin/chat', [ChatController::class, 'index'])->name('admin.chat.index');
    Route::get('/admin/getMessage/{conversation_id}', [ChatController::class, 'messages'])->name('admin.chat.message');
    Route::post('/admin/sendMessage', [ChatController::class, 'sendMessage'])->name('admin.chat.send');
    Route::get('/admin/text', [ConfigController::class, 'allTexte'])->name('admin.config.texte');
    Route::post('/admin/updateMessages', [ConfigController::class, 'updateMessages'])->name('admin.config.updateMessages');
    Route::post('/admin/updateMention', [ConfigController::class, 'updateMention'])->name('admin.config.updateMention');
    Route::post('/admin/updateTexte', [ConfigController::class, 'updateTexte'])->name('admin.config.updateTexte');
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/categorie', [ConfigController::class, 'allCategorie'])->name('admin.categorie.index');
    Route::post('/admin/add-categorie', [ConfigController::class, 'addCategorie'])->name('admin.categorie.store');
    Route::post('/admin/update-categorie', [ConfigController::class, 'updateCategorie'])->name('admin.categorie.update');
    

    
    

    
    Route::get('/admin/getRole', [ConfigController::class, 'getRole'])->name('admin.role.index');
    Route::post('/admin/createRole', [ConfigController::class, 'createRole'])->name('admin.role.store');
    Route::get('/admin/getMenu', [ConfigController::class, 'getMenu'])->name('admin.menu.index');
    Route::post('/admin/updateRole', [ConfigController::class, 'updateRole'])->name('admin.role.update');


    Route::post('/admin/createAdmin', [ConfigController::class, 'createAdmin'])->name('admin.admin.store');



});

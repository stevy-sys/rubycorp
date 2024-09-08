<?php

namespace App\Http\Controllers\Admin;

use Stripe\Price;
use Stripe\Stripe;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Stripe\Product as StripeProduct;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function listProduct() {
        $products = Product::all();
        $categories = Category::all();
        return Inertia::render('Admin/Product',compact('products','categories'));
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
        
        $product = Product::create([
            'name' => $image["name"],
            'description' => $request->description,
            'price' => $request->price * 100 ,
            'type'=> $image["extension"],
            'is_free' => $request->is_free ? $request->is_free : false,
            'product_id' => $product->id,
            'price_id' => $priceIds[0],
            'modele' =>  $request->model
        ]);
        $product->categories()->sync([$request->categorie]);
        // Retourner les identifiants du produit et du prix
        return redirect()->route('admin.allproduct');
    }

    public function delete() {
        
    }

    public function update() {
        
    }

    
    public function storageFile($base64,$storage="image")  {
        
        try {
            // Vérifie si le base64 commence par le préfixe 'data:image/'
            if (preg_match('/^data:image\/(\w+);base64,/', $base64, $matches)) {
                $extension = $matches[1]; // Extrait l'extension de l'image
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
                'extension' => $extension
            ];
        } catch (\Throwable $th) {
            // Ajoutez des logs ou des messages d'erreur détaillés
            // Log::error($th->getMessage());
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    
}

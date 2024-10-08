<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Config;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{

    public function updateMention(Request $request) {
        $config = Config::first();
        $config->update(['mention' => $request->mention]);
        return response()->json(['update' => 'ok']);
    }
    public function allConfig() {
        $configs = Config::first();
        return Inertia::render('Admin/Config',compact('configs'));
    }

    public function updateCategorie(Request $request) {
        if ($request->action == 'update') {
            $cate = Category::find($request->id);
            $cate->name = $request->name ;
            $cate->save();
        }else{
            $cate = Category::find($request->id);
            $cate->delete();
        }
        return Category::all();
    }

    public function allCategorie() {
        $categories = Category::all();
        return Inertia::render('Admin/Categorie',compact('categories'));
    }

    public function addCategorie(Request $request) {
        Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('admin.categorie.index');
    }


    public function updateConfig(Request $request) {
        $config = Config::first();
        if ($request->pdp) {
            $data = $this->storageFile($request->pdp);
            $config->pdp = $data['name'];
        }

        if ($request->pdc) {
            $data = $this->storageFile($request->pdc);
            $config->pdc = $data['name'];
        }

        if ($request->description) {
            $config->pdc = $request->description;
        }
        $config->save();
        
        return response()->json([
            'message' => 'apps updated'
        ]);
    }


    public function allTexte() {
        // $configs = Config::all();
        return Inertia::render('Admin/Texte');
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




    public function updateMessages(Request $request)
    {
        // Récupérer les données envoyées par le front-end
        $newMessages = $request->all();

        // Chemin vers le fichier message.php
        $langFile = resource_path('lang/en/message.php');

        // Lire le contenu actuel du fichier message.php
        $currentMessages = include($langFile);

        // Mettre à jour les valeurs existantes avec les nouvelles données
        foreach ($newMessages as $key => $value) {
            if (array_key_exists($key, $currentMessages)) {
                $currentMessages[$key] = $value;  // Met à jour la valeur si la clé existe
            }
        }

        // Générer le code PHP pour le tableau mis à jour
        $newContent = "<?php\n\nreturn " . var_export($currentMessages, true) . ";\n";

        // Sauvegarder les nouvelles données dans message.php
        File::put($langFile, $newContent);

        return response()->json([
            'message' => 'Les messages ont été mis à jour avec succès.',
            'data' => $currentMessages,
        ]);
    }
}

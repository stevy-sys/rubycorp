<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    public function allConfig() {
        $configs = Config::all();
        return Inertia::render('Admin/Config',compact('configs'));
    }

    public function allUser() {
        return Inertia::render('Admin/User');
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
}

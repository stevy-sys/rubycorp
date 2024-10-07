<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function index() {
        $conversations = Conversation::with(['user','lastMessage'])->get();
        return Inertia::render('Admin/Chat',compact('conversations'));
    }
   

    public function messages(Request $request)  {
        return response()->json([
            'messages' => Message::with('mediable')->where('conversation_id',$request->conversation_id)->get()
        ]);
    }

    public function sendMessage(Request $request)  {
        $message = Message::create([
            'user_id' => Auth::id(),
            'message' => $request->message ,
            'conversation_id' => $request->conversation_id
        ]);

        if (isset($request->file)) {
            $image = $this->storageFile($request->file);
            $message->mediable()->create([
                'name' => $image['name'],
                'type' => $image['extension']
            ]);
        }
        
        return response()->json([
            'message' => $message->load('mediable')
        ]);
    }


    public function storageFile($base64,$storage="image")  {
        
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
}
